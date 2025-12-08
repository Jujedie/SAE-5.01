<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>Gestion des pays<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<style>
	.country-card {
		transition: all 0.3s ease;
	}
	.country-card:hover {
		transform: translateY(-2px);
		box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
	}
	.continent-badge {
		display: inline-flex;
		align-items: center;
		padding: 0.25rem 0.75rem;
		border-radius: 9999px;
		font-size: 0.75rem;
		font-weight: 600;
	}
	.continent-europe { background-color: #dbeafe; color: #1e40af; }
	.continent-asie { background-color: #fce7f3; color: #be123c; }
	.continent-afrique { background-color: #fef3c7; color: #92400e; }
	.continent-amerique { background-color: #d1fae5; color: #065f46; }
	.continent-oceanie { background-color: #e0e7ff; color: #3730a3; }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container mx-auto px-4 py-8">
	<div class="mb-8" style="margin-top:6rem;">
		<a href="<?= base_url('admin') ?>" class="inline-flex items-center text-gray-600 hover:text-gray-800 mb-4">
			<svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
			</svg>
			Retour au menu admin
		</a>
		<div class="flex items-center justify-between">
			<div>
				<h1 class="text-3xl font-bold text-gray-800 mb-2">Gestion des pays</h1>
				<p class="text-gray-600"><?= count($countries) ?> pays au total</p>
			</div>
			<a href="<?= base_url('admin/countries/add') ?>" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-300 flex items-center space-x-2">
				<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
				</svg>
				<span>Ajouter un pays</span>
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
			<input type="text" id="searchInput" placeholder="Rechercher par nom ou continent..." 
				   class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 bg-gray-50"
				   onkeyup="filterCountries()">
		</div>
	</div>

	<!-- Countries List -->
	<?php if (empty($countries)): ?>
		<div class="bg-white rounded-lg shadow-md p-12 text-center">
			<svg class="mx-auto w-16 h-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
			</svg>
			<h3 class="text-xl font-semibold text-gray-700 mb-2">Aucun pays</h3>
			<p class="text-gray-500 mb-4">Commencez par ajouter votre premier pays</p>
			<a href="<?= base_url('admin/countries/add') ?>" class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition">
				<svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
				</svg>
				Ajouter un pays
			</a>
		</div>
	<?php else: ?>
		<div class="space-y-4" id="countriesList">
			<?php foreach ($countries as $country): ?>
				<div class="country-card bg-white rounded-lg shadow-md p-6" data-name="<?= esc(strtolower($country['name'])) ?>" data-continent="<?= esc(strtolower($country['continent'] ?? '')) ?>">
					<div class="flex items-start justify-between">
						<div class="flex items-start flex-1">
							<div class="flex-shrink-0 w-14 h-14 bg-purple-100 rounded-full flex items-center justify-center">
								<svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
								</svg>
							</div>
							<div class="ml-4 flex-1">
								<div class="flex items-center">
									<h3 class="text-xl font-bold text-gray-900"><?= esc($country['name']) ?></h3>
									<?php if (!empty($country['continent'])): ?>
										<span class="continent-badge continent-<?= esc(strtolower($country['continent'])) ?> ml-3">
											<?= esc(ucfirst($country['continent'])) ?>
										</span>
									<?php endif; ?>
								</div>
								
								<?php if (!empty($country['cost'])): ?>
									<div class="mt-2">
										<span class="text-lg font-bold text-purple-600"><?= number_format($country['cost'], 0, ',', ' ') ?>€ / nuit</span>
									</div>
								<?php endif; ?>
							</div>
						</div>
						<div class="flex items-center space-x-2">
							<a href="<?= base_url('admin/countries/' . $country['idCountry'] . '/destinations') ?>" 
							   class="p-2 text-gray-600 hover:text-green-600 hover:bg-green-50 rounded-lg transition" 
							   title="Gérer les destinations">
								<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
								</svg>
							</a>
							<a href="<?= base_url('admin/countries/edit/' . $country['idCountry']) ?>" 
							   class="p-2 text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition" 
							   title="Modifier">
								<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
								</svg>
							</a>
							<form action="<?= base_url('admin/countries/delete/' . $country['idCountry']) ?>" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce pays ?');" class="inline">
								<?= csrf_field() ?>
								<button type="submit" class="p-2 text-gray-600 hover:text-red-600 hover:bg-red-50 rounded-lg transition" title="Supprimer">
									<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
									</svg>
								</button>
							</form>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</div>

<script>
	function filterCountries() {
		const searchInput = document.getElementById('searchInput').value.toLowerCase();
		const cards = document.querySelectorAll('.country-card');
		
		cards.forEach(card => {
			const name = card.getAttribute('data-name') || '';
			const continent = card.getAttribute('data-continent') || '';
			
			if (name.includes(searchInput) || continent.includes(searchInput)) {
				card.style.display = 'block';
			} else {
				card.style.display = 'none';
			}
		});
	}
</script>

<?= $this->endSection() ?>
