<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>Réinitialisation du mot de passe<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/connexion.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="row justify-content-center" style="padding-top: 8rem;">
	<div class="col-lg-5 col-md-7">
		<div class="card shadow-sm">
			<div class="card-body">
				<h2 class="h4 mb-4 fw-bold">Réinitialisation du mot de passe</h2>
				<p class="text-muted mb-4">Choisissez un nouveau mot de passe pour votre compte.</p>
				<form action="<?= site_url('reinitialiserMdp/majMdp') ?>" method="POST" novalidate>
					<?= csrf_field() ?>
					<input type="hidden" name="token" value="<?= esc($token ?? '') ?>">

					<div class="mb-3">
						<label for="mdp" class="form-label">Nouveau mot de passe</label>
						<input type="password" id="mdp" name="mdp" class="form-control" required>
					</div>
					<div class="mb-4">
						<label for="confirmationMdp" class="form-label">Confirmer le mot de passe</label>
						<input type="password" id="confirmationMdp" name="confirmationMdp" class="form-control" required>
					</div>
					<button type="submit" class="btn btn-success w-100">Réinitialiser le mot de passe</button>
				</form>
				<div class="text-center mt-3">
					<a href="<?= site_url('connexion') ?>">Retour à la connexion</a>
				</div>
			</div>
		</div>
	</div>
</div>

<?= $this->endSection() ?>