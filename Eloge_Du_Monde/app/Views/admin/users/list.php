<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>Gestion des utilisateurs<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/admin/common.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/admin/users/list.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container mx-auto px-4 py-8">
	<!-- Header with back button -->
	<div class="mb-8" style="margin-top:6rem;">
		<a href="<?= base_url('admin') ?>" class="inline-flex items-center text-gray-600 hover:text-gray-800 mb-4">
			<svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
			</svg>
			Retour au menu admin
		</a>
		<h1 class="text-3xl font-bold text-gray-800 mb-2">Gestion des utilisateurs</h1>
		<p class="text-gray-600"><?= count($users) ?> utilisateurs inscrits</p>
	</div>

	<!-- Search Box -->
	<div class="mb-6">
		<div class="relative">
			<svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
			</svg>
			<input type="text" id="searchInput" placeholder="Rechercher un utilisateur par nom ou email..." 
				   class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 bg-gray-50">
		</div>
	</div>

	<!-- Users List -->
	<div class="space-y-4" id="usersList">
		<?php if (empty($users)): ?> 
			<p>Pas d'utilisateur</p>
		<?php else: ?>
			<?php foreach ($users as $user): ?>
				<div class="user-card bg-white rounded-lg shadow-md p-6">
					<div class="flex items-center justify-between">
						<div class="flex items-center flex-1">
							<div class="flex-shrink-0 w-14 h-14 bg-yellow-500 rounded-full flex items-center justify-center">
								<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
								</svg>
							</div>
							<div class="ml-4 flex-1">
								<div class="flex items-center">
									<h3 class="text-lg font-semibold text-gray-900"><?= esc($user['firstName']) . " " . esc($user['lastName']) ?></h3>
								</div>
								<div class="mt-1 flex items-center text-sm text-gray-600">
									<svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
									</svg>
									<?= esc($user['email']) ?>
								</div>
								<div class="mt-1 flex items-center text-sm text-gray-600">
									<svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
									</svg>
									<?= esc($user['phone']) ?>
								</div>
							</div>
						</div>
						<div class="flex items-center space-x-2">
							<a href="users/delete/<?= esc($user['idUser']) ?>" class="status-badge status-active bg-red-100 text-red-600 hover:bg-red-200 transition">
								<button onclick="confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')" class="p-2 text-gray-600 hover:text-red-600 hover:bg-red-50 rounded-lg transition">
									<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
									</svg>
								</button>
							</a>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</div>

<?= $this->section('scripts') ?>
<script src="<?= base_url('assets/js/admin/users/list.js') ?>"></script>
<?= $this->endSection() ?>

<?= $this->endSection() ?>
