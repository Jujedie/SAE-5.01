<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>Profil<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/profile.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="bg-white pt-40 pb-12 px-4">
	<div class="max-w-2xl mx-auto">
		<!-- Header -->
		<div class="text-center mb-10">
			<h1 class="text-2xl font-semibold text-gray-800">Mon compte</h1>
			<p class="text-gray-500 mt-1">Gérez vos informations personnelles</p>
		</div>

		<!-- Profile Card -->
		<div class="bg-white border border-gray-200 rounded-lg p-6">
			<!-- User Info Grid -->
			<div class="flex items-start gap-6">
				<!-- Avatar -->
				<div class="flex-shrink-0">
					<div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center">
						<svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 user_logo" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
							<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
						</svg>
					</div>
				</div>

				<!-- Info -->
				<div class="flex-1 grid grid-cols-2 gap-x-12 gap-y-4">
					<!-- Nom -->
					<div>
						<p class="text-sm text-gray-400">Nom</p>
						<p class="text-gray-800 font-medium"><?= esc($user['lastName'] ?? 'Dupont') ?></p>
					</div>
					<!-- Prénom -->
					<div>
						<p class="text-sm text-gray-400">Prénom</p>
						<p class="text-gray-800 font-medium"><?= esc($user['firstName'] ?? 'Marie') ?></p>
					</div>
					<!-- Email -->
					<div>
						<p class="text-sm text-gray-400">Email</p>
						<p class="text-gray-800 flex items-center gap-2">
							<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
								<path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
							</svg>
							<?= esc($user['email'] ?? 'marie.dupont@example.com') ?>
						</p>
					</div>
					<!-- Téléphone -->
					<div>
						<p class="text-sm text-gray-400">Téléphone</p>
						<p class="text-gray-800 flex items-center gap-2">
							<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
								<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
							</svg>
							<?= esc($user['phone'] ?? '+33 6 12 34 56 78') ?>
						</p>
					</div>
					<!-- Newsletter -->
					<div class>
						<p class="text-sm text-gray-400">Newsletter</p>
						<p class="text-gray-800 font-medium"><?= ($user['isSubscribed'] == 't' ?? true) ? 'Abonné(e)' : 'Non abonné(e)' ?></p>
					</div>
					<div class>
						<form action="<?= base_url('newsletter/toggle') ?>" method="post">
							<button type="submit" class="button_modify bg-amber-500 hover:bg-amber-600 text-white font-medium py-3 px-6 rounded-md transition-colors">
								<?= ($user['isSubscribed'] == 't' ?? true) ? 'Se désabonner' : 'S\'abonner' ?>
							</button>
						</form>
					</div>
				</div>
			</div>

			<!-- Buttons -->
			<div class="flex gap-4 mt-8">
				<form action="<?= base_url('profile/updateUser') ?>" method="post" class="flex-1">
					<button type="submit" id="btn-modifier" class="w-full flex items-center justify-center gap-2 button_modify hover:bg-amber-600 text-white font-medium py-3 px-6 rounded-md transition-colors">
						<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
							<path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
						</svg>
						Modifier le compte
					</button>
				</form>
				<form action="<?= base_url('profile/deleteUser') ?>" method="post" class="flex-1" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer votre compte ? Cette action est irréversible.');">
					<button type="submit" id="btn-supprimer" class="w-full flex items-center justify-center gap-2 bg-white border-2 border-red-500 text-red-500 hover:bg-red-50 font-medium py-3 px-6 rounded-md transition-colors">
						<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
						<path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
						</svg>
						Supprimer le compte
					</button>
				</form>	
			</div>

			<div class="flex gap-4 mt-4">
				<form action="<?= base_url('signout') ?>" method="get" class="flex-1">
					<button type="submit" id="btn-deconnexion" class="w-full flex items-center justify-center gap-2 bg-gray-800 hover:bg-gray-900 text-white font-medium py-3 px-6 rounded-md transition-colors">
						<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
							<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-9A2.25 2.25 0 002.25 5.25v13.5A2.25 2.25 0 004.5 21h9a2.25 2.25 0 002.25-2.25V15M9 12h12m0 0l-3-3m3 3l-3 3" />
						</svg>
						Se déconnecter
					</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div id="modifierModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
	<div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
		<h2 class="text-xl font-semibold text-gray-800 mb-4">Modifier le compte</h2>
		<form action="<?= base_url('profile/updateUser') ?>" method="post">
			<div class="mb-4">
				<label for="lastName" class="block text-sm text-gray-600">Nom <span class="text-red-500">*</span></label>
				<input type="text" id="lastName" name="lastName" value="<?= esc($user['lastName'] ?? '') ?>" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-amber-500">
			</div>
			<div class="mb-4">
				<label for="firstName" class="block text-sm text-gray-600">Prénom <span class="text-red-500">*</span></label>
				<input type="text" id="firstName" name="firstName" value="<?= esc($user['firstName'] ?? '') ?>" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-amber-500">
			</div>
			<div class="mb-4">
				<label for="email" class="block text-sm text-gray-600">Email <span class="text-red-500">*</span></label>
				<input type="email" id="email" name="email" value="<?= esc($user['email'] ?? '') ?>" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-amber-500">
			</div>
			<div class="mb-4">
				<label for="phone" class="block text-sm text-gray-600">Téléphone <span class="text-red-500">*</span></label>
				<input type="text" id="phone" name="phone" value="<?= esc($user['phone'] ?? '') ?>" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-amber-500">
			</div>
			<div class="mb-4">
				<label for="password" class="block text-sm text-gray-600">Nouveau mot de passe</label>
				<input type="password" id="password" name="password" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-amber-500">
			</div>
			<div class="mb-6">
				<label for="confirmPassword" class="block text-sm text-gray-600">Confirmer le nouveau mot de passe</label>
				<input type="password" id="confirmPassword" name="confirmPassword" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-amber-500">
			</div>
			<div class="flex justify-end gap-4">
				<button type="button" id="closeModal" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium py-2 px-4 rounded-md transition-colors">Annuler</button>
				<button type="submit" class="bg-amber-500 hover:bg-amber-600 text-white font-medium py-2 px-4 rounded-md transition-colors">Enregistrer</button>
			</div>
		</form>
	</div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="<?= base_url('assets/js/profile.js') ?>"></script>
<?= $this->endSection() ?>