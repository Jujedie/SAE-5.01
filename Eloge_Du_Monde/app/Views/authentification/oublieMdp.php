<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>Mot de passe oublié<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="row justify-content-center" style="padding-top: 10rem;">
	<div class="col-lg-5 col-md-7">
		<div class="card shadow-sm">
			<div class="card-body">
				<h2 class="h4 mb-4 fw-bold">Mot de passe oublié</h2>
				<p class="text-muted mb-4">Entrez votre adresse e-mail et nous vous enverrons un lien pour réinitialiser votre mot de passe.</p>
				<form action="<?= site_url('oublieMdp/envoyerLienReinitialisation') ?>" method="POST">
					<?= csrf_field() ?>
					<div class="mb-4">
						<label for="email" class="form-label">Adresse e-mail</label>
						<input type="email" id="email" name="email" class="form-control" value="<?= set_value('email') ?>" required>
					</div>
					<button type="submit" class="btn btn-primary w-100">Envoyer le lien de réinitialisation</button>
				</form>
				<div class="text-center mt-3">
					<a href="<?= site_url('connexion') ?>">Retour à la connexion</a>
				</div>
			</div>
		</div>
	</div>
</div>

<?= $this->endSection() ?>