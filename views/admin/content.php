<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion du contenu - Administration</title>
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
            overflow-y: auto;
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

        .tabs {
            display: flex;
            background: white;
            border-radius: 15px;
            padding: 0.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .tab {
            flex: 1;
            padding: 1rem;
            text-align: center;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
            color: #6b7280;
        }

        .tab.active {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            color: white;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .section-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            margin-bottom: 2rem;
        }

        .section-title {
            font-size: 1.3rem;
            margin-bottom: 1.5rem;
            color: #1f2937;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.5rem;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            font-weight: 600;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            color: white;
        }

        .btn-secondary {
            background: #6b7280;
            color: white;
        }

        .btn-success {
            background: #10b981;
            color: white;
        }

        .btn-danger {
            background: #ef4444;
            color: white;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
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

        .content-grid {
            display: grid;
            gap: 1rem;
        }

        .content-item {
            display: grid;
            grid-template-columns: 200px 200px 1fr auto;
            gap: 1rem;
            align-items: center;
            padding: 1rem;
            background: #f8fafc;
            border-radius: 10px;
            border: 2px solid #e5e7eb;
        }

        .content-item input {
            margin: 0;
        }

        .services-grid {
            display: grid;
            gap: 1.5rem;
        }

        .service-item {
            background: #f8fafc;
            border-radius: 15px;
            padding: 1.5rem;
            border: 2px solid #e5e7eb;
        }

        .service-header {
            display: flex;
            justify-content: between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .service-icon-preview {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            margin-right: 1rem;
        }

        .team-grid {
            display: grid;
            gap: 1.5rem;
        }

        .team-item {
            background: #f8fafc;
            border-radius: 15px;
            padding: 1.5rem;
            border: 2px solid #e5e7eb;
        }

        .team-preview {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .team-image-preview {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            overflow: hidden;
            border: 3px solid #e5e7eb;
        }

        .team-image-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .news-events-grid {
            display: grid;
            gap: 1.5rem;
        }

        .news-event-item {
            background: #f8fafc;
            border-radius: 15px;
            padding: 1.5rem;
            border: 2px solid #e5e7eb;
        }

        .news-event-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .news-event-type {
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .news-event-type.news {
            background: #dbeafe;
            color: #1e40af;
        }

        .news-event-type.event {
            background: #fef3c7;
            color: #92400e;
        }

        .color-picker {
            width: 50px;
            height: 40px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .file-upload-area {
            border: 2px dashed #e5e7eb;
            border-radius: 10px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .file-upload-area:hover {
            border-color: #3b82f6;
            background: #f0f9ff;
        }

        .file-upload-area input[type="file"] {
            display: none;
        }

        .current-image {
            max-width: 100px;
            max-height: 100px;
            border-radius: 10px;
            margin-top: 1rem;
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
            
            .tabs {
                flex-direction: column;
            }
            
            .content-item {
                grid-template-columns: 1fr;
                text-align: center;
            }
            
            .form-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="admin-layout">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2><?php echo SITE_NAME; ?></h2>
                <p>Administration</p>
            </div>
            <ul class="sidebar-nav">
                <li><a href="/admin/dashboard">
                    <i class="fas fa-chart-line"></i>
                    Tableau de bord
                </a></li>
                <li><a href="/admin/content" class="active">
                    <i class="fas fa-edit"></i>
                    Contenu du site
                </a></li>
                <li><a href="/admin/contacts">
                    <i class="fas fa-envelope"></i>
                    Messages
                </a></li>
                <li><a href="/admin/appointments">
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
                <h1>Gestion du contenu</h1>
                <div class="breadcrumb">Administration / Contenu du site</div>
            </div>

            <?php if (isset($success)): ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    <?php echo htmlspecialchars($success); ?>
                </div>
            <?php endif; ?>

            <!-- Tabs -->
            <div class="tabs">
                <div class="tab active" onclick="showTab('content')">
                    <i class="fas fa-file-alt"></i>
                    Contenu du site
                </div>
                <div class="tab" onclick="showTab('services')">
                    <i class="fas fa-gavel"></i>
                    Services
                </div>
                <div class="tab" onclick="showTab('team')">
                    <i class="fas fa-users"></i>
                    Équipe
                </div>
                <div class="tab" onclick="showTab('news-events')">
                    <i class="fas fa-newspaper"></i>
                    Actualités & Événements
                </div>
            </div>

            <!-- Content Tab -->
            <div id="content-tab" class="tab-content active">
                <div class="section-card">
                    <h2 class="section-title">
                        <i class="fas fa-file-alt"></i>
                        Contenu du site
                    </h2>

                    <form method="POST">
                        <input type="hidden" name="action" value="update_content">
                        
                        <?php foreach ($content as $section => $keys): ?>
                            <h3 style="color: #3b82f6; margin: 2rem 0 1rem; font-size: 1.2rem; text-transform: capitalize;">
                                <?php echo htmlspecialchars($section); ?>
                            </h3>
                            
                            <div class="content-grid">
                                <?php foreach ($keys as $key => $value): ?>
                                    <div class="content-item">
                                        <label><?php echo htmlspecialchars($key); ?></label>
                                        <input type="text" name="content[<?php echo htmlspecialchars($section); ?>][<?php echo htmlspecialchars($key); ?>]" 
                                               value="<?php echo htmlspecialchars($value); ?>">
                                        <button type="button" class="btn btn-danger" onclick="deleteContent('<?php echo htmlspecialchars($section); ?>', '<?php echo htmlspecialchars($key); ?>')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endforeach; ?>

                        <div style="margin-top: 2rem;">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i>
                                Sauvegarder les modifications
                            </button>
                        </div>
                    </form>

                    <!-- Add new content -->
                    <hr style="margin: 2rem 0;">
                    <h3 style="color: #3b82f6; margin-bottom: 1rem;">Ajouter du contenu</h3>
                    
                    <form method="POST">
                        <input type="hidden" name="action" value="add_content_section">
                        <div class="form-row">
                            <div class="form-group">
                                <label>Section</label>
                                <input type="text" name="new_section" placeholder="ex: hero, about, contact..." required>
                            </div>
                            <div class="form-group">
                                <label>Clé</label>
                                <input type="text" name="new_key" placeholder="ex: title, subtitle..." required>
                            </div>
                            <div class="form-group">
                                <label>Valeur</label>
                                <input type="text" name="new_value" placeholder="Contenu..." required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-plus"></i>
                            Ajouter
                        </button>
                    </form>
                </div>
            </div>

            <!-- Services Tab -->
            <div id="services-tab" class="tab-content">
                <div class="section-card">
                    <h2 class="section-title">
                        <i class="fas fa-gavel"></i>
                        Gestion des services
                    </h2>

                    <div class="services-grid">
                        <?php foreach ($services as $service): ?>
                            <div class="service-item">
                                <div class="service-header">
                                    <div style="display: flex; align-items: center;">
                                        <div class="service-icon-preview" style="background: <?php echo htmlspecialchars($service['color']); ?>;">
                                            <i class="<?php echo htmlspecialchars($service['icon']); ?>"></i>
                                        </div>
                                        <h4><?php echo htmlspecialchars($service['title']); ?></h4>
                                    </div>
                                    <button type="button" class="btn btn-danger" onclick="deleteService(<?php echo $service['id']; ?>)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>

                                <form method="POST">
                                    <input type="hidden" name="action" value="update_service">
                                    <input type="hidden" name="service_id" value="<?php echo $service['id']; ?>">
                                    
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label>Titre</label>
                                            <input type="text" name="title" value="<?php echo htmlspecialchars($service['title']); ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Icône (classe Font Awesome)</label>
                                            <input type="text" name="icon" value="<?php echo htmlspecialchars($service['icon']); ?>" placeholder="fas fa-gavel">
                                        </div>
                                        <div class="form-group">
                                            <label>Couleur</label>
                                            <input type="color" name="color" value="<?php echo htmlspecialchars($service['color']); ?>" class="color-picker">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Description courte</label>
                                        <textarea name="description" required><?php echo htmlspecialchars($service['description']); ?></textarea>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Contenu détaillé</label>
                                        <textarea name="detailed_content" style="min-height: 200px;"><?php echo htmlspecialchars($service['detailed_content'] ?? ''); ?></textarea>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i>
                                        Mettre à jour
                                    </button>
                                </form>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Add new service -->
                    <hr style="margin: 2rem 0;">
                    <h3 style="color: #3b82f6; margin-bottom: 1rem;">Ajouter un service</h3>
                    
                    <form method="POST">
                        <input type="hidden" name="action" value="add_service">
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label>Titre</label>
                                <input type="text" name="title" required>
                            </div>
                            <div class="form-group">
                                <label>Icône (classe Font Awesome)</label>
                                <input type="text" name="icon" value="fas fa-gavel" placeholder="fas fa-gavel">
                            </div>
                            <div class="form-group">
                                <label>Couleur</label>
                                <input type="color" name="color" value="#3b82f6" class="color-picker">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Description courte</label>
                            <textarea name="description" required></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label>Contenu détaillé</label>
                            <textarea name="detailed_content" style="min-height: 200px;"></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-plus"></i>
                            Ajouter le service
                        </button>
                    </form>
                </div>
            </div>

            <!-- Team Tab -->
            <div id="team-tab" class="tab-content">
                <div class="section-card">
                    <h2 class="section-title">
                        <i class="fas fa-users"></i>
                        Gestion de l'équipe
                    </h2>

                    <div class="team-grid">
                        <?php foreach ($team as $member): ?>
                            <div class="team-item">
                                <div class="team-preview">
                                    <div class="team-image-preview">
                                        <img src="<?php echo htmlspecialchars($member['image_path']); ?>" 
                                             alt="<?php echo htmlspecialchars($member['name']); ?>"
                                             onerror="this.src='https://images.pexels.com/photos/5668473/pexels-photo-5668473.jpeg?auto=compress&cs=tinysrgb&w=300'">
                                    </div>
                                    <div>
                                        <h4><?php echo htmlspecialchars($member['name']); ?></h4>
                                        <p style="color: #6b7280;"><?php echo htmlspecialchars($member['position']); ?></p>
                                    </div>
                                    <button type="button" class="btn btn-danger" onclick="deleteTeamMember(<?php echo $member['id']; ?>)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>

                                <form method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="action" value="update_team">
                                    <input type="hidden" name="team_id" value="<?php echo $member['id']; ?>">
                                    
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label>Nom</label>
                                            <input type="text" name="name" value="<?php echo htmlspecialchars($member['name']); ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Poste</label>
                                            <input type="text" name="position" value="<?php echo htmlspecialchars($member['position']); ?>" required>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" required><?php echo htmlspecialchars($member['description']); ?></textarea>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Photo (laisser vide pour conserver l'actuelle)</label>
                                        <div class="file-upload-area" onclick="document.getElementById('team-image-<?php echo $member['id']; ?>').click()">
                                            <input type="file" id="team-image-<?php echo $member['id']; ?>" name="image" accept="image/*">
                                            <i class="fas fa-cloud-upload-alt" style="font-size: 2rem; color: #6b7280; margin-bottom: 0.5rem;"></i>
                                            <p>Cliquez pour changer la photo</p>
                                        </div>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i>
                                        Mettre à jour
                                    </button>
                                </form>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Add new team member -->
                    <hr style="margin: 2rem 0;">
                    <h3 style="color: #3b82f6; margin-bottom: 1rem;">Ajouter un membre</h3>
                    
                    <form method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="add_team">
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label>Nom</label>
                                <input type="text" name="name" required>
                            </div>
                            <div class="form-group">
                                <label>Poste</label>
                                <input type="text" name="position" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" required></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label>Photo</label>
                            <div class="file-upload-area" onclick="document.getElementById('new-team-image').click()">
                                <input type="file" id="new-team-image" name="image" accept="image/*" required>
                                <i class="fas fa-cloud-upload-alt" style="font-size: 2rem; color: #6b7280; margin-bottom: 0.5rem;"></i>
                                <p>Cliquez pour sélectionner une photo</p>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-plus"></i>
                            Ajouter le membre
                        </button>
                    </form>
                </div>
            </div>

            <!-- News & Events Tab -->
            <div id="news-events-tab" class="tab-content">
                <div class="section-card">
                    <h2 class="section-title">
                        <i class="fas fa-newspaper"></i>
                        Actualités & Événements
                    </h2>

                    <div class="news-events-grid">
                        <?php foreach ($newsEvents as $item): ?>
                            <div class="news-event-item">
                                <div class="news-event-header">
                                    <span class="news-event-type <?php echo $item['type']; ?>">
                                        <?php echo $item['type'] === 'news' ? 'Actualité' : 'Événement'; ?>
                                    </span>
                                    <button type="button" class="btn btn-danger" onclick="deleteNewsEvent(<?php echo $item['id']; ?>)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>

                                <form method="POST">
                                    <input type="hidden" name="action" value="update_news_event">
                                    <input type="hidden" name="news_event_id" value="<?php echo $item['id']; ?>">
                                    
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label>Titre</label>
                                            <input type="text" name="title" value="<?php echo htmlspecialchars($item['title']); ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Type</label>
                                            <select name="type" required>
                                                <option value="news" <?php echo $item['type'] === 'news' ? 'selected' : ''; ?>>Actualité</option>
                                                <option value="event" <?php echo $item['type'] === 'event' ? 'selected' : ''; ?>>Événement</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Date de l'événement (optionnel)</label>
                                            <input type="date" name="event_date" value="<?php echo $item['event_date']; ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Contenu</label>
                                        <textarea name="content" style="min-height: 150px;" required><?php echo htmlspecialchars($item['content']); ?></textarea>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" name="is_published" <?php echo $item['is_published'] ? 'checked' : ''; ?>>
                                            Publié sur le site
                                        </label>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i>
                                        Mettre à jour
                                    </button>
                                </form>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Add new news/event -->
                    <hr style="margin: 2rem 0;">
                    <h3 style="color: #3b82f6; margin-bottom: 1rem;">Ajouter une actualité/événement</h3>
                    
                    <form method="POST">
                        <input type="hidden" name="action" value="add_news_event">
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label>Titre</label>
                                <input type="text" name="title" required>
                            </div>
                            <div class="form-group">
                                <label>Type</label>
                                <select name="type" required>
                                    <option value="news">Actualité</option>
                                    <option value="event">Événement</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Date de l'événement (optionnel)</label>
                                <input type="date" name="event_date">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Contenu</label>
                            <textarea name="content" style="min-height: 150px;" required></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="is_published" checked>
                                Publier immédiatement sur le site
                            </label>
                        </div>
                        
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-plus"></i>
                            Ajouter
                        </button>
                    </form>
                </div>
            </div>
        </main>
    </div>

    <script>
        function showTab(tabName) {
            // Hide all tab contents
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.remove('active');
            });
            
            // Remove active class from all tabs
            document.querySelectorAll('.tab').forEach(tab => {
                tab.classList.remove('active');
            });
            
            // Show selected tab content
            document.getElementById(tabName + '-tab').classList.add('active');
            
            // Add active class to clicked tab
            event.target.classList.add('active');
        }

        function deleteContent(section, key) {
            if (confirm('Êtes-vous sûr de vouloir supprimer ce contenu ?')) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.innerHTML = `
                    <input type="hidden" name="action" value="delete_content">
                    <input type="hidden" name="content_section" value="${section}">
                    <input type="hidden" name="content_key" value="${key}">
                `;
                document.body.appendChild(form);
                form.submit();
            }
        }

        function deleteService(id) {
            if (confirm('Êtes-vous sûr de vouloir supprimer ce service ?')) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.innerHTML = `
                    <input type="hidden" name="action" value="delete_service">
                    <input type="hidden" name="service_id" value="${id}">
                `;
                document.body.appendChild(form);
                form.submit();
            }
        }

        function deleteTeamMember(id) {
            if (confirm('Êtes-vous sûr de vouloir supprimer ce membre de l\'équipe ?')) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.innerHTML = `
                    <input type="hidden" name="action" value="delete_team">
                    <input type="hidden" name="team_id" value="${id}">
                `;
                document.body.appendChild(form);
                form.submit();
            }
        }

        function deleteNewsEvent(id) {
            if (confirm('Êtes-vous sûr de vouloir supprimer cette actualité/événement ?')) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.innerHTML = `
                    <input type="hidden" name="action" value="delete_news_event">
                    <input type="hidden" name="news_event_id" value="${id}">
                `;
                document.body.appendChild(form);
                form.submit();
            }
        }

        // File upload preview
        document.querySelectorAll('input[type="file"]').forEach(input => {
            input.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        // You can add image preview functionality here
                        console.log('File selected:', file.name);
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
</body>
</html>