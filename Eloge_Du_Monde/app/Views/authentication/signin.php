<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>Connexion<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="min-h-screen flex items-center justify-center pt-28 bg-white">
	<div class="w-full sm:w-3/4 md:w-2/3 lg:w-5/12 px-4">
		<div class="bg-white rounded-lg shadow border border-gray-300">
			<div class="p-6">
				<h2 class="text-2xl font-semibold mb-4">Se connecter</h2>
				<form action="<?= site_url('signin/signin') ?>" method="POST" novalidate>
					<?= csrf_field() ?>
					<div class="mb-3">
						<label for="email" class="block text-sm font-medium text-gray-700">Email</label>
						<input type="email" id="email" name="email" class="block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-600" value="<?= set_value('email') ?>" required>
					</div>
					<div class="mb-4">
						<label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
						<input type="password" id="password" name="password" class="block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-600" required>
					</div>
					<button type="submit" class="w-full btn-primary font-medium py-2 rounded-md">Connexion</button>
				</form>
				<div class="text-center mt-4">
					<a href="<?= site_url('forgotpassword') ?>" class="text-sm text-gray-600 hover:underline">Mot de passe oublié ?</a>
				</div>
				<div class="text-center mt-3">
					<a href="<?= site_url('signup') ?>" class="text-sm text-gray-600 hover:underline">Créer un compte</a>
				</div>
			</div>
		</div>
	</div>
</div>

<?= $this->endSection() ?>