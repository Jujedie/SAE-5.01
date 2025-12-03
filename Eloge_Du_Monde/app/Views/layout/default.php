<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->renderSection('title') ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
	<script src="https://cdn.tailwindcss.com"></script>
	<link rel="stylesheet" href="<?= base_url('assets/css/default.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/home.css') ?>">
	<?= $this->renderSection('styles') ?>
</head>

<body class="d-flex flex-column min-vh-100 bg-light">

<!-- Conteneur des Notifications -->
<div class="notification-container position-fixed end-0 p-3" style="z-index: 9999; top: 70px;">
	<?php if (session()->getFlashdata('success')): ?>
		<div class="toast align-items-center text-bg-success border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
			<div class="d-flex">
				<div class="toast-body">
					<i class="bi bi-check-circle-fill me-2"></i>
					<?= esc(session()->getFlashdata('success')) ?>
				</div>
				<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Fermer"></button>
			</div>
		</div>
	<?php endif; ?>
	
	<?php if (session()->getFlashdata('error')): ?>
		<div class="toast align-items-center text-bg-danger border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
			<div class="d-flex">
				<div class="toast-body">
					<i class="bi bi-exclamation-circle-fill me-2"></i>
					<?= esc(session()->getFlashdata('error')) ?>
				</div>
				<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Fermer"></button>
			</div>
		</div>
	<?php endif; ?>
</div>

<!-- Header -->
<header id="header">
	<div class="header-container">
		<nav class="nav-left">
			<ul class="nav-links">
				<li class="nav-dropdown">
					<a href="<?= base_url('destinations') ?>">
						Nos destinations
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
							<polyline points="6 9 12 15 18 9"></polyline>
						</svg>
					</a>
					<div class="dropdown-menu">
						<a href="<?= base_url('destinations?filter=continent&value=europe') ?>">Europe</a>
						<a href="<?= base_url('destinations?filter=continent&value=asie') ?>">Asie</a>
						<a href="<?= base_url('destinations?filter=continent&value=afrique') ?>">Afrique</a>
						<a href="<?= base_url('destinations?filter=continent&value=ameriques') ?>">Amériques</a>
						<a href="<?= base_url('destinations?filter=continent&value=oceanie') ?>">Océanie</a>
					</div>
				</li>
				<li><a href="<?= base_url('creer-voyage') ?>">Créer votre voyage</a></li>
			</ul>
		</nav>

		<a href="<?= base_url('/home') ?>" class="logo">
			<img src="<?= base_url('assets/images/elogedumonde-logo.png') ?>" alt="Éloge du Monde">
		</a>

		<nav class="nav-right">
			<ul class="nav-links">
				<li><a href="<?= base_url('temoignages') ?>">Témoignages</a></li>
				<li><a href="<?= base_url('blog') ?>">Blog</a></li>
			</ul>
		</nav>

		<div class="header-actions">
			<a href="<?= base_url('compte') ?>" class="account-icon" aria-label="Mon compte">
				<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#C9A96E" stroke-width="2">
					<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
					<circle cx="12" cy="7" r="4"></circle>
				</svg>
			</a>
			<a href="<?= base_url('connexion') ?>" class="btn-connexion">Connexion</a>
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

<!-- Main Content -->
<main>
	<?= $this->renderSection('content') ?>
</main>

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
					<a href="https://fr-fr.facebook.com/ElogeduMonde/" class="social-link" aria-label="Facebook">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
							<path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
						</svg>
					</a>
					<a href="https://www.instagram.com/elogedumonde/" class="social-link" aria-label="Instagram">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
							<rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
							<path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
							<line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
						</svg>
					</a>
					<a href="https://fr.linkedin.com/company/éloge-du-monde" class="social-link" aria-label="LinkedIn">
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
					<li><a href="<?= base_url('blog') ?>">Blog</a></li>
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
					<li><a href="<?= base_url('mentions-legales') ?>">Mentions légales</a></li>
					<li><a href="<?= base_url('cgv') ?>">Conditions générales</a></li>
					<li><a href="<?= base_url('confidentialite') ?>">Politique de confidentialité</a></li>
					<li><a href="<?= base_url('contact') ?>">Contact</a></li>
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
			<p>© <?= date('Y') ?> Éloge du Monde. Tous droits réservés.</p>
		</div>
	</div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/js/notifications.js') ?>"></script>
<script src="<?= base_url('assets/js/home.js') ?>"></script>
<?= $this->renderSection('scripts') ?>
</body>
</html>
