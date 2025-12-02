<?= $this->extend('layouts/default') ?>
<?= $this->section('title') ?>403 - Accès interdit<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container text-center py-5">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<h1 class="display-5 mb-4">403 — Accès interdit</h1>
			<p class="lead mb-4">Vous n'avez pas les permissions nécessaires pour accéder à cette page.</p>

			<div class="mb-4">
				<img src="<?= base_url('assets/images/logo-img403.png') ?>" alt="403 - Accès interdit" class="img-fluid" style="max-height:320px;">
			</div>

			<p class="text-muted">Si vous pensez que c'est une erreur, contactez l'administrateur du site.</p>

			<a href="<?= site_url('accueil') ?>" class="btn btn-primary mt-3">Retour à l'accueil</a>
		</div>
	</div>
</div>

<?= $this->endSection() ?>