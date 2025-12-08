<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>Destinations - <?= esc($country['name']) ?><?= $this->endSection() ?>

<?= $this->section('styles') ?>
<style>
	.destination-card {
		transition: all 0.3s ease;
	}
	.destination-card:hover {
		transform: translateY(-2px);
		box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
	}
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container mx-auto px-4 py-8">
	<div class="mb-8" style="margin-top:6rem;">
		<a href="<?= base_url('admin/countries') ?>" class="inline-flex items-center text-gray-600 hover:text-gray-800 mb-4">
			<svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
			</svg>
			Retour à la liste des pays
		</a>
		
		<div class="bg-white rounded-lg shadow-sm p-4 mb-6">
			<div class="flex items-center">
				<div class="flex-shrink-0 w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mr-4">
					<svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
					</svg>
				</div>
				<div>
					<h2 class="text-xl font-bold text-gray-800"><?= esc($country['name']) ?></h2>
					<p class="text-gray-600">
						<?= esc(ucfirst($country['continent'] ?? '')) ?>
						<?php if (!empty($country['cost'])): ?>
							• <?= number_format($country['cost'], 0, ',', ' ') ?>€/nuit
						<?php endif; ?>
					</p>
				</div>
			</div>
		</div>
		
		<div class="flex items-center justify-between">
			<div>
				<h1 class="text-3xl font-bold text-gray-800 mb-2">Destinations</h1>
				<p class="text-gray-600"><?= count($destinations) ?> destination(s) dans ce pays</p>
			</div>
			<a href="<?= base_url('admin/countries/' . $country['idCountry'] . '/destinations/add') ?>" 
			   class="bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-300 flex items-center space-x-2">
				<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
				</svg>
				<span>Ajouter une destination</span>
			</a>
		</div>
	</div>

	<!-- Flash Messages -->
	<?php if (session()->getFlashdata('success')): ?>
		<div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
			<span class="block sm:inline"><?= session()->getFlashdata('success') ?></span>
		</div>
	<?php endif; ?>

	<?php if (session()->getFlashdata('error')): ?>
		<div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
			<span class="block sm:inline"><?= session()->getFlashdata('error') ?></span>
		</div>
	<?php endif; ?>

	<!-- Search Box -->
	<div class="mb-6">
		<div class="relative">
			<svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
			</svg>
			<input type="text" id="searchInput" placeholder="Rechercher une destination..." 
				   class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500 bg-gray-50"
				   onkeyup="filterDestinations()">
		</div>
	</div>

	<!-- Destinations List -->
	<?php if (empty($destinations)): ?>
		<div class="bg-white rounded-lg shadow-md p-12 text-center">
			<svg class="mx-auto w-16 h-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
			</svg>
			<h3 class="text-xl font-semibold text-gray-700 mb-2">Aucune destination</h3>
			<p class="text-gray-500 mb-4">Ajoutez des destinations pour <?= esc($country['name']) ?></p>
			<a href="<?= base_url('admin/countries/' . $country['idCountry'] . '/destinations/add') ?>" 
			   class="inline-flex items-center bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg transition">
				<svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
				</svg>
				Ajouter une destination
			</a>
		</div>
	<?php else: ?>
		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4" id="destinationsList">
			<?php foreach ($destinations as $destination): ?>
				<div class="destination-card bg-white rounded-lg shadow-md p-6" data-name="<?= esc(strtolower($destination['name'])) ?>">
					<div class="flex items-start justify-between mb-3">
						<div class="flex-shrink-0 w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
							<svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
							</svg>
						</div>
						<div class="flex space-x-2">
							<a href="<?= base_url('admin/countries/' . $country['idCountry'] . '/destinations/edit/' . $destination['idTripStep']) ?>" 
							   class="p-2 text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition" 
							   title="Modifier">
								<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
								</svg>
							</a>
							<form action="<?= base_url('admin/countries/' . $country['idCountry'] . '/destinations/delete/' . $destination['idTripStep']) ?>" 
								  method="POST" 
								  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette destination ?');" 
								  class="inline">
								<?= csrf_field() ?>
								<button type="submit" 
										class="p-2 text-gray-600 hover:text-red-600 hover:bg-red-50 rounded-lg transition" 
										title="Supprimer">
									<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
									</svg>
								</button>
							</form>
						</div>
					</div>
					
					<h3 class="text-lg font-bold text-gray-900 mb-2"><?= esc($destination['name']) ?></h3>
					
					<?php if (!empty($destination['cost'])): ?>
						<div class="flex items-center text-green-600 font-bold text-lg">
							<svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
							</svg>
							<?= number_format($destination['cost'], 0, ',', ' ') ?>€
						</div>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</div>

<script>
	function filterDestinations() {
		const searchInput = document.getElementById('searchInput').value.toLowerCase();
		const cards = document.querySelectorAll('.destination-card');
		
		cards.forEach(card => {
			const name = card.getAttribute('data-name') || '';
			
			if (name.includes(searchInput)) {
				card.style.display = 'block';
			} else {
				card.style.display = 'none';
			}
		});
	}
</script>

<?= $this->endSection() ?>
