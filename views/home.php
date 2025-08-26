<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($content['hero']['title'] ?? 'Cabinet Juridique Excellence'); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($content['hero']['subtitle'] ?? 'Votre partenaire de confiance pour tous vos besoins juridiques'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        :root {
            --primary-blue: #1e3a8a;
            --secondary-blue: #3b82f6;
            --light-blue: #dbeafe;
            --accent-gold: #f59e0b;
            --text-dark: #1f2937;
            --text-light: #6b7280;
            --white: #ffffff;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --shadow-light: rgba(0, 0, 0, 0.1);
            --shadow-medium: rgba(0, 0, 0, 0.15);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        /* Header */
        .header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            border-bottom: 1px solid var(--gray-100);
            transition: all 0.3s ease;
        }

        .header.scrolled {
            background: rgba(255, 255, 255, 0.98);
            box-shadow: 0 4px 20px var(--shadow-light);
        }

        .header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
        }

        .brand-container {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .brand-icon {
            width: 3rem;
            height: 3rem;
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.3s ease;
        }

        .brand-icon:hover {
            transform: scale(1.05);
        }

        .brand-icon i {
            color: white;
            font-size: 1.25rem;
        }

        .brand-text h1 {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--text-dark);
            margin: 0;
        }

        .brand-text p {
            font-size: 0.7rem;
            color: var(--text-light);
            margin: -0.25rem 0 0 0;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 2rem;
            align-items: center;
        }

        .nav-menu a {
            text-decoration: none;
            color: var(--text-dark);
            font-weight: 500;
            transition: color 0.3s ease;
            position: relative;
        }

        .nav-menu a:hover {
            color: var(--secondary-blue);
        }

        .nav-menu a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--secondary-blue);
            transition: width 0.3s ease;
        }

        .nav-menu a:hover::after {
            width: 100%;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: white;
        }

        .btn-outline {
            background: transparent;
            border: 2px solid var(--primary-blue);
            color: var(--primary-blue);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px var(--shadow-medium);
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
            color: white;
            padding: 8rem 0 4rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="rgba(255,255,255,0.05)" points="0,1000 1000,800 1000,1000"/></svg>');
            background-size: cover;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            animation: fadeInUp 1s ease;
        }

        .hero .lead {
            font-size: 1.3rem;
            margin-bottom: 2rem;
            opacity: 0.9;
            animation: fadeInUp 1s ease 0.2s both;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
            animation: fadeInUp 1s ease 0.4s both;
        }

        .btn-white {
            background: white;
            color: var(--primary-blue);
        }

        .btn-white:hover {
            background: var(--gray-50);
        }

        /* About Section */
        .about {
            padding: 5rem 0;
            background: var(--gray-50);
        }

        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .about-text h2 {
            font-size: 2.5rem;
            color: var(--primary-blue);
            margin-bottom: 1.5rem;
            font-weight: 700;
        }

        .about-text p {
            font-size: 1.1rem;
            line-height: 1.8;
            color: var(--text-light);
            margin-bottom: 2rem;
        }

        .about-features {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .feature-icon {
            width: 3rem;
            height: 3rem;
            background: linear-gradient(135deg, var(--accent-gold), #d97706);
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
        }

        .feature-text {
            font-weight: 600;
            color: var(--text-dark);
        }

        .about-image {
            position: relative;
        }

        .about-image img {
            width: 100%;
            border-radius: 1rem;
            box-shadow: 0 20px 40px var(--shadow-light);
        }

        /* Services Section */
        .services {
            padding: 5rem 0;
            background: white;
        }

        .section-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-header h2 {
            font-size: 2.5rem;
            color: var(--primary-blue);
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .section-header p {
            font-size: 1.1rem;
            color: var(--text-light);
            max-width: 600px;
            margin: 0 auto;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .service-card {
            background: white;
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 10px 30px var(--shadow-light);
            transition: all 0.3s ease;
            border: 2px solid transparent;
            position: relative;
            overflow: hidden;
        }

        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, var(--secondary-blue), var(--primary-blue));
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .service-card:hover::before {
            transform: scaleX(1);
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px var(--shadow-medium);
        }

        .service-icon {
            width: 4rem;
            height: 4rem;
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
            color: white;
        }

        .service-card h3 {
            font-size: 1.3rem;
            color: var(--text-dark);
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .service-card p {
            color: var(--text-light);
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .service-link {
            color: var(--secondary-blue);
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: gap 0.3s ease;
        }

        .service-link:hover {
            gap: 1rem;
        }

        /* News & Events Section */
        .news-events {
            padding: 5rem 0;
            background: var(--gray-50);
        }

        .news-events-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
        }

        .news-event-card {
            background: white;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 10px 30px var(--shadow-light);
            transition: all 0.3s ease;
        }

        .news-event-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px var(--shadow-medium);
        }

        .news-event-header {
            padding: 1.5rem;
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
            color: white;
        }

        .news-event-type {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 1rem;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            margin-bottom: 1rem;
        }

        .news-event-title {
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .news-event-date {
            font-size: 0.9rem;
            opacity: 0.8;
        }

        .news-event-content {
            padding: 1.5rem;
        }

        .news-event-text {
            color: var(--text-light);
            line-height: 1.6;
        }

        /* Team Section */
        .team {
            padding: 5rem 0;
            background: white;
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .team-card {
            background: white;
            border-radius: 1rem;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 10px 30px var(--shadow-light);
            transition: all 0.3s ease;
        }

        .team-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px var(--shadow-medium);
        }

        .team-image {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin: 0 auto 1.5rem;
            overflow: hidden;
            border: 4px solid var(--light-blue);
        }

        .team-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .team-card h3 {
            font-size: 1.3rem;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
            font-weight: 700;
        }

        .team-position {
            color: var(--secondary-blue);
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .team-description {
            color: var(--text-light);
            line-height: 1.6;
        }

        /* Contact Section */
        .contact {
            padding: 5rem 0;
            background: var(--gray-50);
        }

        .contact-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
        }

        .contact-info h3 {
            font-size: 1.5rem;
            color: var(--primary-blue);
            margin-bottom: 2rem;
            font-weight: 700;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .contact-icon {
            width: 3rem;
            height: 3rem;
            background: linear-gradient(135deg, var(--secondary-blue), var(--primary-blue));
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
        }

        .contact-text {
            color: var(--text-dark);
            font-weight: 500;
        }

        /* Contact Form */
        .contact-form {
            background: white;
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 10px 30px var(--shadow-light);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid var(--gray-100);
            border-radius: 0.5rem;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--secondary-blue);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .appointment-section {
            background: var(--light-blue);
            border-radius: 0.5rem;
            padding: 1.5rem;
            margin: 1rem 0;
            display: none;
        }

        .appointment-section.active {
            display: block;
        }

        .appointment-section h4 {
            color: var(--primary-blue);
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .time-slots {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
            gap: 0.5rem;
            margin: 1rem 0;
        }

        .time-slot {
            padding: 0.5rem;
            border: 2px solid var(--gray-100);
            border-radius: 0.5rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: white;
        }

        .time-slot:hover {
            border-color: var(--secondary-blue);
        }

        .time-slot.selected {
            background: var(--secondary-blue);
            color: white;
            border-color: var(--secondary-blue);
        }

        .time-slot.unavailable {
            background: var(--gray-100);
            color: var(--text-light);
            cursor: not-allowed;
        }

        .payment-options {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin: 1rem 0;
        }

        .payment-option {
            padding: 1rem;
            border: 2px solid var(--gray-100);
            border-radius: 0.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
        }

        .payment-option:hover {
            border-color: var(--secondary-blue);
        }

        .payment-option.selected {
            border-color: var(--secondary-blue);
            background: var(--light-blue);
        }

        .payment-option input[type="radio"] {
            display: none;
        }

        .file-upload {
            position: relative;
            display: inline-block;
            cursor: pointer;
            width: 100%;
        }

        .file-upload input[type="file"] {
            position: absolute;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .file-upload-label {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.75rem;
            border: 2px dashed var(--gray-100);
            border-radius: 0.5rem;
            transition: all 0.3s ease;
            color: var(--text-light);
        }

        .file-upload:hover .file-upload-label {
            border-color: var(--secondary-blue);
            color: var(--secondary-blue);
        }

        .file-list {
            margin-top: 0.5rem;
        }

        .file-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.5rem;
            background: var(--gray-50);
            border-radius: 0.25rem;
            margin-bottom: 0.25rem;
        }

        .file-remove {
            background: var(--accent-gold);
            color: white;
            border: none;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            cursor: pointer;
            font-size: 0.8rem;
        }

        /* Footer */
        .footer {
            background: var(--text-dark);
            color: white;
            padding: 3rem 0 1rem;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-section h3 {
            margin-bottom: 1rem;
            color: white;
        }

        .footer-section p,
        .footer-section a {
            color: #d1d5db;
            text-decoration: none;
            line-height: 1.6;
        }

        .footer-section a:hover {
            color: white;
        }

        .footer-bottom {
            border-top: 1px solid #374151;
            padding-top: 1rem;
            text-align: center;
            color: #9ca3af;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in-up {
            animation: fadeInUp 0.6s ease forwards;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav-menu {
                display: none;
            }

            .hero h1 {
                font-size: 2.5rem;
            }

            .hero .lead {
                font-size: 1.1rem;
            }

            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }

            .about-content,
            .contact-content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .about-features {
                grid-template-columns: 1fr;
            }

            .services-grid,
            .team-grid,
            .news-events-grid {
                grid-template-columns: 1fr;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .payment-options {
                grid-template-columns: 1fr;
            }

            .time-slots {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        /* Loading and Success States */
        .loading {
            opacity: 0.7;
            pointer-events: none;
        }

        .success-message {
            background: #d1fae5;
            color: #065f46;
            padding: 1rem;
            border-radius: 0.5rem;
            margin: 1rem 0;
            display: none;
        }

        .error-message {
            background: #fee2e2;
            color: #991b1b;
            padding: 1rem;
            border-radius: 0.5rem;
            margin: 1rem 0;
            display: none;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 2000;
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background: white;
            border-radius: 1rem;
            padding: 2rem;
            max-width: 500px;
            width: 90%;
            text-align: center;
        }

        .modal-content h3 {
            color: var(--primary-blue);
            margin-bottom: 1rem;
        }

        .modal-content p {
            color: var(--text-light);
            margin-bottom: 2rem;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header" id="header">
        <div class="container">
            <div class="brand-container">
                <div class="brand-icon">
                    <i class="fas fa-balance-scale"></i>
                </div>
                <div class="brand-text">
                    <h1><?php echo htmlspecialchars($content['hero']['title'] ?? 'Cabinet Excellence'); ?></h1>
                    <p>Avocats Spécialisés</p>
                </div>
            </div>

            <nav class="nav-menu">
                <a href="#about">À propos</a>
                <a href="#services">Services</a>
                <a href="#news-events">Actualités</a>
                <a href="#team">Équipe</a>
                <a href="#contact">Contact</a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="hero">
        <div class="container">
            <div class="hero-content">
                <h1><?php echo htmlspecialchars($content['hero']['title'] ?? 'Cabinet Juridique Excellence'); ?></h1>
                <p class="lead"><?php echo htmlspecialchars($content['hero']['subtitle'] ?? 'Votre partenaire de confiance pour tous vos besoins juridiques'); ?></p>
                <div class="hero-buttons">
                    <a href="#contact" class="btn btn-white">
                        <i class="fas fa-calendar-alt"></i>
                        <?php echo htmlspecialchars($content['hero']['cta_text'] ?? 'Prendre rendez-vous'); ?>
                    </a>
                    <a href="#services" class="btn btn-outline">
                        <i class="fas fa-gavel"></i>
                        Nos services
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about" id="about">
        <div class="container">
            <div class="about-content">
                <div class="about-text">
                    <h2><?php echo htmlspecialchars($content['about']['title'] ?? 'À propos de nous'); ?></h2>
                    <p><?php echo htmlspecialchars($content['about']['description'] ?? 'Fort de plus de 20 ans d\'expérience, notre cabinet vous accompagne dans tous vos besoins juridiques avec professionnalisme et rigueur.'); ?></p>
                    
                    <div class="about-features">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-award"></i>
                            </div>
                            <span class="feature-text">20+ ans d'expérience</span>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <span class="feature-text">Équipe d'experts</span>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-handshake"></i>
                            </div>
                            <span class="feature-text">Approche personnalisée</span>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <span class="feature-text">Disponibilité 24/7</span>
                        </div>
                    </div>
                </div>
                <div class="about-image">
                    <img src="/public/images/bareau.jpg" alt="Cabinet juridique" onerror="this.src='https://images.pexels.com/photos/5668882/pexels-photo-5668882.jpeg?auto=compress&cs=tinysrgb&w=600'">
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services" id="services">
        <div class="container">
            <div class="section-header">
                <h2><?php echo htmlspecialchars($content['services']['title'] ?? 'Nos services'); ?></h2>
                <p><?php echo htmlspecialchars($content['services']['subtitle'] ?? 'Des domaines d\'expertise variés pour répondre à tous vos besoins'); ?></p>
            </div>
            
            <div class="services-grid">
                <?php foreach ($services as $service): ?>
                    <div class="service-card">
                        <div class="service-icon" style="background: <?php echo htmlspecialchars($service['color']); ?>;">
                            <i class="<?php echo htmlspecialchars($service['icon']); ?>"></i>
                        </div>
                        <h3><?php echo htmlspecialchars($service['title']); ?></h3>
                        <p><?php echo htmlspecialchars($service['description']); ?></p>
                        <a href="/service/<?php echo $service['id']; ?>" class="service-link">
                            En savoir plus
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- News & Events Section -->
    <?php if (!empty($newsEvents)): ?>
    <section class="news-events" id="news-events">
        <div class="container">
            <div class="section-header">
                <h2>Actualités & Événements</h2>
                <p>Restez informé de nos dernières actualités et événements</p>
            </div>
            
            <div class="news-events-grid">
                <?php foreach ($newsEvents as $item): ?>
                    <div class="news-event-card">
                        <div class="news-event-header">
                            <span class="news-event-type">
                                <?php echo $item['type'] === 'news' ? 'Actualité' : 'Événement'; ?>
                            </span>
                            <h3 class="news-event-title"><?php echo htmlspecialchars($item['title']); ?></h3>
                            <?php if ($item['event_date']): ?>
                                <div class="news-event-date">
                                    <i class="fas fa-calendar"></i>
                                    <?php echo date('d/m/Y', strtotime($item['event_date'])); ?>
                                </div>
                            <?php else: ?>
                                <div class="news-event-date">
                                    <i class="fas fa-clock"></i>
                                    <?php echo date('d/m/Y', strtotime($item['created_at'])); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="news-event-content">
                            <p class="news-event-text"><?php echo nl2br(htmlspecialchars(substr($item['content'], 0, 200))); ?><?php echo strlen($item['content']) > 200 ? '...' : ''; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Team Section -->
    <section class="team" id="team">
        <div class="container">
            <div class="section-header">
                <h2><?php echo htmlspecialchars($content['team']['title'] ?? 'Notre équipe'); ?></h2>
                <p><?php echo htmlspecialchars($content['team']['subtitle'] ?? 'Des experts à votre service'); ?></p>
            </div>
            
            <div class="team-grid">
                <?php foreach ($team as $member): ?>
                    <div class="team-card">
                        <div class="team-image">
                            <img src="<?php echo htmlspecialchars($member['image_path']); ?>" 
                                 alt="<?php echo htmlspecialchars($member['name']); ?>"
                                 onerror="this.src='https://images.pexels.com/photos/5668473/pexels-photo-5668473.jpeg?auto=compress&cs=tinysrgb&w=300'">
                        </div>
                        <h3><?php echo htmlspecialchars($member['name']); ?></h3>
                        <p class="team-position"><?php echo htmlspecialchars($member['position']); ?></p>
                        <p class="team-description"><?php echo htmlspecialchars($member['description']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact" id="contact">
        <div class="container">
            <div class="section-header">
                <h2><?php echo htmlspecialchars($content['contact']['title'] ?? 'Contactez-nous'); ?></h2>
                <p>Prenez rendez-vous ou envoyez-nous un message</p>
            </div>
            
            <div class="contact-content">
                <div class="contact-info">
                    <h3>Informations de contact</h3>
                    
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-text">
                            <?php echo htmlspecialchars($content['contact']['address'] ?? '123 Avenue de la Justice, 75001 Paris'); ?>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="contact-text">
                            <?php echo htmlspecialchars($content['contact']['phone'] ?? '+33 1 23 45 67 89'); ?>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-text">
                            <?php echo htmlspecialchars($content['contact']['email'] ?? 'contact@cabinet-excellence.fr'); ?>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="contact-text">
                            Lun - Ven: 9h00 - 18h00<br>
                            Sam: 9h00 - 12h00
                        </div>
                    </div>
                </div>

                <div class="contact-form">
                    <form id="contactForm" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Type de demande</label>
                            <select name="request_type" id="requestType" required>
                                <option value="">Sélectionnez...</option>
                                <option value="message">Envoyer un message</option>
                                <option value="appointment">Prendre un rendez-vous (50€)</option>
                            </select>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="name">Nom complet *</label>
                                <input type="text" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="phone">Téléphone</label>
                                <input type="tel" id="phone" name="phone">
                            </div>
                            <div class="form-group">
                                <label for="subject">Sujet</label>
                                <select id="subject" name="subject">
                                    <option value="">Sélectionnez un sujet...</option>
                                    <?php foreach ($services as $service): ?>
                                        <option value="<?php echo htmlspecialchars($service['title']); ?>">
                                            <?php echo htmlspecialchars($service['title']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                    <option value="Autre">Autre</option>
                                </select>
                            </div>
                        </div>

                        <!-- Appointment Section -->
                        <div class="appointment-section" id="appointmentSection">
                            <h4><i class="fas fa-calendar-alt"></i> Détails du rendez-vous</h4>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="appointmentDate">Date souhaitée *</label>
                                    <input type="date" id="appointmentDate" name="appointment_date" min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="serviceType">Type de consultation</label>
                                    <select id="serviceType" name="service_type">
                                        <option value="">Sélectionnez...</option>
                                        <?php foreach ($services as $service): ?>
                                            <option value="<?php echo htmlspecialchars($service['title']); ?>">
                                                <?php echo htmlspecialchars($service['title']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                        <option value="Consultation générale">Consultation générale</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Créneaux disponibles</label>
                                <div class="time-slots" id="timeSlots">
                                    <p style="color: var(--text-light); text-align: center; grid-column: 1/-1;">
                                        Sélectionnez une date pour voir les créneaux disponibles
                                    </p>
                                </div>
                                <input type="hidden" id="appointmentTime" name="appointment_time">
                            </div>

                            <div class="form-group">
                                <label>Mode de paiement *</label>
                                <div class="payment-options">
                                    <label class="payment-option">
                                        <input type="radio" name="payment_method" value="on_site">
                                        <div>
                                            <i class="fas fa-money-bill-wave" style="font-size: 1.5rem; color: var(--accent-gold); margin-bottom: 0.5rem;"></i>
                                            <div><strong>Paiement sur place</strong></div>
                                            <small>Réglez lors du rendez-vous</small>
                                        </div>
                                    </label>
                                    <label class="payment-option">
                                        <input type="radio" name="payment_method" value="online">
                                        <div>
                                            <i class="fas fa-credit-card" style="font-size: 1.5rem; color: var(--secondary-blue); margin-bottom: 0.5rem;"></i>
                                            <div><strong>Paiement en ligne</strong></div>
                                            <small>Paiement sécurisé immédiat</small>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <div style="background: var(--light-blue); padding: 1rem; border-radius: 0.5rem; text-align: center;">
                                <strong style="color: var(--primary-blue);">Prix de la consultation: 50€</strong>
                                <br><small style="color: var(--text-light);">Durée: 1 heure</small>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="message">Message *</label>
                            <textarea id="message" name="message" placeholder="Décrivez votre situation ou vos besoins..." required></textarea>
                        </div>

                        <div class="form-group">
                            <label>Documents (optionnel)</label>
                            <div class="file-upload">
                                <input type="file" id="documents" name="documents[]" multiple accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
                                <div class="file-upload-label">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    Cliquez pour ajouter des fichiers
                                </div>
                            </div>
                            <div class="file-list" id="fileList"></div>
                            <small style="color: var(--text-light);">
                                Formats acceptés: PDF, DOC, DOCX, JPG, PNG (max 10MB par fichier)
                            </small>
                        </div>

                        <div class="success-message" id="successMessage"></div>
                        <div class="error-message" id="errorMessage"></div>

                        <button type="submit" class="btn btn-primary" style="width: 100%;">
                            <i class="fas fa-paper-plane"></i>
                            <span id="submitText">Envoyer le message</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3><?php echo htmlspecialchars($content['hero']['title'] ?? 'Cabinet Excellence'); ?></h3>
                    <p>Votre partenaire de confiance pour tous vos besoins juridiques. Excellence, professionnalisme et écoute depuis plus de 20 ans.</p>
                </div>
                
                <div class="footer-section">
                    <h3>Services</h3>
                    <?php foreach (array_slice($services, 0, 4) as $service): ?>
                        <p><a href="/service/<?php echo $service['id']; ?>"><?php echo htmlspecialchars($service['title']); ?></a></p>
                    <?php endforeach; ?>
                </div>
                
                <div class="footer-section">
                    <h3>Contact</h3>
                    <p><?php echo htmlspecialchars($content['contact']['address'] ?? '123 Avenue de la Justice, 75001 Paris'); ?></p>
                    <p><?php echo htmlspecialchars($content['contact']['phone'] ?? '+33 1 23 45 67 89'); ?></p>
                    <p><?php echo htmlspecialchars($content['contact']['email'] ?? 'contact@cabinet-excellence.fr'); ?></p>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p><?php echo htmlspecialchars($content['footer']['copyright'] ?? '© 2025 Cabinet Excellence. Tous droits réservés.'); ?></p>
            </div>
        </div>
    </footer>

    <!-- Payment Modal -->
    <div class="modal" id="paymentModal">
        <div class="modal-content">
            <h3>Paiement en ligne</h3>
            <p>Vous allez être redirigé vers notre plateforme de paiement sécurisée pour régler votre consultation de 50€.</p>
            <div style="display: flex; gap: 1rem; justify-content: center;">
                <button class="btn btn-primary" onclick="processPayment()">
                    <i class="fas fa-credit-card"></i>
                    Procéder au paiement
                </button>
                <button class="btn btn-outline" onclick="closePaymentModal()">
                    Annuler
                </button>
            </div>
        </div>
    </div>

    <script>
        // Header scroll effect
        window.addEventListener('scroll', function() {
            const header = document.getElementById('header');
            if (window.scrollY > 100) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        // Smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });

        // Form handling
        const requestType = document.getElementById('requestType');
        const appointmentSection = document.getElementById('appointmentSection');
        const submitText = document.getElementById('submitText');
        const appointmentDate = document.getElementById('appointmentDate');
        const timeSlots = document.getElementById('timeSlots');
        const appointmentTime = document.getElementById('appointmentTime');

        requestType.addEventListener('change', function() {
            if (this.value === 'appointment') {
                appointmentSection.classList.add('active');
                submitText.textContent = 'Réserver le rendez-vous';
                document.getElementById('message').placeholder = 'Décrivez brièvement le motif de votre consultation...';
            } else {
                appointmentSection.classList.remove('active');
                submitText.textContent = 'Envoyer le message';
                document.getElementById('message').placeholder = 'Décrivez votre situation ou vos besoins...';
            }
        });

        // Date selection and time slots
        appointmentDate.addEventListener('change', function() {
            if (this.value) {
                loadAvailableSlots(this.value);
            }
        });

        function loadAvailableSlots(date) {
            timeSlots.innerHTML = '<p style="color: var(--text-light); text-align: center; grid-column: 1/-1;">Chargement des créneaux...</p>';
            
            fetch(`/appointment/slots?date=${date}`)
                .then(response => response.json())
                .then(data => {
                    if (data.slots && data.slots.length > 0) {
                        timeSlots.innerHTML = '';
                        data.slots.forEach(slot => {
                            const slotElement = document.createElement('div');
                            slotElement.className = 'time-slot';
                            slotElement.textContent = slot;
                            slotElement.addEventListener('click', function() {
                                document.querySelectorAll('.time-slot').forEach(s => s.classList.remove('selected'));
                                this.classList.add('selected');
                                appointmentTime.value = slot;
                            });
                            timeSlots.appendChild(slotElement);
                        });
                    } else {
                        timeSlots.innerHTML = '<p style="color: var(--text-light); text-align: center; grid-column: 1/-1;">Aucun créneau disponible pour cette date</p>';
                    }
                })
                .catch(error => {
                    console.error('Error loading slots:', error);
                    timeSlots.innerHTML = '<p style="color: red; text-align: center; grid-column: 1/-1;">Erreur lors du chargement des créneaux</p>';
                });
        }

        // Payment method selection
        document.querySelectorAll('input[name="payment_method"]').forEach(radio => {
            radio.addEventListener('change', function() {
                document.querySelectorAll('.payment-option').forEach(option => {
                    option.classList.remove('selected');
                });
                this.closest('.payment-option').classList.add('selected');
            });
        });

        // File upload handling
        const documentsInput = document.getElementById('documents');
        const fileList = document.getElementById('fileList');
        let selectedFiles = [];

        documentsInput.addEventListener('change', function() {
            const files = Array.from(this.files);
            selectedFiles = [...selectedFiles, ...files];
            updateFileList();
        });

        function updateFileList() {
            fileList.innerHTML = '';
            selectedFiles.forEach((file, index) => {
                const fileItem = document.createElement('div');
                fileItem.className = 'file-item';
                fileItem.innerHTML = `
                    <span><i class="fas fa-file"></i> ${file.name} (${formatFileSize(file.size)})</span>
                    <button type="button" class="file-remove" onclick="removeFile(${index})">×</button>
                `;
                fileList.appendChild(fileItem);
            });
        }

        function removeFile(index) {
            selectedFiles.splice(index, 1);
            updateFileList();
        }

        function formatFileSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }

        // Form submission
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData();
            const form = this;
            
            // Add form fields
            const formElements = form.elements;
            for (let element of formElements) {
                if (element.name && element.type !== 'file') {
                    formData.append(element.name, element.value);
                }
            }
            
            // Add files
            selectedFiles.forEach(file => {
                formData.append('documents[]', file);
            });
            
            // Validation for appointments
            if (requestType.value === 'appointment') {
                if (!appointmentDate.value) {
                    showError('Veuillez sélectionner une date de rendez-vous');
                    return;
                }
                if (!appointmentTime.value) {
                    showError('Veuillez sélectionner un créneau horaire');
                    return;
                }
                if (!document.querySelector('input[name="payment_method"]:checked')) {
                    showError('Veuillez sélectionner un mode de paiement');
                    return;
                }
            }
            
            // Show loading state
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Envoi en cours...';
            submitBtn.disabled = true;
            
            // Determine endpoint
            const endpoint = requestType.value === 'appointment' ? '/appointment/submit' : '/contact';
            
            fetch(endpoint, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    if (data.payment_required) {
                        // Show payment modal for online payment
                        showPaymentModal(data);
                    } else {
                        showSuccess(data.message);
                        form.reset();
                        selectedFiles = [];
                        updateFileList();
                        appointmentSection.classList.remove('active');
                        submitText.textContent = 'Envoyer le message';
                    }
                } else {
                    showError(data.message || 'Une erreur est survenue');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showError('Erreur de connexion. Veuillez réessayer.');
            })
            .finally(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            });
        });

        function showSuccess(message) {
            const successDiv = document.getElementById('successMessage');
            successDiv.textContent = message;
            successDiv.style.display = 'block';
            document.getElementById('errorMessage').style.display = 'none';
            
            setTimeout(() => {
                successDiv.style.display = 'none';
            }, 5000);
        }

        function showError(message) {
            const errorDiv = document.getElementById('errorMessage');
            errorDiv.textContent = message;
            errorDiv.style.display = 'block';
            document.getElementById('successMessage').style.display = 'none';
            
            setTimeout(() => {
                errorDiv.style.display = 'none';
            }, 5000);
        }

        function showPaymentModal(data) {
            document.getElementById('paymentModal').style.display = 'flex';
            window.appointmentData = data;
        }

        function closePaymentModal() {
            document.getElementById('paymentModal').style.display = 'none';
        }

        function processPayment() {
            // Simulate payment processing
            alert('Redirection vers la plateforme de paiement sécurisée...\n\nDans un vrai système, vous seriez redirigé vers Stripe, PayPal ou une autre plateforme de paiement.');
            closePaymentModal();
            showSuccess('Votre rendez-vous a été réservé avec succès! Un email de confirmation vous sera envoyé.');
            document.getElementById('contactForm').reset();
            selectedFiles = [];
            updateFileList();
            appointmentSection.classList.remove('active');
            submitText.textContent = 'Envoyer le message';
        }

        // Animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in-up');
                }
            });
        }, observerOptions);

        // Observe elements for animation
        document.querySelectorAll('.service-card, .team-card, .news-event-card').forEach(el => {
            observer.observe(el);
        });
    </script>
</body>
</html>