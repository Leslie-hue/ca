<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $content['hero']['title'] ?? 'Cabinet Juridique Excellence'; ?></title>
    <meta name="description" content="<?php echo $content['hero']['subtitle'] ?? 'Votre partenaire de confiance pour tous vos besoins juridiques'; ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
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
            --gray-200: #e5e7eb;
            --shadow-light: rgba(0, 0, 0, 0.1);
            --shadow-medium: rgba(0, 0, 0, 0.15);
            --shadow-heavy: rgba(0, 0, 0, 0.25);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            background: var(--white);
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
            border-bottom: 1px solid var(--gray-200);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .header.scrolled {
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
            text-decoration: none;
        }

        .brand-icon {
            width: 3rem;
            height: 3rem;
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 15px rgba(30, 58, 138, 0.3);
        }

        .brand-icon i {
            color: white;
            font-size: 1.25rem;
        }

        .brand-text h1 {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--text-dark);
            margin: 0;
        }

        .brand-text p {
            font-size: 0.75rem;
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
            transition: all 0.3s ease;
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
            border-radius: 0.75rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 0.9rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
            color: white;
            box-shadow: 0 4px 15px rgba(30, 58, 138, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(30, 58, 138, 0.4);
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
            color: white;
            padding: 8rem 0 6rem;
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

        .hero .container {
            position: relative;
            z-index: 2;
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .hero .lead {
            font-size: 1.3rem;
            margin-bottom: 2.5rem;
            opacity: 0.9;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .hero-cta {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-white {
            background: white;
            color: var(--primary-blue);
            font-weight: 700;
        }

        .btn-white:hover {
            background: var(--gray-50);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px var(--shadow-medium);
        }

        /* Section Styles */
        .section {
            padding: 5rem 0;
        }

        .section-alt {
            background: var(--gray-50);
        }

        .section-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--primary-blue);
            margin-bottom: 1rem;
        }

        .section-subtitle {
            font-size: 1.2rem;
            color: var(--text-light);
            max-width: 600px;
            margin: 0 auto;
        }

        /* About Section */
        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .about-text {
            font-size: 1.1rem;
            line-height: 1.8;
            color: var(--text-dark);
        }

        .about-text h3 {
            color: var(--primary-blue);
            font-size: 1.5rem;
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .about-image {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px var(--shadow-medium);
        }

        .about-image img {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }

        /* Values Section */
        .values-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .value-card {
            background: white;
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px var(--shadow-light);
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid var(--gray-100);
        }

        .value-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px var(--shadow-medium);
        }

        .value-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 1.5rem;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: white;
            background: linear-gradient(135deg, var(--secondary-blue), var(--primary-blue));
        }

        .value-card h3 {
            font-size: 1.3rem;
            color: var(--primary-blue);
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .value-card p {
            color: var(--text-light);
            line-height: 1.6;
        }

        /* Success Rate Section */
        .success-stats {
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
            color: white;
            text-align: center;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 3rem;
            margin-top: 3rem;
        }

        .stat-item {
            padding: 2rem;
        }

        .stat-number {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            color: var(--accent-gold);
        }

        .stat-label {
            font-size: 1.1rem;
            opacity: 0.9;
            font-weight: 500;
        }

        /* Services Section */
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .service-card {
            background: white;
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px var(--shadow-light);
            transition: all 0.3s ease;
            border: 1px solid var(--gray-100);
            text-align: center;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px var(--shadow-medium);
        }

        .service-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 1.5rem;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: white;
        }

        .service-card h3 {
            font-size: 1.3rem;
            color: var(--primary-blue);
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .service-card p {
            color: var(--text-light);
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .btn-outline {
            background: transparent;
            border: 2px solid var(--secondary-blue);
            color: var(--secondary-blue);
        }

        .btn-outline:hover {
            background: var(--secondary-blue);
            color: white;
        }

        /* News & Events Section */
        .news-events {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
        }

        .news-section, .events-section {
            background: white;
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px var(--shadow-light);
        }

        .news-section h3, .events-section h3 {
            color: var(--primary-blue);
            font-size: 1.5rem;
            margin-bottom: 2rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .news-item, .event-item {
            padding: 1.5rem 0;
            border-bottom: 1px solid var(--gray-100);
        }

        .news-item:last-child, .event-item:last-child {
            border-bottom: none;
        }

        .news-item h4, .event-item h4 {
            color: var(--text-dark);
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .news-item p, .event-item p {
            color: var(--text-light);
            font-size: 0.9rem;
            line-height: 1.5;
        }

        .event-date {
            background: var(--light-blue);
            color: var(--primary-blue);
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 0.5rem;
        }

        /* Team Section */
        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .team-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px var(--shadow-light);
            transition: all 0.3s ease;
        }

        .team-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px var(--shadow-medium);
        }

        .team-image {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }

        .team-info {
            padding: 2rem;
            text-align: center;
        }

        .team-info h3 {
            color: var(--primary-blue);
            font-size: 1.3rem;
            margin-bottom: 0.5rem;
            font-weight: 700;
        }

        .team-info .position {
            color: var(--accent-gold);
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .team-info p {
            color: var(--text-light);
            line-height: 1.6;
        }

        /* Mission Section */
        .mission-content {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }

        .mission-text {
            font-size: 1.2rem;
            line-height: 1.8;
            color: var(--text-dark);
            margin-bottom: 2rem;
        }

        .mission-highlights {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .mission-highlight {
            padding: 1.5rem;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px var(--shadow-light);
        }

        .mission-highlight i {
            color: var(--secondary-blue);
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .mission-highlight h4 {
            color: var(--primary-blue);
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        /* Contact Section */
        .contact-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: start;
        }

        .contact-form {
            background: white;
            padding: 2.5rem;
            border-radius: 20px;
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
            padding: 0.75rem 1rem;
            border: 2px solid var(--gray-200);
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: var(--gray-50);
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--secondary-blue);
            background: white;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .contact-info {
            background: var(--gray-50);
            padding: 2.5rem;
            border-radius: 20px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .contact-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--secondary-blue), var(--primary-blue));
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
        }

        .contact-details h4 {
            color: var(--primary-blue);
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .contact-details p {
            color: var(--text-light);
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
            color: white;
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .footer-section p,
        .footer-section a {
            color: #9ca3af;
            text-decoration: none;
            line-height: 1.6;
        }

        .footer-section a:hover {
            color: var(--secondary-blue);
        }

        .footer-bottom {
            border-top: 1px solid #374151;
            padding-top: 2rem;
            text-align: center;
            color: #9ca3af;
        }

        /* Responsive Design */
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

            .about-content,
            .contact-content,
            .news-events {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 2rem;
            }

            .stat-number {
                font-size: 2.5rem;
            }
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

        .animate-on-scroll {
            opacity: 0;
            animation: fadeInUp 0.6s ease forwards;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header" id="header">
        <div class="container">
            <a href="#" class="brand-container">
                <div class="brand-icon">
                    <i class="fas fa-balance-scale"></i>
                </div>
                <div class="brand-text">
                    <h1><?php echo $content['hero']['title'] ?? 'Cabinet Excellence'; ?></h1>
                    <p>Avocats Spécialisés</p>
                </div>
            </a>

            <nav class="nav-menu">
                <a href="#about">À propos</a>
                <a href="#values">Nos valeurs</a>
                <a href="#services">Services</a>
                <a href="#team">Équipe</a>
                <a href="#contact">Contact</a>
                <a href="#contact" class="btn btn-primary">
                    <i class="fas fa-calendar-alt"></i>
                    Consultation
                </a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="hero">
        <div class="container">
            <h1><?php echo $content['hero']['title'] ?? 'Cabinet Juridique Excellence'; ?></h1>
            <p class="lead"><?php echo $content['hero']['subtitle'] ?? 'Votre partenaire de confiance pour tous vos besoins juridiques'; ?></p>
            <div class="hero-cta">
                <a href="#contact" class="btn btn-white">
                    <i class="fas fa-calendar-alt"></i>
                    <?php echo $content['hero']['cta_text'] ?? 'Prendre rendez-vous'; ?>
                </a>
                <a href="#services" class="btn btn-primary">
                    <i class="fas fa-gavel"></i>
                    Nos services
                </a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="section" id="about">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title"><?php echo $content['about']['title'] ?? 'À propos de nous'; ?></h2>
                <p class="section-subtitle"><?php echo $content['about']['description'] ?? 'Fort de plus de 20 ans d\'expérience, notre cabinet vous accompagne dans tous vos besoins juridiques avec professionnalisme et rigueur.'; ?></p>
            </div>
            <div class="about-content">
                <div class="about-text">
                    <h3>Excellence et Expertise</h3>
                    <p><?php echo $content['about']['content'] ?? 'Notre cabinet d\'avocats se distingue par son approche personnalisée et son expertise reconnue dans de nombreux domaines du droit. Nous mettons notre savoir-faire au service de nos clients pour leur offrir les meilleures solutions juridiques.'; ?></p>
                    <p><?php echo $content['about']['additional_content'] ?? 'Chaque dossier est traité avec la plus grande attention, dans le respect de la déontologie et avec un souci constant de l\'efficacité et de la transparence.'; ?></p>
                </div>
                <div class="about-image">
                    <img src="https://images.pexels.com/photos/5668473/pexels-photo-5668473.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Cabinet d'avocats" loading="lazy">
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="section section-alt" id="values">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title"><?php echo $content['values']['title'] ?? 'Nos Valeurs'; ?></h2>
                <p class="section-subtitle"><?php echo $content['values']['subtitle'] ?? 'Les principes qui guident notre action au quotidien'; ?></p>
            </div>
            <div class="values-grid">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3><?php echo $content['values']['integrity_title'] ?? 'Intégrité'; ?></h3>
                    <p><?php echo $content['values']['integrity_description'] ?? 'Nous agissons avec honnêteté et transparence dans toutes nos relations professionnelles.'; ?></p>
                </div>
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <h3><?php echo $content['values']['excellence_title'] ?? 'Excellence'; ?></h3>
                    <p><?php echo $content['values']['excellence_description'] ?? 'Nous visons l\'excellence dans chaque dossier et nous formons continuellement.'; ?></p>
                </div>
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h3><?php echo $content['values']['commitment_title'] ?? 'Engagement'; ?></h3>
                    <p><?php echo $content['values']['commitment_description'] ?? 'Nous nous engageons pleinement pour défendre les intérêts de nos clients.'; ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Success Rate Section -->
    <section class="section success-stats" id="success-rate">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title" style="color: white;"><?php echo $content['success']['title'] ?? 'Taux de Réussite'; ?></h2>
                <p class="section-subtitle" style="color: rgba(255,255,255,0.9);"><?php echo $content['success']['subtitle'] ?? 'Des résultats qui parlent d\'eux-mêmes'; ?></p>
            </div>
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number"><?php echo $content['success']['success_rate'] ?? '95%'; ?></div>
                    <div class="stat-label">Taux de réussite</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number"><?php echo $content['success']['clients_count'] ?? '500+'; ?></div>
                    <div class="stat-label">Clients satisfaits</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number"><?php echo $content['success']['experience_years'] ?? '20+'; ?></div>
                    <div class="stat-label">Années d'expérience</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number"><?php echo $content['success']['cases_won'] ?? '1000+'; ?></div>
                    <div class="stat-label">Affaires gagnées</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="section" id="services">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title"><?php echo $content['services']['title'] ?? 'Nos Services'; ?></h2>
                <p class="section-subtitle">Expertise juridique complète dans tous les domaines du droit</p>
            </div>
            <div class="services-grid">
                <?php foreach ($services as $service): ?>
                    <div class="service-card">
                        <div class="service-icon" style="background: <?php echo htmlspecialchars($service['color']); ?>;">
                            <i class="<?php echo htmlspecialchars($service['icon']); ?>"></i>
                        </div>
                        <h3><?php echo htmlspecialchars($service['title']); ?></h3>
                        <p><?php echo htmlspecialchars($service['description']); ?></p>
                        <a href="/service/<?php echo $service['id']; ?>" class="btn btn-outline">
                            En savoir plus
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- News & Events Section -->
    <section class="section section-alt" id="news-events">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Actualités & Événements</h2>
                <p class="section-subtitle">Restez informé de nos dernières actualités et événements</p>
            </div>
            <div class="news-events">
                <!-- News Section -->
                <div class="news-section">
                    <h3>
                        <i class="fas fa-newspaper"></i>
                        Actualités
                    </h3>
                    <?php 
                    $news = array_filter($newsEvents, function($item) { 
                        return $item['type'] === 'news' && $item['is_published']; 
                    });
                    $news = array_slice($news, 0, 3);
                    ?>
                    <?php if (!empty($news)): ?>
                        <?php foreach ($news as $item): ?>
                            <div class="news-item">
                                <h4><?php echo htmlspecialchars($item['title']); ?></h4>
                                <p><?php echo htmlspecialchars(substr($item['content'], 0, 120)) . '...'; ?></p>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="news-item">
                            <h4>Nouvelle réforme du droit du travail</h4>
                            <p>Découvrez les dernières modifications législatives et leur impact sur votre entreprise...</p>
                        </div>
                        <div class="news-item">
                            <h4>Jurisprudence récente en droit immobilier</h4>
                            <p>Analyse des dernières décisions de la Cour de cassation en matière immobilière...</p>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Events Section -->
                <div class="events-section">
                    <h3>
                        <i class="fas fa-calendar-alt"></i>
                        Événements
                    </h3>
                    <?php 
                    $events = array_filter($newsEvents, function($item) { 
                        return $item['type'] === 'event' && $item['is_published']; 
                    });
                    $events = array_slice($events, 0, 3);
                    ?>
                    <?php if (!empty($events)): ?>
                        <?php foreach ($events as $item): ?>
                            <div class="event-item">
                                <?php if ($item['event_date']): ?>
                                    <div class="event-date"><?php echo date('d/m/Y', strtotime($item['event_date'])); ?></div>
                                <?php endif; ?>
                                <h4><?php echo htmlspecialchars($item['title']); ?></h4>
                                <p><?php echo htmlspecialchars(substr($item['content'], 0, 120)) . '...'; ?></p>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="event-item">
                            <div class="event-date">15/03/2025</div>
                            <h4>Conférence sur le droit numérique</h4>
                            <p>Participez à notre conférence sur les enjeux juridiques du numérique...</p>
                        </div>
                        <div class="event-item">
                            <div class="event-date">22/03/2025</div>
                            <h4>Formation droit des sociétés</h4>
                            <p>Session de formation destinée aux entrepreneurs et dirigeants d'entreprise...</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="section" id="team">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title"><?php echo $content['team']['title'] ?? 'Notre Équipe'; ?></h2>
                <p class="section-subtitle">Des professionnels expérimentés à votre service</p>
            </div>
            <div class="team-grid">
                <?php foreach ($team as $member): ?>
                    <div class="team-card">
                        <img src="<?php echo htmlspecialchars($member['image_path']); ?>" 
                             alt="<?php echo htmlspecialchars($member['name']); ?>" 
                             class="team-image"
                             onerror="this.src='https://images.pexels.com/photos/5668473/pexels-photo-5668473.jpeg?auto=compress&cs=tinysrgb&w=300'">
                        <div class="team-info">
                            <h3><?php echo htmlspecialchars($member['name']); ?></h3>
                            <p class="position"><?php echo htmlspecialchars($member['position']); ?></p>
                            <p><?php echo htmlspecialchars($member['description']); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="section section-alt" id="mission">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title"><?php echo $content['mission']['title'] ?? 'Notre Mission'; ?></h2>
            </div>
            <div class="mission-content">
                <p class="mission-text">
                    <?php echo $content['mission']['description'] ?? 'Notre mission est de fournir des services juridiques d\'excellence, en alliant expertise technique et approche humaine. Nous nous engageons à défendre vos intérêts avec détermination et à vous accompagner dans toutes vos démarches juridiques avec professionnalisme et éthique.'; ?>
                </p>
                <div class="mission-highlights">
                    <div class="mission-highlight">
                        <i class="fas fa-bullseye"></i>
                        <h4><?php echo $content['mission']['commitment_title'] ?? 'Engagement'; ?></h4>
                        <p><?php echo $content['mission']['commitment_description'] ?? 'Défendre vos droits avec détermination'; ?></p>
                    </div>
                    <div class="mission-highlight">
                        <i class="fas fa-users"></i>
                        <h4><?php echo $content['mission']['proximity_title'] ?? 'Proximité'; ?></h4>
                        <p><?php echo $content['mission']['proximity_description'] ?? 'Une relation de confiance et d\'écoute'; ?></p>
                    </div>
                    <div class="mission-highlight">
                        <i class="fas fa-lightbulb"></i>
                        <h4><?php echo $content['mission']['innovation_title'] ?? 'Innovation'; ?></h4>
                        <p><?php echo $content['mission']['innovation_description'] ?? 'Des solutions juridiques modernes'; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="section" id="contact">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title"><?php echo $content['contact']['title'] ?? 'Contactez-nous'; ?></h2>
                <p class="section-subtitle">Prenez rendez-vous pour une consultation personnalisée</p>
            </div>
            <div class="contact-content">
                <div class="contact-form">
                    <form id="contactForm">
                        <div class="form-group">
                            <label for="name">Nom complet *</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Téléphone</label>
                            <input type="tel" id="phone" name="phone">
                        </div>
                        <div class="form-group">
                            <label for="subject">Sujet</label>
                            <select id="subject" name="subject">
                                <option value="">Sélectionnez un sujet</option>
                                <option value="consultation">Demande de consultation</option>
                                <option value="droit-affaires">Droit des affaires</option>
                                <option value="droit-famille">Droit de la famille</option>
                                <option value="droit-immobilier">Droit immobilier</option>
                                <option value="autre">Autre</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="message">Message *</label>
                            <textarea id="message" name="message" rows="5" required placeholder="Décrivez votre situation..."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="documents">Documents (optionnel)</label>
                            <input type="file" id="documents" name="documents[]" multiple accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
                            <small style="color: var(--text-light); font-size: 0.8rem;">Formats acceptés: PDF, DOC, DOCX, JPG, PNG (max 10MB par fichier)</small>
                        </div>
                        <button type="submit" class="btn btn-primary" style="width: 100%;">
                            <i class="fas fa-paper-plane"></i>
                            Envoyer le message
                        </button>
                    </form>
                </div>
                <div class="contact-info">
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Adresse</h4>
                            <p><?php echo $content['contact']['address'] ?? '123 Avenue de la Justice, 75001 Paris'; ?></p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Téléphone</h4>
                            <p><?php echo $content['contact']['phone'] ?? '+33 1 23 45 67 89'; ?></p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Email</h4>
                            <p><?php echo $content['contact']['email'] ?? 'contact@cabinet-excellence.fr'; ?></p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Horaires</h4>
                            <p><?php echo $content['contact']['hours'] ?? 'Lun-Ven: 9h-18h<br>Sam: 9h-12h'; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>Cabinet Excellence</h3>
                    <p>Votre partenaire juridique de confiance depuis plus de 20 ans. Nous mettons notre expertise au service de vos droits.</p>
                </div>
                <div class="footer-section">
                    <h3>Services</h3>
                    <p><a href="#services">Droit des affaires</a></p>
                    <p><a href="#services">Droit de la famille</a></p>
                    <p><a href="#services">Droit immobilier</a></p>
                    <p><a href="#services">Droit du travail</a></p>
                </div>
                <div class="footer-section">
                    <h3>Contact</h3>
                    <p><?php echo $content['contact']['address'] ?? '123 Avenue de la Justice, 75001 Paris'; ?></p>
                    <p><?php echo $content['contact']['phone'] ?? '+33 1 23 45 67 89'; ?></p>
                    <p><?php echo $content['contact']['email'] ?? 'contact@cabinet-excellence.fr'; ?></p>
                </div>
            </div>
            <div class="footer-bottom">
                <p><?php echo $content['footer']['copyright'] ?? '© 2025 Cabinet Excellence. Tous droits réservés.'; ?></p>
            </div>
        </div>
    </footer>

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

        // Contact form submission
        document.getElementById('contactForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Envoi en cours...';
            submitBtn.disabled = true;
            
            try {
                const response = await fetch('/contact', {
                    method: 'POST',
                    body: formData
                });
                
                const result = await response.json();
                
                if (result.success) {
                    alert('Votre message a été envoyé avec succès! Nous vous contacterons bientôt.');
                    this.reset();
                } else {
                    alert('Erreur lors de l\'envoi: ' + (result.message || 'Erreur inconnue'));
                }
            } catch (error) {
                alert('Erreur lors de l\'envoi du message. Veuillez réessayer.');
            } finally {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }
        });

        // Animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-on-scroll');
                }
            });
        }, observerOptions);

        // Observe elements for animation
        document.querySelectorAll('.service-card, .value-card, .team-card, .stat-item').forEach(el => {
            observer.observe(el);
        });
    </script>
</body>
</html>