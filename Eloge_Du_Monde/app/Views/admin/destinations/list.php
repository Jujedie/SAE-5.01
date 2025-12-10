<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>Gestion des destinations<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/admin/destinations/list.css') ?>">
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
		<div class="flex items-center justify-between">
			<div>
				<h1 class="text-3xl font-bold text-gray-800 mb-2">Gestion des destinations</h1>
				<p class="text-gray-600">6 destinations au total</p>
			</div>
			<button onclick="window.location.href='<?= base_url('admin/destinations/ajouter') ?>'" 
					class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-6 py-3 rounded-lg flex items-center space-x-2 transition">
				<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
				</svg>
				<span>Ajouter une destination</span>
			</button>
		</div>
	</div>

	<!-- Search Box -->
	<div class="mb-6">
		<div class="relative">
			<svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
			</svg>
			<input type="text" id="searchInput" placeholder="Rechercher une destination ou un pays..." 
				   class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 bg-gray-50">
		</div>
	</div>

	<!-- Destinations List -->
	<div class="space-y-4" id="destinationsList">
		<!-- Sample Destination Card 1 -->
		<div class="destination-card bg-white rounded-lg shadow-md p-6">
			<div class="flex items-center justify-between">
				<div class="flex items-center flex-1">
					<div class="flex-shrink-0 w-14 h-14 bg-yellow-100 rounded-full flex items-center justify-center">
						<svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
						</svg>
					</div>
					<div class="ml-4 flex-1">
						<div class="flex items-center">
							<h3 class="text-xl font-bold text-gray-900">Paris</h3>
							<span class="status-badge status-active ml-3">Actif</span>
						</div>
						<div class="mt-1 text-sm text-gray-600">France • Europe</div>
					</div>
				</div>
				<div class="flex items-center space-x-2">
					<button onclick="editDestination(1)" class="p-2 text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition">
						<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
						</svg>
					</button>
					<button onclick="deleteDestination(1)" class="p-2 text-gray-600 hover:text-red-600 hover:bg-red-50 rounded-lg transition">
						<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
						</svg>
					</button>
				</div>
			</div>
		</div>

		<!-- Sample Destination Card 2 -->
		<div class="destination-card bg-white rounded-lg shadow-md p-6">
			<div class="flex items-center justify-between">
				<div class="flex items-center flex-1">
					<div class="flex-shrink-0 w-14 h-14 bg-yellow-100 rounded-full flex items-center justify-center">
						<svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
						</svg>
					</div>
					<div class="ml-4 flex-1">
						<div class="flex items-center">
							<h3 class="text-xl font-bold text-gray-900">Tokyo</h3>
							<span class="status-badge status-active ml-3">Actif</span>
						</div>
						<div class="mt-1 text-sm text-gray-600">Japon • Asie</div>
					</div>
				</div>
				<div class="flex items-center space-x-2">
					<button onclick="editDestination(2)" class="p-2 text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition">
						<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
						</svg>
					</button>
					<button onclick="deleteDestination(2)" class="p-2 text-gray-600 hover:text-red-600 hover:bg-red-50 rounded-lg transition">
						<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
						</svg>
					</button>
				</div>
			</div>
		</div>

		<!-- Sample Destination Card 3 -->
		<div class="destination-card bg-white rounded-lg shadow-md p-6">
			<div class="flex items-center justify-between">
				<div class="flex items-center flex-1">
					<div class="flex-shrink-0 w-14 h-14 bg-yellow-100 rounded-full flex items-center justify-center">
						<svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
						</svg>
					</div>
					<div class="ml-4 flex-1">
						<div class="flex items-center">
							<h3 class="text-xl font-bold text-gray-900">New York</h3>
							<span class="status-badge status-active ml-3">Actif</span>
						</div>
						<div class="mt-1 text-sm text-gray-600">États-Unis • Amérique du Nord</div>
					</div>
				</div>
				<div class="flex items-center space-x-2">
					<button onclick="editDestination(3)" class="p-2 text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition">
						<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
						</svg>
					</button>
					<button onclick="deleteDestination(3)" class="p-2 text-gray-600 hover:text-red-600 hover:bg-red-50 rounded-lg transition">
						<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
						</svg>
					</button>
				</div>
			</div>
		</div>

		<!-- Sample Destination Card 4 -->
		<div class="destination-card bg-white rounded-lg shadow-md p-6">
			<div class="flex items-center justify-between">
				<div class="flex items-center flex-1">
					<div class="flex-shrink-0 w-14 h-14 bg-yellow-100 rounded-full flex items-center justify-center">
						<svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
						</svg>
					</div>
					<div class="ml-4 flex-1">
						<div class="flex items-center">
							<h3 class="text-xl font-bold text-gray-900">Bali</h3>
							<span class="status-badge status-active ml-3">Actif</span>
						</div>
						<div class="mt-1 text-sm text-gray-600">Indonésie • Asie</div>
					</div>
				</div>
				<div class="flex items-center space-x-2">
					<button onclick="editDestination(4)" class="p-2 text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition">
						<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
						</svg>
					</button>
					<button onclick="deleteDestination(4)" class="p-2 text-gray-600 hover:text-red-600 hover:bg-red-50 rounded-lg transition">
						<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
						</svg>
					</button>
				</div>
			</div>
		</div>

		<?php foreach($destinations ?? [] as $destination): ?>
		<div class="destination-card bg-white rounded-lg shadow-md p-6">
			<div class="flex items-center justify-between">
				<div class="flex items-center flex-1">
					<div class="flex-shrink-0 w-14 h-14 bg-yellow-100 rounded-full flex items-center justify-center">
						<svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
						</svg>
					</div>
					<div class="ml-4 flex-1">
						<div class="flex items-center">
							<h3 class="text-xl font-bold text-gray-900"><?= esc($destination['nom'] ?? 'N/A') ?></h3>
							<span class="status-badge status-active ml-3">Actif</span>
						</div>
						<div class="mt-1 text-sm text-gray-600"><?= esc($destination['pays'] ?? 'N/A') ?> • <?= esc($destination['continent'] ?? 'N/A') ?></div>
					</div>
				</div>
				<div class="flex items-center space-x-2">
					<button onclick="editDestination(<?= $destination['id'] ?? 0 ?>)" class="p-2 text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition">
						<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
						</svg>
					</button>
					<button onclick="deleteDestination(<?= $destination['id'] ?? 0 ?>)" class="p-2 text-gray-600 hover:text-red-600 hover:bg-red-50 rounded-lg transition">
						<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
						</svg>
					</button>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
</div>

<?= $this->section('scripts') ?>
<script>
	initBaseUrl('<?= base_url() ?>');
</script>
<script src="<?= base_url('assets/js/admin/destinations/list.js') ?>"></script>
<?= $this->endSection() ?>

<?= $this->endSection() ?>
