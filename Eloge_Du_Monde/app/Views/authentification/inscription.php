<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>Inscription<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/connexion.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center">
	<div class="col-lg-5 col-md-7">
		<div class="card shadow-sm">
			<div class="card-body">
				<h2 class="h4 mb-4 fw-bold">Créer un compte</h2>
				<?php if (isset($validation)): ?>
					<div class="alert alert-danger" role="alert">
						<ul class="mb-0">
							<?php foreach ($validation->getErrors() as $error): ?>
								<li><?= esc($error) ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endif; ?>
				<form action="<?= site_url('inscription/enregistrer') ?>" method="POST" novalidate>
					<?= csrf_field() ?>
					<div class="mb-3">
						<label for="nom" class="form-label">Nom</label>
						<input type="text" id="nom" name="nom" class="form-control" value="<?= set_value('nom') ?>" required>
					</div>
					<div class="mb-3">
						<label for="prenom" class="form-label">Prénom</label>
						<input type="text" id="prenom" name="prenom" class="form-control" value="<?= set_value('prenom') ?>" required>
					</div>
					<div class="mb-3">
						<label for="email" class="form-label">Email</label>
						<input type="email" id="email" name="email" class="form-control" value="<?= set_value('email') ?>" required>
					</div>
					<div class="mb-3">
						<label for="telephone" class="form-label">Téléphone</label>
						<input type="tel" id="telephone" name="telephone" class="form-control" value="<?= set_value('telephone') ?>" required>
					</div>
					<div class="mb-3">
						<label for="mdp" class="form-label">Mot de passe</label>
						<input type="password" id="mdp" name="mdp" class="form-control" required>
					</div>
					<div class="mb-4">
						<label for="confirmationMdp" class="form-label">Confirmer le mot de passe</label>
						<input type="password" id="confirmationMdp" name="confirmationMdp" class="form-control" required>
					</div>
					<button type="submit" class="btn btn-primary w-100">Créer le compte</button>
				</form>
				<div class="text-center mt-3">
					<a href="<?= site_url('connexion') ?>">Déjà un compte ? Se connecter</a>
				</div>
			</div>
		</div>
	</div>
</div>

<?= $this->endSection() ?>