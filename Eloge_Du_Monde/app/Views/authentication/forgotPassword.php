<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>Mot de passe oublié<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="min-h-screen flex items-center justify-center pt-28 bg-white">
	<div class="w-full sm:w-3/4 md:w-2/3 lg:w-5/12 px-4">
		<div class="bg-white rounded-lg shadow border border-gray-300">
			<div class="p-6">
				<h2 class="text-2xl font-semibold mb-4">Mot de passe oublié</h2>
				<p class="text-gray-500 mb-4">Entrez votre adresse e-mail et nous vous enverrons un lien pour réinitialiser votre mot de passe.</p>
				<form action="<?= site_url('forgotpassword/sendResetLink') ?>" method="POST">
					<?= csrf_field() ?>
					<div class="mb-4">
						<label for="email" class="block text-sm font-medium text-gray-700">Adresse e-mail</label>
						<input type="email" id="email" name="email" class="block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-600" value="<?= set_value('email') ?>" required>
					</div>
					<button type="submit" class="w-full btn-primary font-medium py-2 rounded-md">Envoyer le lien de réinitialisation</button>
				</form>
				<div class="text-center mt-3">
					<a href="<?= site_url('signin') ?>" class="text-sm text-gray-600 hover:underline">Retour à la connexion</a>
				</div>
			</div>
		</div>
	</div>
</div>

<?= $this->endSection() ?>