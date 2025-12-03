<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>Inscription<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="min-h-screen flex items-center justify-center pt-4 bg-white">
	<div class="w-full sm:w-3/4 md:w-2/3 lg:w-5/12 px-4">
		<div class="bg-white rounded-lg shadow border border-gray-300">
			<div class="p-6">
				<h2 class="text-2xl font-semibold mb-4">Créer un compte</h2>
				<?php if (isset($validation)): ?>
					<div class="bg-red-50 border border-red-200 text-red-700 p-4 rounded mb-4" role="alert">
						<ul class="list-disc pl-5">
							<?php foreach ($validation->getErrors() as $error): ?>
								<li><?= esc($error) ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endif; ?>
				<form action="<?= site_url('signup/register') ?>" method="POST" novalidate>
					<?= csrf_field() ?>
					<div class="mb-3">
						<label for="lastName" class="block text-sm font-medium text-gray-700">Nom</label>
						<input type="text" id="lastName" name="lastName" class="block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-600" value="<?= set_value('lastName') ?>" required>
					</div>
					<div class="mb-3">
						<label for="firstName" class="block text-sm font-medium text-gray-700">Prénom</label>
						<input type="text" id="firstName" name="firstName" class="block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-600" value="<?= set_value('firstName') ?>" required>
					</div>
					<div class="mb-3">
						<label for="email" class="block text-sm font-medium text-gray-700">Email</label>
						<input type="email" id="email" name="email" class="block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-600" value="<?= set_value('email') ?>" required>
					</div>
					<div class="mb-3">
						<label for="phone" class="block text-sm font-medium text-gray-700">Téléphone</label>
						<input type="tel" id="phone" name="phone" class="block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-600" value="<?= set_value('phone') ?>" required>
					</div>
					<div class="mb-3">
						<label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
						<input type="password" id="password" name="password" class="block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-600" required>
					</div>
					<div class="mb-4">
						<label for="confirmPassword" class="block text-sm font-medium text-gray-700">Confirmer le mot de passe</label>
						<input type="password" id="confirmPassword" name="confirmPassword" class="block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-600" required>
					</div>
					<button type="submit" class="w-full btn-primary font-medium py-2 rounded-md">Créer le compte</button>
				</form>
				<div class="text-center mt-3">
					<a href="<?= site_url('signin') ?>" class="text-sm text-gray-600 hover:underline">Déjà un compte ? Se connecter</a>
				</div>
			</div>
		</div>
	</div>
</div>

<?= $this->endSection() ?>