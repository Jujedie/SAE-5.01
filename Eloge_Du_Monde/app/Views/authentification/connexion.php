<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>Connexion<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/connexion.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center">
	<div class="row w-100 justify-content-center">
		<div class="col-lg-5 col-md-7">
		<div class="card shadow-sm">
			<div class="card-body">
				<h2 class="h4 mb-4 fw-bold">Se connecter</h2>
				<form action="<?= site_url('ConnexionController/connexion') ?>" method="POST" novalidate>
					<?= csrf_field() ?>
					<div class="mb-3">
						<label for="email" class="form-label">Email</label>
						<input type="email" id="email" name="email" class="form-control" value="<?= set_value('email') ?>" required>
					</div>
					<div class="mb-4">
						<label for="mdp" class="form-label">Mot de passe</label>
						<input type="password" id="mdp" name="mdp" class="form-control" required>
					</div>
					<button type="submit" class="btn btn-primary w-100">Connexion</button>
				</form>
				<div class="text-center mt-3">
					<a href="<?= site_url('oublieMdp') ?>">Mot de passe oublié ?</a>
				</div>
				<div class="text-center mt-2">
					<a href="<?= site_url('inscription') ?>">Créer un compte</a>
				</div>
			</div>
		</div>
	</div>
</div>

<?= $this->endSection() ?>