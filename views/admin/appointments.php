<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rendez-vous - Administration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8fafc;
            color: #1f2937;
        }

        .admin-layout {
            display: grid;
            grid-template-columns: 250px 1fr;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            background: linear-gradient(135deg, #1f2937, #111827);
            color: white;
            padding: 2rem 0;
        }

        .sidebar-header {
            text-align: center;
            padding: 0 1rem 2rem;
            border-bottom: 1px solid #374151;
            margin-bottom: 2rem;
        }

        .sidebar-header h2 {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
        }

        .sidebar-header p {
            font-size: 0.8rem;
            color: #9ca3af;
        }

        .sidebar-nav {
            list-style: none;
        }

        .sidebar-nav a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 1rem 1.5rem;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }

        .sidebar-nav a:hover, .sidebar-nav a.active {
            background: rgba(59, 130, 246, 0.1);
            border-left-color: #3b82f6;
        }

        .sidebar-nav i {
            margin-right: 0.75rem;
            width: 20px;
        }

        /* Main Content */
        .main-content {
            padding: 2rem;
        }

        .page-header {
            margin-bottom: 2rem;
        }

        .page-header h1 {
            font-size: 2rem;
            color: #1f2937;
            margin-bottom: 0.5rem;
        }

        .breadcrumb {
            color: #6b7280;
            font-size: 0.9rem;
        }

        .appointments-section {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .section-title {
            font-size: 1.3rem;
            margin-bottom: 1.5rem;
            color: #1f2937;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .appointments-table {
            width: 100%;
            border-collapse: collapse;
        }

        .appointments-table th {
            background: #f8fafc;
            padding: 1rem;
            text-align: left;
            font-weight: 700;
            color: #374151;
            border-bottom: 2px solid #e5e7eb;
            font-size: 0.9rem;
        }

        .appointments-table td {
            padding: 1rem;
            border-bottom: 1px solid #f3f4f6;
            vertical-align: top;
        }

        .appointments-table tr:hover {
            background: #f9fafb;
        }

        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            text-align: center;
            display: inline-block;
            min-width: 80px;
        }

        .status-pending {
            background: #fef3c7;
            color: #92400e;
        }

        .status-confirmed {
            background: #d1fae5;
            color: #065f46;
        }

        .status-cancelled {
            background: #fee2e2;
            color: #991b1b;
        }

        .payment-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            text-align: center;
            display: inline-block;
            min-width: 80px;
        }

        .payment-pending {
            background: #fef3c7;
            color: #92400e;
        }

        .payment-paid {
            background: #d1fae5;
            color: #065f46;
        }

        .payment-on-site {
            background: #e0e7ff;
            color: #3730a3;
        }

        .action-btn {
            padding: 0.5rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 0.8rem;
            margin: 0 0.25rem;
            transition: all 0.3s ease;
        }

        .btn-confirm {
            background: #10b981;
            color: white;
        }

        .btn-cancel {
            background: #f59e0b;
            color: white;
        }

        .btn-delete {
            background: #ef4444;
            color: white;
        }

        .action-btn:hover {
            transform: scale(1.1);
        }

        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: #6b7280;
        }

        .empty-state i {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.3;
        }

        .alert {
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1rem;
            font-weight: 500;
        }

        .alert-success {
            background: #d1fae5;
            color: #065f46;
            border: 1px solid #a7f3d0;
        }

        .client-info {
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 0.25rem;
        }

        .client-details {
            font-size: 0.85rem;
            color: #6b7280;
        }

        .appointment-details {
            font-weight: 500;
            color: #374151;
            margin-bottom: 0.25rem;
        }

        .appointment-meta {
            font-size: 0.85rem;
            color: #6b7280;
        }

        @media (max-width: 768px) {
            .admin-layout {
                grid-template-columns: 1fr;
            }
            
            .sidebar {
                display: none;
            }
            
            .main-content {
                padding: 1rem;
            }
            
            .appointments-table {
                font-size: 0.8rem;
            }
        }
    </style>
</head>
<body>
    <div class="admin-layout">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2><?php echo defined('SITE_NAME') ? SITE_NAME : 'Cabinet Excellence'; ?></h2>
                <p>Administration</p>
            </div>
            <ul class="sidebar-nav">
                <li><a href="/admin/dashboard">
                    <i class="fas fa-chart-line"></i>
                    Tableau de bord
                </a></li>
                <li><a href="/admin/content">
                    <i class="fas fa-edit"></i>
                    Contenu du site
                </a></li>
                <li><a href="/admin/contacts">
                    <i class="fas fa-envelope"></i>
                    Messages
                </a></li>
                <li><a href="/admin/appointments" class="active">
                    <i class="fas fa-calendar-alt"></i>
                    Rendez-vous
                </a></li>
                <li><a href="/admin/settings">
                    <i class="fas fa-cog"></i>
                    Paramètres
                </a></li>
                <li><a href="/" target="_blank">
                    <i class="fas fa-external-link-alt"></i>
                    Voir le site
                </a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <div class="page-header">
                <h1>Gestion des rendez-vous</h1>
                <div class="breadcrumb">Administration / Rendez-vous</div>
            </div>

            <?php if (isset($success)): ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    <?php echo htmlspecialchars($success); ?>
                </div>
            <?php endif; ?>

            <div class="appointments-section">
                <h2 class="section-title">
                    <i class="fas fa-calendar-alt"></i>
                    Liste des rendez-vous
                    <span style="margin-left: auto; font-size: 0.9rem; color: #6b7280;">
                        <?php echo count($appointments); ?> rendez-vous
                    </span>
                </h2>
                
                <?php if (empty($appointments)): ?>
                    <div class="empty-state">
                        <i class="fas fa-calendar-times"></i>
                        <h3>Aucun rendez-vous</h3>
                        <p>Il n'y a pas de rendez-vous programmés pour le moment.</p>
                    </div>
                <?php else: ?>
                    <div style="overflow-x: auto;">
                        <table class="appointments-table">
                            <thead>
                                <tr>
                                    <th>Client</th>
                                    <th>Rendez-vous</th>
                                    <th>Service</th>
                                    <th>Paiement</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($appointments as $appointment): ?>
                                    <tr>
                                        <td>
                                            <div class="client-info"><?php echo htmlspecialchars($appointment['name']); ?></div>
                                            <div class="client-details">
                                                <i class="fas fa-envelope"></i> <?php echo htmlspecialchars($appointment['email']); ?>
                                                <?php if (!empty($appointment['phone'])): ?>
                                                    <br><i class="fas fa-phone"></i> <?php echo htmlspecialchars($appointment['phone']); ?>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="appointment-details">
                                                <i class="fas fa-calendar"></i> <?php echo date('d/m/Y', strtotime($appointment['appointment_date'])); ?>
                                            </div>
                                            <div class="appointment-meta">
                                                <i class="fas fa-clock"></i> <?php echo date('H:i', strtotime($appointment['appointment_time'])); ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="appointment-details">
                                                <?php echo htmlspecialchars($appointment['service_type'] ?: 'Consultation générale'); ?>
                                            </div>
                                            <?php if (!empty($appointment['message'])): ?>
                                                <div class="appointment-meta">
                                                    <?php echo htmlspecialchars(substr($appointment['message'], 0, 50)) . (strlen($appointment['message']) > 50 ? '...' : ''); ?>
                                                </div>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div style="margin-bottom: 0.5rem;">
                                                <strong><?php echo number_format($appointment['price'], 2); ?>€</strong>
                                            </div>
                                            <span class="payment-badge <?php 
                                                if ($appointment['payment_method'] === 'on_site') {
                                                    echo 'payment-on-site';
                                                } elseif ($appointment['payment_status'] === 'paid') {
                                                    echo 'payment-paid';
                                                } else {
                                                    echo 'payment-pending';
                                                }
                                            ?>">
                                                <?php 
                                                if ($appointment['payment_method'] === 'on_site') {
                                                    echo 'Sur place';
                                                } elseif ($appointment['payment_status'] === 'paid') {
                                                    echo 'Payé';
                                                } else {
                                                    echo 'En attente';
                                                }
                                                ?>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="status-badge status-<?php echo $appointment['status']; ?>">
                                                <?php 
                                                switch($appointment['status']) {
                                                    case 'pending': echo 'En attente'; break;
                                                    case 'confirmed': echo 'Confirmé'; break;
                                                    case 'cancelled': echo 'Annulé'; break;
                                                    default: echo ucfirst($appointment['status']);
                                                }
                                                ?>
                                            </span>
                                        </td>
                                        <td>
                                            <?php if ($appointment['status'] === 'pending'): ?>
                                                <button class="action-btn btn-confirm" onclick="confirmAppointment(<?php echo $appointment['id']; ?>)" title="Confirmer">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            <?php endif; ?>
                                            
                                            <?php if ($appointment['status'] !== 'cancelled'): ?>
                                                <button class="action-btn btn-cancel" onclick="cancelAppointment(<?php echo $appointment['id']; ?>)" title="Annuler">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            <?php endif; ?>
                                            
                                            <button class="action-btn btn-delete" onclick="deleteAppointment(<?php echo $appointment['id']; ?>)" title="Supprimer">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </main>
    </div>

    <script>
        function confirmAppointment(id) {
            if (confirm('Confirmer ce rendez-vous ?')) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.innerHTML = `
                    <input type="hidden" name="action" value="confirm">
                    <input type="hidden" name="id" value="${id}">
                `;
                document.body.appendChild(form);
                form.submit();
            }
        }

        function cancelAppointment(id) {
            if (confirm('Annuler ce rendez-vous ?')) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.innerHTML = `
                    <input type="hidden" name="action" value="cancel">
                    <input type="hidden" name="id" value="${id}">
                `;
                document.body.appendChild(form);
                form.submit();
            }
        }

        function deleteAppointment(id) {
            if (confirm('Êtes-vous sûr de vouloir supprimer ce rendez-vous ? Cette action est irréversible.')) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.innerHTML = `
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="id" value="${id}">
                `;
                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>
</body>
</html>