<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Éloge du Monde - Voyages sur mesure</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        /* Reset */
        /* Rest of previous styles... */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: #1a1a1a;
            line-height: 1.6;
            overflow-x: hidden;
            padding-top: 80px; /* Space for fixed header */
        }

        .playfair {
            font-family: 'Playfair Display', serif;
        }

        /* Header Styles */
        header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(201, 169, 110, 0.2);
            transition: all 0.3s;
        }

        header.scrolled {
            background: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .header-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            width: 4rem;
            height: 4rem;
            border-radius: 50%;
            background: #C9A96E;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.3s;
            text-decoration: none;
        }

        .logo:hover {
            transform: scale(1.05);
        }

        .logo span {
            color: white;
            font-size: 1.5rem;
            font-family: 'Playfair Display', serif;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            align-items: center;
            list-style: none;
        }

        .nav-links a {
            text-decoration: none;
            color: #1a1a1a;
            font-size: 0.875rem;
            letter-spacing: 0.05em;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: #C9A96E;
        }

        .nav-dropdown {
            position: relative;
        }

        .nav-dropdown > a {
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            margin-top: 0.5rem;
            background: white;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            border: 1px solid rgba(201, 169, 110, 0.2);
            min-width: 240px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s;
        }

        .nav-dropdown:hover .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-menu a {
            display: block;
            padding: 0.75rem 1rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .dropdown-menu a:hover {
            background: rgba(201, 169, 110, 0.05);
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .account-icon {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 50%;
            border: 2px solid #C9A96E;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
            text-decoration: none;
        }

        .account-icon:hover {
            background: rgba(201, 169, 110, 0.1);
        }

        .btn-connexion {
            background: #C9A96E;
            color: white;
            padding: 0.625rem 1.5rem;
            border: none;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
            font-size: 0.875rem;
        }

        .btn-connexion:hover {
            background: #b89857;
        }

        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            cursor: pointer;
            padding: 0.5rem;
        }

        /* Footer Styles */
        footer {
            background: #1a1a1a;
            color: white;
            padding: 4rem 1rem;
        }

        .footer-container {
            max-width: 75rem;
            margin: 0 auto;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .footer-brand {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
        }

        .footer-logo {
            width: 2.5rem;
            height: 2.5rem;
            background: #C9A96E;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .footer-description {
            color: rgba(255, 255, 255, 0.7);
            line-height: 1.75;
            margin-bottom: 1.5rem;
        }

        .social-links {
            display: flex;
            gap: 1rem;
        }

        .social-link {
            width: 2.5rem;
            height: 2.5rem;
            border: 1px solid rgba(255, 255, 255, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
            text-decoration: none;
            color: white;
        }

        .social-link:hover {
            background: #C9A96E;
            border-color: #C9A96E;
        }

        .footer-column h4 {
            margin-bottom: 1rem;
            letter-spacing: 0.05em;
            font-weight: 600;
        }

        .footer-links {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            font-size: 0.875rem;
            transition: color 0.3s;
        }

        .footer-links a:hover {
            color: #C9A96E;
        }

        .footer-divider {
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            padding-top: 2rem;
            margin-bottom: 2rem;
        }

        .footer-certifications {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            justify-content: center;
            font-size: 0.875rem;
            color: rgba(255, 255, 255, 0.7);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            padding-top: 2rem;
            text-align: center;
            font-size: 0.875rem;
            color: rgba(255, 255, 255, 0.7);
        }

        /* Responsive Header & Footer */
        @media (max-width: 1024px) {
            .nav-links {
                display: none;
            }

            .mobile-menu-btn {
                display: block;
            }
        }

        @media (max-width: 768px) {
            body {
                padding-top: 70px;
            }

            .header-container {
                padding: 1rem;
            }

            .logo {
                width: 3rem;
                height: 3rem;
            }

            .footer-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
        }

        /* Rest of previous styles... */
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: #1a1a1a;
            line-height: 1.6;
            overflow-x: hidden;
        }

        .playfair {
            font-family: 'Playfair Display', serif;
        }

        /* Hero Section */
        #accueil {
            position: relative;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .hero-slideshow {
            position: absolute;
            inset: 0;
            z-index: 0;
        }

        .hero-slide {
            position: absolute;
            inset: 0;
            opacity: 0;
            transition: opacity 1.5s ease-in-out;
        }

        .hero-slide.active {
            opacity: 1;
        }

        .hero-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, rgba(0,0,0,0.5), rgba(0,0,0,0.4), rgba(0,0,0,0.6));
        }

        .hero-content {
            position: relative;
            z-index: 10;
            text-align: center;
            color: white;
            padding: 0 1rem;
            max-width: 64rem;
            margin: 0 auto;
        }

        .hero-badge {
            display: inline-block;
            border: 2px solid #C9A96E;
            padding: 0.5rem 1.5rem;
            margin-bottom: 1rem;
            backdrop-filter: blur(10px);
            background: rgba(0,0,0,0.2);
        }

        .hero-badge span {
            color: #C9A96E;
            letter-spacing: 0.2em;
            font-size: 0.875rem;
            font-weight: 600;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            text-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }

        .hero-description {
            font-size: 1.125rem;
            max-width: 42rem;
            margin: 0 auto 2rem;
            line-height: 1.75;
            text-shadow: 0 4px 10px rgba(0,0,0,0.3);
            font-weight: 500;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
            padding-top: 2rem;
        }

        .btn {
            padding: 1rem 2rem;
            font-size: 1.125rem;
            border: none;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary {
            background: #C9A96E;
            color: white;
            box-shadow: 0 10px 40px rgba(201, 169, 110, 0.3);
        }

        .btn-primary:hover {
            background: #b89857;
            transform: scale(1.05);
        }

        .btn-outline {
            border: 2px solid white;
            color: white;
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
        }

        .btn-outline:hover {
            background: white;
            color: black;
            transform: scale(1.05);
        }

        .slide-indicators {
            position: absolute;
            bottom: 6rem;
            left: 50%;
            transform: translateX(-50%);
            z-index: 10;
            display: flex;
            gap: 0.5rem;
        }

        .indicator {
            width: 0.5rem;
            height: 0.5rem;
            border-radius: 9999px;
            background: rgba(255,255,255,0.5);
            cursor: pointer;
            transition: all 0.3s;
            border: none;
        }

        .indicator.active {
            background: #C9A96E;
            width: 2rem;
        }

        .scroll-indicator {
            position: absolute;
            bottom: 2rem;
            left: 50%;
            transform: translateX(-50%);
            z-index: 10;
        }

        .scroll-mouse {
            width: 1.5rem;
            height: 2.5rem;
            border: 2px solid rgba(255,255,255,0.7);
            border-radius: 9999px;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            padding: 0.5rem;
        }

        .scroll-dot {
            width: 0.375rem;
            height: 0.375rem;
            background: white;
            border-radius: 9999px;
            animation: scroll 1.5s infinite;
        }

        @keyframes scroll {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(12px); }
        }

        /* Section Commune */
        section {
            padding: 6rem 1rem;
        }

        .container {
            max-width: 75rem;
            margin: 0 auto;
        }

        .section-badge {
            display: inline-block;
            border: 1px solid #C9A96E;
            padding: 0.5rem 1rem;
            margin-bottom: 1.5rem;
        }

        .section-badge span {
            color: #C9A96E;
            letter-spacing: 0.15em;
            font-size: 0.875rem;
        }

        .section-title {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .section-description {
            font-size: 1.125rem;
            color: #6b7280;
            max-width: 48rem;
            margin: 0 auto 4rem;
            text-align: center;
            line-height: 1.75;
        }

        .bg-white {
            background: white;
        }

        .bg-secondary {
            background: #f9fafb;
        }

        /* About Section */
        .values-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 5rem;
        }

        .value-card {
            text-align: center;
            transition: transform 0.3s;
        }

        .value-card:hover {
            transform: translateY(-10px);
        }

        .value-icon {
            width: 4rem;
            height: 4rem;
            border: 2px solid #C9A96E;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            transition: all 0.3s;
        }

        .value-card:hover .value-icon {
            background: #C9A96E;
            transform: scale(1.1) rotate(5deg);
        }

        .value-icon svg {
            width: 2rem;
            height: 2rem;
            stroke: #C9A96E;
            transition: stroke 0.3s;
        }

        .value-card:hover .value-icon svg {
            stroke: white;
        }

        .value-title {
            font-weight: 600;
            margin-bottom: 0.75rem;
            letter-spacing: 0.05em;
        }

        .value-description {
            color: #6b7280;
            line-height: 1.75;
        }

        .story-section {
            background: #f9fafb;
            padding: 4rem;
            position: relative;
            overflow: hidden;
        }

        .story-border {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: #C9A96E;
        }

        .story-quote {
            font-size: 1.25rem;
            line-height: 1.75;
            font-style: italic;
            max-width: 48rem;
            margin: 0 auto 1.5rem;
            text-align: center;
        }

        .story-author {
            text-align: center;
        }

        .story-name {
            letter-spacing: 0.05em;
            margin-bottom: 0.25rem;
        }

        .story-role {
            font-size: 0.875rem;
            color: #6b7280;
        }

        /* Destinations Section */
        .destinations-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .destination-card {
            position: relative;
            aspect-ratio: 3/4;
            overflow: hidden;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .destination-card:hover {
            transform: translateY(-10px);
        }

        .destination-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.7s;
        }

        .destination-card:hover img {
            transform: scale(1.1);
        }

        .destination-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.8), rgba(0,0,0,0.2), transparent);
        }

        .destination-content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 1.5rem;
            color: white;
        }

        .destination-highlight {
            font-size: 0.875rem;
            letter-spacing: 0.1em;
            color: #C9A96E;
            margin-bottom: 0.5rem;
        }

        .destination-title {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .destination-description {
            font-size: 0.875rem;
            color: rgba(255,255,255,0.9);
            line-height: 1.75;
        }

        .destination-arrow {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            width: 2.5rem;
            height: 2.5rem;
            background: #C9A96E;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .destination-card:hover .destination-arrow {
            opacity: 1;
        }

        /* Thematic Travel Section */
        .themes-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 1.5rem;
        }

        .theme-card {
            position: relative;
            aspect-ratio: 16/10;
            overflow: hidden;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .theme-card:hover {
            transform: scale(1.02);
        }

        .theme-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.7s;
        }

        .theme-card:hover img {
            transform: scale(1.05);
        }

        .theme-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0,0,0,0.3);
            transition: background 0.3s;
        }

        .theme-card:hover .theme-overlay {
            background: rgba(0,0,0,0.5);
        }

        .theme-content {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            padding: 2rem;
        }

        .theme-line {
            width: 4rem;
            height: 2px;
            background: #C9A96E;
            margin-bottom: 1.5rem;
        }

        .theme-title {
            font-size: 1.875rem;
            margin-bottom: 0.75rem;
        }

        .theme-description {
            color: rgba(255,255,255,0.9);
        }

        .theme-link {
            margin-top: 1.5rem;
            border-bottom: 2px solid #C9A96E;
            padding-bottom: 0.25rem;
            letter-spacing: 0.05em;
            font-size: 0.875rem;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .theme-card:hover .theme-link {
            opacity: 1;
        }

        /* Testimonials Section */
        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-bottom: 5rem;
        }

        .testimonial-card {
            background: white;
            padding: 2rem;
            transition: all 0.3s;
        }

        .testimonial-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }

        .stars {
            display: flex;
            gap: 0.25rem;
            margin-bottom: 1rem;
        }

        .star {
            width: 1.25rem;
            height: 1.25rem;
            fill: #C9A96E;
            stroke: #C9A96E;
        }

        .testimonial-text {
            color: rgba(26,26,26,0.8);
            line-height: 1.75;
            margin-bottom: 1.5rem;
            font-style: italic;
        }

        .testimonial-trip {
            font-size: 0.875rem;
            color: #6b7280;
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #e5e7eb;
        }

        .testimonial-name {
            letter-spacing: 0.05em;
            margin-bottom: 0.25rem;
        }

        .testimonial-location {
            font-size: 0.875rem;
            color: #6b7280;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 2rem;
            margin-top: 5rem;
            padding-top: 4rem;
            border-top: 1px solid rgba(201,169,110,0.2);
        }

        .stat {
            text-align: center;
        }

        .stat-value {
            font-size: 2.5rem;
            color: #C9A96E;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: #6b7280;
        }

        /* Contact Section */
        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .contact-item {
            display: flex;
            gap: 1rem;
            align-items: flex-start;
        }

        .contact-icon {
            width: 3rem;
            height: 3rem;
            border: 1px solid #C9A96E;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: transform 0.3s;
        }

        .contact-item:hover .contact-icon {
            transform: rotate(5deg) scale(1.1);
        }

        .contact-icon svg {
            width: 1.5rem;
            height: 1.5rem;
            stroke: #C9A96E;
        }

        .contact-title {
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .contact-content {
            color: #6b7280;
            white-space: pre-line;
        }

        .hours-section {
            background: #f9fafb;
            padding: 2rem;
            margin-top: 2rem;
        }

        .hours-title {
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .hours-list {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            color: #6b7280;
        }

        .hours-row {
            display: flex;
            justify-content: space-between;
        }

        .text-center {
            text-align: center;
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .themes-grid,
            .destinations-grid {
                grid-template-columns: 1fr;
            }

            .hero-buttons {
                flex-direction: column;
                align-items: stretch;
            }

            section {
                padding: 4rem 1rem;
            }
        }

        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header id="header">
        <div class="header-container">
            <a href="/" class="logo">
                <span>É</span>
            </a>

            <nav>
                <ul class="nav-links">
                    <li class="nav-dropdown">
                        <a href="/destinations">
                            Nos destinations
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </a>
                        <div class="dropdown-menu">
                            <a href="/destinations?filter=continent&value=europe">Europe</a>
                            <a href="/destinations?filter=continent&value=asie">Asie</a>
                            <a href="/destinations?filter=continent&value=afrique">Afrique</a>
                            <a href="/destinations?filter=continent&value=ameriques">Amériques</a>
                            <a href="/destinations?filter=continent&value=oceanie">Océanie</a>
                        </div>
                    </li>
                    <li><a href="/creer-voyage">Créer votre voyage</a></li>
                    <li><a href="/temoignages">Témoignages</a></li>
                    <li><a href="/blog">Blog</a></li>
                </ul>
            </nav>

            <div class="header-actions">
                <a href="/compte" class="account-icon" aria-label="Mon compte">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#C9A96E" stroke-width="2">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </a>
                <a href="/connexion" class="btn-connexion">Connexion</a>
            </div>

            <button class="mobile-menu-btn" aria-label="Menu mobile">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </button>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="accueil">
        <div class="hero-slideshow">
            <div class="hero-slide active">
                <img src="https://images.unsplash.com/photo-1761134342227-a94e55c59cef?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=1920" alt="Destination de voyage de luxe">
            </div>
            <div class="hero-slide">
                <img src="https://images.unsplash.com/photo-1673912441324-9ee3bd0b6e82?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=1920" alt="Maldives plage de luxe">
            </div>
            <div class="hero-slide">
                <img src="https://images.unsplash.com/photo-1669203408570-4140ee21f211?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=1920" alt="Santorin coucher de soleil">
            </div>
            <div class="hero-slide">
                <img src="https://images.unsplash.com/photo-1743819458014-f5cf74f175e3?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=1920" alt="Dubai skyline">
            </div>
            <div class="hero-slide">
                <img src="https://images.unsplash.com/photo-1610338732118-09d3b6fd030c?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=1920" alt="Temple japonais">
            </div>
            <div class="hero-overlay"></div>
        </div>

        <div class="hero-content">
            <div class="hero-badge">
                <span>VOYAGES SUR MESURE</span>
            </div>
            <h1 class="hero-title playfair">Votre voyage,<br>Notre expertise</h1>
            <p class="hero-description">
                Éloge du Monde crée des expériences de voyage authentiques et personnalisées,
                conçues spécialement pour vous par des experts passionnés.
            </p>
            <div class="hero-buttons">
                <a href="/creer-voyage" class="btn btn-primary">Créer mon voyage</a>
                <a href="/destinations" class="btn btn-outline">Découvrir nos destinations</a>
            </div>
        </div>

        <div class="slide-indicators">
            <button class="indicator active" data-slide="0"></button>
            <button class="indicator" data-slide="1"></button>
            <button class="indicator" data-slide="2"></button>
            <button class="indicator" data-slide="3"></button>
            <button class="indicator" data-slide="4"></button>
        </div>

        <div class="scroll-indicator">
            <div class="scroll-mouse">
                <div class="scroll-dot"></div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="bg-white">
        <div class="container">
            <div class="text-center">
                <div class="section-badge fade-in">
                    <span>QUI SOMMES-NOUS ?</span>
                </div>
                <h2 class="section-title playfair fade-in">L'art du voyage sur mesure</h2>
                <p class="section-description fade-in">
                    Depuis 2013, Éloge du Monde transforme vos rêves d'évasion en voyages d'exception.
                    Fondée par Hélène Lanier, notre agence se distingue par une approche unique :
                    nous venons à votre domicile pour concevoir ensemble le voyage qui vous ressemble.
                </p>
            </div>

            <div class="values-grid">
                <div class="value-card fade-in">
                    <div class="value-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg>
                    </div>
                    <h3 class="value-title">Authenticité</h3>
                    <p class="value-description">Des expériences authentiques qui révèlent l'âme de chaque destination</p>
                </div>

                <div class="value-card fade-in">
                    <div class="value-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                        </svg>
                    </div>
                    <h3 class="value-title">Proximité</h3>
                    <p class="value-description">Un accompagnement personnalisé à domicile pour créer ensemble votre voyage idéal</p>
                </div>

                <div class="value-card fade-in">
                    <div class="value-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z" />
                        </svg>
                    </div>
                    <h3 class="value-title">Excellence</h3>
                    <p class="value-description">Une sélection rigoureuse de partenaires pour un service haut de gamme</p>
                </div>

                <div class="value-card fade-in">
                    <div class="value-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                        </svg>
                    </div>
                    <h3 class="value-title">Responsabilité</h3>
                    <p class="value-description">Un engagement pour un tourisme durable et respectueux</p>
                </div>
            </div>

            <div class="story-section fade-in">
                <div class="story-border"></div>
                <p class="story-quote playfair">
                    "Chaque voyage est une histoire unique. Mon ambition est de créer pour vous
                    des moments inoubliables, en harmonie avec vos envies les plus profondes.
                    Parce que voyager, c'est bien plus qu'une destination : c'est une émotion."
                </p>
                <div class="story-author">
                    <p class="story-name">— Hélène Lanier</p>
                    <p class="story-role">Fondatrice, Éloge du Monde</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Destinations Section -->
    <section id="destinations" class="bg-secondary">
        <div class="container">
            <div class="text-center">
                <div class="section-badge fade-in">
                    <span>NOS DESTINATIONS</span>
                </div>
                <h2 class="section-title playfair fade-in">Explorez le monde avec nous</h2>
                <p class="section-description fade-in">
                    De l'Europe raffinée à l'Asie mystique, en passant par l'Afrique sauvage et les Amériques vibrantes,
                    nous créons votre voyage idéal partout dans le monde.
                </p>
            </div>

            <div class="destinations-grid">
                <div class="destination-card fade-in">
                    <img src="https://images.unsplash.com/photo-1431274172761-fca41d930114?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=800" alt="Europe">
                    <div class="destination-overlay"></div>
                    <div class="destination-content">
                        <div class="destination-highlight">15 pays</div>
                        <h3 class="destination-title playfair">Europe</h3>
                        <p class="destination-description">Paris, Rome, Lisbonne... Redécouvrez l'élégance européenne</p>
                    </div>
                    <div class="destination-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="white" style="width: 1.5rem; height: 1.5rem;">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </div>
                </div>

                <div class="destination-card fade-in">
                    <img src="https://images.unsplash.com/photo-1610338732118-09d3b6fd030c?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=800" alt="Asie">
                    <div class="destination-overlay"></div>
                    <div class="destination-content">
                        <div class="destination-highlight">12 pays</div>
                        <h3 class="destination-title playfair">Asie</h3>
                        <p class="destination-description">Japon, Thaïlande, Bali... L'Asie mystique et raffinée</p>
                    </div>
                    <div class="destination-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="white" style="width: 1.5rem; height: 1.5rem;">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </div>
                </div>

                <div class="destination-card fade-in">
                    <img src="https://images.unsplash.com/photo-1535082623926-b39352a03fb7?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=800" alt="Afrique">
                    <div class="destination-overlay"></div>
                    <div class="destination-content">
                        <div class="destination-highlight">8 pays</div>
                        <h3 class="destination-title playfair">Afrique</h3>
                        <p class="destination-description">Safari, déserts, cultures millénaires... L'Afrique authentique</p>
                    </div>
                    <div class="destination-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="white" style="width: 1.5rem; height: 1.5rem;">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="text-center fade-in">
                <a href="/destinations" class="btn btn-primary">Voir toutes nos destinations</a>
            </div>
        </div>
    </section>

    <!-- Thematic Travel Section -->
    <section id="themes" class="bg-white">
        <div class="container">
            <div class="text-center">
                <div class="section-badge fade-in">
                    <span>VOYAGES À THÈME</span>
                </div>
                <h2 class="section-title playfair fade-in">Des voyages qui vous ressemblent</h2>
                <p class="section-description fade-in">
                    Que vous recherchiez la détente, l'aventure, les saveurs ou la culture,
                    nous créons des séjours thématiques sur mesure adaptés à vos passions.
                </p>
            </div>

            <div class="themes-grid">
                <div class="theme-card fade-in">
                    <img src="https://images.unsplash.com/photo-1667235195726-a7c440bca9bd?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=1000" alt="Bien-être & Spa">
                    <div class="theme-overlay"></div>
                    <div class="theme-content">
                        <div class="theme-line"></div>
                        <h3 class="theme-title playfair">Bien-être & Spa</h3>
                        <p class="theme-description">Ressourcez-vous dans des spas d'exception</p>
                        <span class="theme-link">Découvrir</span>
                    </div>
                </div>

                <div class="theme-card fade-in">
                    <img src="https://images.unsplash.com/photo-1502041374972-8fcbf8a930c3?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=1000" alt="Aventure & Nature">
                    <div class="theme-overlay"></div>
                    <div class="theme-content">
                        <div class="theme-line"></div>
                        <h3 class="theme-title playfair">Aventure & Nature</h3>
                        <p class="theme-description">Des expériences outdoor inoubliables</p>
                        <span class="theme-link">Découvrir</span>
                    </div>
                </div>

                <div class="theme-card fade-in">
                    <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=1000" alt="Gastronomie">
                    <div class="theme-overlay"></div>
                    <div class="theme-content">
                        <div class="theme-line"></div>
                        <h3 class="theme-title playfair">Gastronomie</h3>
                        <p class="theme-description">Savourez les meilleures tables du monde</p>
                        <span class="theme-link">Découvrir</span>
                    </div>
                </div>

                <div class="theme-card fade-in">
                    <img src="https://images.unsplash.com/photo-1648026141691-96be4a41b687?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=1000" alt="Culture & Art">
                    <div class="theme-overlay"></div>
                    <div class="theme-content">
                        <div class="theme-line"></div>
                        <h3 class="theme-title playfair">Culture & Art</h3>
                        <p class="theme-description">Plongez dans l'histoire et l'art</p>
                        <span class="theme-link">Découvrir</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="temoignages" class="bg-secondary">
        <div class="container">
            <div class="text-center">
                <div class="section-badge fade-in">
                    <span>TÉMOIGNAGES</span>
                </div>
                <h2 class="section-title playfair fade-in">Ils ont voyagé avec nous</h2>
                <p class="section-description fade-in">
                    La confiance de nos clients est notre plus belle récompense.
                    Découvrez leurs expériences et laissez-vous inspirer.
                </p>
            </div>

            <div class="testimonials-grid">
                <div class="testimonial-card fade-in">
                    <div class="stars">
                        <svg class="star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg class="star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg class="star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg class="star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg class="star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    </div>
                    <p class="testimonial-text">
                        "Hélène a créé pour nous un voyage au Japon absolument magique. Chaque détail était pensé, chaque expérience authentique. Nous avons découvert des lieux hors des sentiers battus que nous n'aurions jamais trouvés seuls."
                    </p>
                    <div class="testimonial-trip">Japon sur mesure - 15 jours</div>
                    <p class="testimonial-name">Sophie & Marc L.</p>
                    <p class="testimonial-location">Paris</p>
                </div>

                <div class="testimonial-card fade-in">
                    <div class="stars">
                        <svg class="star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg class="star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg class="star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg class="star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg class="star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    </div>
                    <p class="testimonial-text">
                        "Le professionnalisme et l'écoute d'Éloge du Monde ont transformé notre lune de miel en Toscane en un rêve éveillé. L'accompagnement à domicile nous a vraiment mis en confiance."
                    </p>
                    <div class="testimonial-trip">Toscane romantique - 10 jours</div>
                    <p class="testimonial-name">Catherine D.</p>
                    <p class="testimonial-location">Lyon</p>
                </div>

                <div class="testimonial-card fade-in">
                    <div class="stars">
                        <svg class="star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg class="star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg class="star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg class="star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        <svg class="star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    </div>
                    <p class="testimonial-text">
                        "Notre safari en Tanzanie était parfaitement adapté à nos enfants. Hélène a su trouver le juste équilibre entre aventure et confort. Une expérience inoubliable pour toute la famille !"
                    </p>
                    <div class="testimonial-trip">Safari familial - 12 jours</div>
                    <p class="testimonial-name">Famille Rousseau</p>
                    <p class="testimonial-location">Bordeaux</p>
                </div>
            </div>

            <div class="stats-grid">
                <div class="stat fade-in">
                    <div class="stat-value playfair">12+</div>
                    <p class="stat-label">Années d'expérience</p>
                </div>
                <div class="stat fade-in">
                    <div class="stat-value playfair">500+</div>
                    <p class="stat-label">Voyages créés</p>
                </div>
                <div class="stat fade-in">
                    <div class="stat-value playfair">35+</div>
                    <p class="stat-label">Pays explorés</p>
                </div>
                <div class="stat fade-in">
                    <div class="stat-value playfair">98%</div>
                    <p class="stat-label">Clients satisfaits</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="bg-white">
        <div class="container">
            <div class="text-center">
                <div class="section-badge fade-in">
                    <span>CONTACT</span>
                </div>
                <h2 class="section-title playfair fade-in">Créons ensemble votre voyage</h2>
                <p class="section-description fade-in">
                    Contactez-nous pour une première consultation gratuite.
                    Nous viendrons à votre domicile pour écouter vos envies et concevoir votre voyage idéal.
                </p>
            </div>

            <div style="max-width: 56rem; margin: 0 auto;">
                <div class="fade-in">
                    <h3 class="playfair" style="font-size: 1.5rem; margin-bottom: 1.5rem;">Nos coordonnées</h3>
                    <p style="color: #6b7280; line-height: 1.75; margin-bottom: 2rem;">
                        Nous nous déplaçons à votre domicile pour une consultation personnalisée.
                        Nos bureaux sont situés au Havre et à Sceaux.
                    </p>
                </div>

                <div class="contact-info">
                    <div class="contact-item fade-in">
                        <div class="contact-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="contact-title">Nos bureaux</h4>
                            <p class="contact-content">Siège : Le Havre
Antenne : Sceaux (92330)</p>
                        </div>
                    </div>

                    <div class="contact-item fade-in">
                        <div class="contact-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="contact-title">Téléphone</h4>
                            <p class="contact-content">+33 (0)6 XX XX XX XX</p>
                        </div>
                    </div>

                    <div class="contact-item fade-in">
                        <div class="contact-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="contact-title">Email</h4>
                            <p class="contact-content">contact@elogedumonde.fr</p>
                        </div>
                    </div>
                </div>

                <div class="hours-section fade-in">
                    <h4 class="hours-title">Horaires d'ouverture</h4>
                    <div class="hours-list">
                        <div class="hours-row">
                            <span>Lundi - Vendredi</span>
                            <span>9h00 - 18h00</span>
                        </div>
                        <div class="hours-row">
                            <span>Samedi</span>
                            <span>Sur rendez-vous</span>
                        </div>
                        <div class="hours-row">
                            <span>Dimanche</span>
                            <span>Fermé</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Hero Slideshow
        let currentSlide = 0;
        const slides = document.querySelectorAll('.hero-slide');
        const indicators = document.querySelectorAll('.indicator');
        const totalSlides = slides.length;

        function showSlide(index) {
            slides.forEach(slide => slide.classList.remove('active'));
            indicators.forEach(indicator => indicator.classList.remove('active'));
            
            slides[index].classList.add('active');
            indicators[index].classList.add('active');
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % totalSlides;
            showSlide(currentSlide);
        }

        // Auto advance slides
        setInterval(nextSlide, 5000);

        // Manual slide control
        indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => {
                currentSlide = index;
                showSlide(currentSlide);
            });
        });

        // Scroll animations
        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.1
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.fade-in').forEach(el => {
            observer.observe(el);
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <!-- Main Footer Content -->
            <div class="footer-grid">
                <!-- Brand Column -->
                <div>
                    <div class="footer-brand">
                        <div class="footer-logo">
                            <span style="color: white; font-family: 'Playfair Display', serif;">É</span>
                        </div>
                        <div>
                            <span style="letter-spacing: 0.05em; font-size: 0.875rem;">ÉLOGE DU MONDE</span>
                        </div>
                    </div>
                    <p class="footer-description">
                        Créateur de voyages sur mesure haut de gamme depuis 2013.
                        Votre évasion commence ici.
                    </p>
                    <div class="social-links">
                        <a href="#" class="social-link" aria-label="Facebook">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                            </svg>
                        </a>
                        <a href="#" class="social-link" aria-label="Instagram">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                            </svg>
                        </a>
                        <a href="#" class="social-link" aria-label="LinkedIn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                                <rect x="2" y="9" width="4" height="12"></rect>
                                <circle cx="4" cy="4" r="2"></circle>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- L'entreprise -->
                <div class="footer-column">
                    <h4>L'entreprise</h4>
                    <ul class="footer-links">
                        <li><a href="#about">Qui sommes-nous ?</a></li>
                        <li><a href="#about">Nos valeurs</a></li>
                        <li><a href="#about">L'équipe</a></li>
                        <li><a href="/blog">Blog</a></li>
                    </ul>
                </div>

                <!-- Nos services -->
                <div class="footer-column">
                    <h4>Nos services</h4>
                    <ul class="footer-links">
                        <li><a href="#destinations">Voyages sur mesure</a></li>
                        <li><a href="#themes">Voyages thématiques</a></li>
                        <li><a href="#destinations">Destinations</a></li>
                        <li><a href="#temoignages">Témoignages</a></li>
                    </ul>
                </div>

                <!-- Informations légales -->
                <div class="footer-column">
                    <h4>Informations légales</h4>
                    <ul class="footer-links">
                        <li><a href="/mentions-legales">Mentions légales</a></li>
                        <li><a href="/cgv">Conditions générales</a></li>
                        <li><a href="/confidentialite">Politique de confidentialité</a></li>
                        <li><a href="/contact">Contact</a></li>
                    </ul>
                </div>
            </div>

            <!-- Certifications & Info -->
            <div class="footer-divider">
                <div class="footer-certifications">
                    <span>Immatriculation Atout France</span>
                    <span>•</span>
                    <span>Garantie financière</span>
                    <span>•</span>
                    <span>Assurance RC Pro</span>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="footer-bottom">
                <p>© 2025 Éloge du Monde. Tous droits réservés.</p>
            </div>
        </div>
    </footer>
</body>
</html>
