<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>Gestion des voyages préfaits<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<style>
	.voyage-card {
		transition: all 0.3s ease;
	}
	.voyage-card:hover {
		transform: translateY(-2px);
		box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
	}
	.thematic-badge {
		display: inline-flex;
		align-items: center;
		padding: 0.25rem 0.75rem;
		border-radius: 9999px;
		font-size: 0.75rem;
		font-weight: 600;
		background-color: #e0e7ff;
		color: #3730a3;
	}
	.extension-badge {
		display: inline-flex;
		align-items: center;
		padding: 0.25rem 0.5rem;
		border-radius: 9999px;
		font-size: 0.7rem;
		font-weight: 600;
		background-color: #f3e8ff;
		color: #6b21a8;
	}
	.extensions-container {
		max-height: 0;
		overflow: hidden;
		transition: max-height 0.3s ease;
	}
	.extensions-container.active {
		max-height: 1000px;
	}
	.extension-item {
		border-left: 3px solid #8b5cf6;
		background-color: #faf5ff;
	}
</style>
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
				<h1 class="text-3xl font-bold text-gray-800 mb-2">Gestion des voyages préfaits</h1>
				<p class="text-gray-600"><?php $count = (isset($prebuiltTrips) && is_array($prebuiltTrips)) ? count($prebuiltTrips) : 0; echo $count; ?> voyage<?= $count > 1 ? 's' : '' ?> préfait<?= $count > 1 ? 's' : '' ?> au total</p>
			</div>
			<a href="<?= base_url('admin/prebuiltTrips/add') ?>" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-300 flex items-center space-x-2">
				<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
				</svg>
				<span>Créer un voyage préfait</span>
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
			<input type="text" id="searchInput" placeholder="Rechercher par titre ou thématique..." 
				   class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 bg-gray-50"
				   onkeyup="filterTrips()">
		</div>
	</div>

	<!-- Voyages List -->
	<?php if (empty($prebuiltTrips)): ?>
		<div class="bg-white rounded-lg shadow-md p-12 text-center">
			<svg class="mx-auto w-16 h-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
			</svg>
			<h3 class="text-xl font-semibold text-gray-700 mb-2">Aucun voyage préfait</h3>
			<p class="text-gray-500 mb-4">Commencez par créer votre premier voyage préfait</p>
			<a href="<?= base_url('admin/prebuiltTrips/add') ?>" class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition">
				<svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
				</svg>
				Créer un voyage préfait
			</a>
		</div>
	<?php else: ?>
		<div class="space-y-4" id="voyagesList">
			<?php foreach ($prebuiltTrips as $trip): ?>
				<div class="voyage-card bg-white rounded-lg shadow-md p-6" data-title="<?= esc(strtolower($trip['title'] ?? '')) ?>" data-thematic="<?= esc(strtolower($trip['thematic'] ?? '')) ?>">
					<div class="flex items-start justify-between">
						<div class="flex items-start flex-1">
							<div class="flex-shrink-0 w-14 h-14 bg-indigo-100 rounded-full flex items-center justify-center">
								<svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
								</svg>
							</div>
							<div class="ml-4 flex-1">
								<div class="flex items-center">
									<h3 class="text-xl font-bold text-gray-900"><?= esc($trip['title'] ?? 'Sans titre') ?></h3>
									<?php if (!empty($trip['thematic'])): ?>
										<span class="thematic-badge ml-3"><?= esc($trip['thematic']) ?></span>
									<?php endif; ?>
									<?php if (!empty($trip['extensions']) && count($trip['extensions']) > 0): ?>
										<span class="extension-badge ml-2">
											<svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
											</svg>
											<?= count($trip['extensions']) ?> extension<?= count($trip['extensions']) > 1 ? 's' : '' ?>
										</span>
									<?php endif; ?>
								</div>
								
								<?php if (!empty($trip['departureDate'])): ?>
									<div class="mt-2 flex items-center text-gray-600">
										<svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
										</svg>
										<?= date('d/m/Y', strtotime($trip['departureDate'])) ?>
									</div>
								<?php endif; ?>
								
								<?php if (!empty($trip['amount'])): ?>
									<div class="mt-2">
										<span class="text-lg font-bold text-indigo-600"><?= number_format($trip['amount'], 0, ',', ' ') ?>€</span>
									</div>
								<?php endif; ?>
								
								<?php if (!empty($trip['type'])): ?>
									<div class="mt-1 text-sm text-gray-500">
										Type: <?= esc($trip['type']) ?>
									</div>
								<?php endif; ?>
							</div>
						</div>
						<div class="flex items-center space-x-2">
							<?php if (!empty($trip['extensions']) && count($trip['extensions']) > 0): ?>
								<button onclick="toggleExtensions(<?= $trip['idTrip'] ?>)" 
										class="p-2 text-gray-600 hover:text-purple-600 hover:bg-purple-50 rounded-lg transition" 
										title="Voir les extensions">
									<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
									</svg>
								</button>
							<?php endif; ?>
							<a href="<?= base_url('admin/prebuiltTrips/extension/add/' . $trip['idTrip']) ?>" 
							   class="p-2 text-gray-600 hover:text-green-600 hover:bg-green-50 rounded-lg transition" 
							   title="Ajouter une extension">
								<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
								</svg>
							</a>
							<a href="<?= base_url('admin/prebuiltTrips/edit/' . $trip['idTrip']) ?>" 
							   class="p-2 text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition" 
							   title="Modifier">
								<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
								</svg>
							</a>
							<form action="<?= base_url('admin/prebuiltTrips/delete/' . $trip['idTrip']) ?>" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce voyage préfait ?');" class="inline">
								<?= csrf_field() ?>
								<button type="submit" class="p-2 text-gray-600 hover:text-red-600 hover:bg-red-50 rounded-lg transition" title="Supprimer">
									<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
									</svg>
								</button>
							</form>
						</div>
					</div>
					
					<!-- Extensions dépliables -->
					<?php if (!empty($trip['extensions']) && count($trip['extensions']) > 0): ?>
						<div id="extensions-<?= $trip['idTrip'] ?>" class="extensions-container mt-4">
							<div class="border-t border-gray-200 pt-4">
								<h4 class="text-sm font-semibold text-purple-900 mb-3 flex items-center">
									<svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
									</svg>
									Extensions disponibles (<?= count($trip['extensions']) ?>)
								</h4>
								<div class="space-y-2">
									<?php foreach ($trip['extensions'] as $extension): ?>
										<div class="extension-item p-3 rounded-lg">
											<div class="flex items-start justify-between">
												<div class="flex-1">
													<h5 class="font-semibold text-gray-900"><?= esc($extension['title'] ?? 'Sans titre') ?></h5>
													<div class="flex items-center space-x-3 mt-1 text-sm">
														<span class="text-purple-600 font-bold">+<?= number_format($extension['amount'], 0, ',', ' ') ?>€</span>
														<?php if (!empty($extension['attachment'])): ?>
															<a href="<?= base_url('uploads/' . $extension['attachment']) ?>" 
															   class="inline-flex items-center text-blue-600 hover:text-blue-800" 
															   target="_blank">
																<svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
																	<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/>
																</svg>
																Pièce jointe
															</a>
														<?php endif; ?>
													</div>
												</div>
												<form action="<?= base_url('admin/prebuiltTrips/extension/delete/' . $extension['idTrip'] . '/' . $trip['idTrip']) ?>" 
													  method="POST" 
													  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette extension ?');" 
													  class="ml-3">
													<?= csrf_field() ?>
													<button type="submit" class="p-1 text-gray-500 hover:text-red-600 transition" title="Supprimer">
														<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
															<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
														</svg>
													</button>
												</form>
											</div>
										</div>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</div>

<script>
	function filterTrips() {
		const searchInput = document.getElementById('searchInput').value.toLowerCase();
		const cards = document.querySelectorAll('.voyage-card');
		
		cards.forEach(card => {
			const title = card.getAttribute('data-title') || '';
			const thematic = card.getAttribute('data-thematic') || '';
			
			if (title.includes(searchInput) || thematic.includes(searchInput)) {
				card.style.display = 'block';
			} else {
				card.style.display = 'none';
			}
		});
	}
	
	function toggleExtensions(tripId) {
		const container = document.getElementById('extensions-' + tripId);
		if (container) {
			container.classList.toggle('active');
		}
	}
</script>

<?= $this->endSection() ?>
