<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>Réinitialisation du mot de passe<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/connexion.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="min-h-screen flex items-center justify-center pt-28 bg-white">
	<div class="w-full sm:w-3/4 md:w-2/3 lg:w-5/12 px-4">
		<div class="bg-white rounded-lg shadow border border-gray-300">
			<div class="p-6">
				<h2 class="text-2xl font-semibold mb-4">Réinitialisation du mot de passe</h2>
				<p class="text-gray-500 mb-4">Choisissez un nouveau mot de passe pour votre compte.</p>
				<form action="<?= site_url('reinitialiserMdp/majMdp') ?>" method="POST" novalidate>
					<?= csrf_field() ?>
					<input type="hidden" name="token" value="<?= esc($token ?? '') ?>">

					<div class="mb-3">
						<label for="mdp" class="block text-sm font-medium text-gray-700">Nouveau mot de passe</label>
						<input type="password" id="mdp" name="mdp" class="block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-600" required>
					</div>
					<div class="mb-4">
						<label for="confirmationMdp" class="block text-sm font-medium text-gray-700">Confirmer le mot de passe</label>
						<input type="password" id="confirmationMdp" name="confirmationMdp" class="block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-600" required>
					</div>
					<button type="submit" class="w-full btn-primary font-medium py-2 rounded-md">Réinitialiser le mot de passe</button>
				</form>
				<div class="text-center mt-3">
					<a href="<?= site_url('connexion') ?>" class="text-sm text-gray-600 hover:underline">Retour à la connexion</a>
				</div>
			</div>
		</div>
	</div>
</div>

<?= $this->endSection() ?>