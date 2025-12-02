<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->renderSection('title') ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
	<link rel="stylesheet" href="<?= base_url('assets/css/default.css') ?>">
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

<!-- Header / Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top">
	<div class="container-fluid position-relative">
		<a class="navbar-brand d-flex align-items-center position-absolute start-50 translate-middle-x" href="<?= site_url('accueil') ?>">
			<i class="bi bi-mortarboard-fill me-2 fs-4"></i>
			<span>Gestionnaire de Rattrapage de DS</span>
		</a>
		<div class="ms-auto me-3">
			<a class="nav-link d-flex align-items-center text-white text-decoration-none" href="<?= site_url('profil') ?>">
				<span class="me-2"><?= esc(session()->get('prenom') . ' ' . session()->get('nom')) ?></span>
				<i class="bi bi-person-circle fs-4"></i>
			</a>
		</div>
	</div>
</nav>

<!-- Main Content -->
<main class="container py-5 flex-grow-1">
	<?= $this->renderSection('content') ?>
</main>

<!-- Footer -->
<footer class="footer-custom mt-auto">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<p class="mb-1">
					Département Informatique - IUT du Havre - Groupe 1
				</p>
				<p class="mb-0 small opacity-75">
					&copy; <?= date('Y') ?> - Tous droits réservés
				</p>
			</div>
		</div>
	</div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/js/notifications.js') ?>"></script>
<?= $this->renderSection('scripts') ?>
</body>
</html>