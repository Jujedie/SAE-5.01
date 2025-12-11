<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>Accueil<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/home.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<section id="accueil">
	<div class="hero-slideshow">
		<div class="hero-slide active">
			<img src="<?= base_url('assets/images/hero1.jpeg') ?>" alt="Destination de voyage de luxe">
		</div>
		<div class="hero-slide">
			<img src="<?= base_url('assets/images/hero2.jpeg') ?>" alt="Maldives plage de luxe">
		</div>
		<div class="hero-slide">
			<img src="<?= base_url('assets/images/hero3.jpeg') ?>" alt="Santorin coucher de soleil">
		</div>
		<div class="hero-slide">
			<img src="<?= base_url('assets/images/hero4.jpeg') ?>" alt="Dubai skyline">
		</div>
		<div class="hero-slide">
			<img src="<?= base_url('assets/images/hero5.jpeg') ?>" alt="Temple japonais">
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
			<a href="<?= base_url('createTrip') ?>" class="btn btn-primary">Créer mon voyage</a>
			<a href="<?= base_url('trips') ?>" class="btn btn-outline">Découvrir nos destinations</a>
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
<section id="about" class="section-white">
	<div class="section-container">
		<div class="section-text-center">
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
<section id="destinations" class="section-gray">
	<div class="section-container">
		<div class="section-text-center">
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
		<a href="<?= base_url('trips?filter=continent&value=Europe') ?>">
			<img src="<?= base_url('assets/images/destination1.jpeg') ?>" alt="Europe">
			<div class="destination-overlay"></div>
				<div class="destination-content">
					<div class="destination-highlight">15 pays</div>
					<h3 class="destination-title playfair">Europe</h3>
					<p class="destination-description">Paris, Rome, Lisbonne... Redécouvrez l'élégance européenne</p>
				</div>
				<a href="<?= base_url('trips?region=Europe') ?>">
					<div class="destination-arrow">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="white" style="width: 1.5rem; height: 1.5rem;">
							<path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
						</svg>
					</div>
				</a>
			</div>
		</a>

		<div class="destination-card fade-in">
		<a href="<?= base_url('trips?filter=continent&value=Asie') ?>">
			<img src="<?= base_url('assets/images/destination2.jpeg') ?>" alt="Asie">
			<div class="destination-overlay"></div>
				<div class="destination-content">
					<div class="destination-highlight">12 pays</div>
					<h3 class="destination-title playfair">Asie</h3>
					<p class="destination-description">Japon, Thaïlande, Bali... L'Asie mystique et raffinée</p>
				</div>
				<a href="<?= base_url('trips?region=Asie') ?>">
					<div class="destination-arrow">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="white" style="width: 1.5rem; height: 1.5rem;">
							<path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
						</svg>
					</div>
				</a>
			</div>
		</a>

		<div class="destination-card fade-in">
		<a href="<?= base_url('trips?filter=continent&value=Afrique') ?>">
			<img src="<?= base_url('assets/images/destination3.jpeg') ?>" alt="Afrique">
				<div class="destination-overlay"></div>
					<div class="destination-content">
						<div class="destination-highlight">8 pays</div>
						<h3 class="destination-title playfair">Afrique</h3>
						<p class="destination-description">Safari, déserts, cultures millénaires... L'Afrique authentique</p>
					</div>
					<a href="<?= base_url('trips?region=Afrique') ?>">
						<div class="destination-arrow">
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="white" style="width: 1.5rem; height: 1.5rem;">
								<path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
							</svg>
						</div>
					</a>
				</div>
			</div>
		</a>

		<div class="section-text-center fade-in">
			<a href="<?= base_url('trips') ?>" class="btn btn-primary">Voir toutes nos destinations</a>
		</div>
	</div>
</section>

<!-- Thematic Travel Section -->
<section id="themes" class="section-white">
	<div class="section-container">
		<div class="section-text-center">
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
		<a href="<?= base_url('trips?thematic=bien-etre-spa') ?>" class="theme-card fade-in">
			<img src="<?= base_url('assets/images/thematic1.jpeg') ?>" alt="Bien-être & Spa">
			<div class="theme-overlay"></div>
				<div class="theme-content">
					<div class="theme-line"></div>
					<h3 class="theme-title playfair">Bien-être & Spa</h3>
					<p class="theme-description">Ressourcez-vous dans des spas d'exception</p>
				</div>
		</a>

		<a href="<?= base_url('trips?thematic=aventure-nature') ?>" class="theme-card fade-in">
			<img src="<?= base_url('assets/images/thematic2.jpeg') ?>" alt="Aventure & Nature">
			<div class="theme-overlay"></div>
				<div class="theme-content">
					<div class="theme-line"></div>
					<h3 class="theme-title playfair">Aventure & Nature</h3>
					<p class="theme-description">Des expériences outdoor inoubliables</p>
				</div>
		</a>

		<a href="<?= base_url('trips?thematic=gastronomie') ?>" class="theme-card fade-in">
			<img src="<?= base_url('assets/images/thematic3.jpeg') ?>" alt="Gastronomie">
			<div class="theme-overlay"></div>
				<div class="theme-content">
					<div class="theme-line"></div>
					<h3 class="theme-title playfair">Gastronomie</h3>
					<p class="theme-description">Savourez les meilleures tables du monde</p>
				</div>
		</a>

		<a href="<?= base_url('trips?thematic=culture-art') ?>" class="theme-card fade-in">
			<img src="<?= base_url('assets/images/thematic4.jpeg') ?>" alt="Culture & Art">
			<div class="theme-overlay"></div>
				<div class="theme-content">
					<div class="theme-line"></div>
					<h3 class="theme-title playfair">Culture & Art</h3>
					<p class="theme-description">Plongez dans l'histoire et l'art</p>
				</div>
		</a>
	</div>
</section>

<!-- Reviews Section -->
<section id="temoignages" class="section-gray">
	<div class="section-container">
		<div class="section-text-center">
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
			<?php if (!isset($reviews) || count($reviews) < 3): ?>
				<p class="no-reviews fade-in">Aucun témoignage disponible pour le moment.</p>
			<?php else: ?>
				<?php for ($i = 0 ; $i < 3 ; $i++): ?>
					<div class="testimonial-card fade-in">
						<div class="stars">
							<?php for($j = 0; $j < $reviews[$i]['rating']; $j++): ?>
							<svg class="star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
							<?php endfor; ?>
						</div>
						<p class="testimonial-text">
							<?= $reviews[$i]['content'] ?>
						</p>
					</div>
				<?php endfor; ?>
			<?php endif; ?>
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
<section id="contact" class="section-white">
	<div class="section-container">
		<div class="section-text-center">
			<div class="section-badge fade-in">
				<span>Coordonnées</span>
			</div>
				<p style="color: #6b7280; line-height: 1.75; margin-bottom: 2rem;">
					Nous nous déplaçons à votre domicile pour une consultation personnalisée.
					Nos bureaux sont situés au Havre et à Sceaux.
				</p>
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

<script src="<?= base_url('assets/js/home.js') ?>"></script>
<?= $this->endSection() ?>