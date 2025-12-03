<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>Accueil<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/accueil.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container py-5">
	<h1 class="welcome-title text-center mb-5">Bienvenue sur votre espace</h1>

	<a href="<?= site_url('deconnexion') ?>" class="btn btn-primary mb-4">Déconnexion</a>
	
	<div class="cards-container" style="margin-top:130px;">
		<?php if ($estAdmin): ?>
		<div class="card app-card p-4 shadow-sm">
			<a href="/gestionRattrapages" class="text-decoration-none">
				<div class="text-center">
					<div class="card-img-container mb-4">
						<img src="/assets/images/logo-gestion.png" alt="Gestion" class="img-fluid">
					</div>
					<h3>Gestion des rattrapages</h3>
				</div>
			</a>
		</div>
		<?php endif; ?>

		<?php if (!$estAdmin): ?>
		<div class="card app-card p-4 shadow-sm">
			<a href="/rattrapages/planification" class="text-decoration-none">
				<div class="text-center">
					<div class="card-img-container mb-4">
						<img src="/assets/images/logo-planification.png" alt="Planification" class="img-fluid">
					</div>
					<h3>Planification des rattrapages</h3>
				</div>
			</a>
		</div>
		<?php endif; ?>

		<?php if ($estAdmin): ?>
		<div class="card app-card p-4 shadow-sm">
			<a href="/gestionEtudiants" class="text-decoration-none">
				<div class="text-center">
					<div class="card-img-container mb-4">
						<img src="/assets/images/logo-etudiant.png" alt="Étudiant" class="img-fluid">
					</div>
					<h3>Gestion des étudiants</h3>
				</div>
			</a>
		</div>
		<?php endif; ?>

		<?php if ($estAdmin): ?>
		<div class="card app-card p-4 shadow-sm">
			<a href="/gestionRessources" class="text-decoration-none">
				<div class="text-center">
					<div class="card-img-container mb-4">
						<img src="/assets/images/logo-ressources.png" alt="Ressources" class="img-fluid">
					</div>
					<h3>Gestion des ressources</h3>
				</div>
			</a>
		</div>
		<?php endif; ?>
	</div>
</div>

<?= $this->endSection() ?>