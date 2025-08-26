<?php
require_once 'includes/Database.php';

class AppointmentController {
    private $db;
    
    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }
    
    public function getAvailableSlots() {
        header('Content-Type: application/json');
        
        $date = $_GET['date'] ?? '';
        if (!$date || !strtotime($date)) {
            echo json_encode(['error' => 'Date invalide']);
            exit;
        }
        
        // Vérifier si c'est un jour ouvrable
        $dayOfWeek = date('N', strtotime($date));
        if (!in_array($dayOfWeek, WORKING_DAYS)) {
            echo json_encode(['slots' => []]);
            exit;
        }
        
        // Générer les créneaux disponibles
        $slots = $this->generateTimeSlots($date);
        
        // Récupérer les rendez-vous existants
        $stmt = $this->db->prepare("SELECT appointment_time FROM appointments WHERE appointment_date = ? AND status != 'cancelled'");
        $stmt->execute([$date]);
        $bookedSlots = $stmt->fetchAll(PDO::FETCH_COLUMN);
        
        // Filtrer les créneaux disponibles
        $availableSlots = array_filter($slots, function($slot) use ($bookedSlots) {
            return !in_array($slot, $bookedSlots);
        });
        
        echo json_encode(['slots' => array_values($availableSlots)]);
        exit;
    }
    
    private function generateTimeSlots($date) {
        $slots = [];
        $start = strtotime(WORKING_HOURS_START);
        $end = strtotime(WORKING_HOURS_END);
        $duration = APPOINTMENT_DURATION * 60; // en secondes
        
        // Ne pas proposer de créneaux dans le passé
        $now = time();
        $selectedDate = strtotime($date);
        
        for ($time = $start; $time < $end; $time += $duration) {
            $slotTime = date('H:i', $time);
            $slotDateTime = strtotime($date . ' ' . $slotTime);
            
            // Vérifier si le créneau n'est pas dans le passé
            if ($slotDateTime > $now) {
                $slots[] = $slotTime;
            }
        }
        
        return $slots;
    }
    
    public function submit() {
        header('Content-Type: application/json');
        
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['success' => false, 'message' => 'Méthode non autorisée']);
            exit;
        }
        
        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $phone = trim($_POST['phone'] ?? '');
        $appointmentDate = $_POST['appointment_date'] ?? '';
        $appointmentTime = $_POST['appointment_time'] ?? '';
        $serviceType = $_POST['service_type'] ?? '';
        $message = trim($_POST['message'] ?? '');
        $paymentMethod = $_POST['payment_method'] ?? '';
        
        // Validation
        $errors = [];
        if (empty($name)) $errors[] = 'Le nom est requis';
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Email valide requis';
        }
        if (empty($appointmentDate) || !strtotime($appointmentDate)) {
            $errors[] = 'Date de rendez-vous invalide';
        }
        if (empty($appointmentTime)) {
            $errors[] = 'Heure de rendez-vous requise';
        }
        if (!in_array($paymentMethod, [PAYMENT_ON_SITE, PAYMENT_ONLINE])) {
            $errors[] = 'Mode de paiement invalide';
        }
        
        // Vérifier la disponibilité du créneau
        if (empty($errors)) {
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM appointments WHERE appointment_date = ? AND appointment_time = ? AND status != 'cancelled'");
            $stmt->execute([$appointmentDate, $appointmentTime]);
            if ($stmt->fetchColumn() > 0) {
                $errors[] = 'Ce créneau n\'est plus disponible';
            }
        }
        
        if (!empty($errors)) {
            echo json_encode(['success' => false, 'errors' => $errors]);
            exit;
        }
        
        try {
            $this->db->beginTransaction();
            
            $stmt = $this->db->prepare("
                INSERT INTO appointments (name, email, phone, appointment_date, appointment_time, service_type, message, payment_method, price) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
            ");
            
            $success = $stmt->execute([
                $name, $email, $phone, $appointmentDate, $appointmentTime, 
                $serviceType, $message, $paymentMethod, APPOINTMENT_PRICE
            ]);
            
            if ($success) {
                $appointmentId = $this->db->lastInsertId();
                $this->db->commit();
                
                $response = [
                    'success' => true,
                    'message' => 'Votre rendez-vous a été réservé avec succès!',
                    'appointment_id' => $appointmentId,
                    'price' => APPOINTMENT_PRICE
                ];
                
                if ($paymentMethod === PAYMENT_ONLINE) {
                    $response['payment_required'] = true;
                    $response['payment_info'] = [
                        'amount' => APPOINTMENT_PRICE,
                        'currency' => 'EUR',
                        'description' => 'Consultation juridique - ' . date('d/m/Y à H:i', strtotime($appointmentDate . ' ' . $appointmentTime))
                    ];
                }
                
                echo json_encode($response);
            } else {
                throw new Exception('Erreur lors de la réservation');
            }
            
        } catch (Exception $e) {
            $this->db->rollBack();
            echo json_encode(['success' => false, 'message' => 'Erreur lors de la réservation: ' . $e->getMessage()]);
        }
        
        exit;
    }
}
?>