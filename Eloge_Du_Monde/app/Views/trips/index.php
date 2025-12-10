<?= $this->extend('layouts/default') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/trips/index.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="hero-section relative h-96 flex items-center justify-center" style="background-image: url('<?= base_url('assets/images/fond-voyages.jpeg') ?>');">
	<div class="absolute inset-0 bg-black/40"></div>
	<div class="relative z-10 text-center text-white px-4">
		<h1 class="text-sm uppercase tracking-widest mb-4">Nos Destinations</h1>
		<p class="max-w-2xl mx-auto text-lg">
			Découvrez notre sélection de destinations d'exception à travers le monde, soigneusement choisies pour vous offrir des expériences uniques et inoubliables.
		</p>
	</div>
</section>

<!-- Trips Grid -->
<section class="py-16 px-4 bg-gray-100">
	<div class="max-w-7xl mx-auto">
		<div class="grid grid-cols-1 md:grid-cols-2 gap-8">
			<?php if (!empty($listTrips)): ?>
				<?php foreach ($listTrips as $trip): ?>
					<div class="bg-white rounded-lg shadow-md overflow-hidden">
						<!-- Image avec badge -->
						<div class="relative h-52">
							<img 
								src="<?= esc($trip['attachment'] ?? '/assets/images/fond-voyage.jpeg') ?>" 
								alt="<?= esc($trip['title'] ?? 'Voyage') ?>" 
								class="w-full h-full object-cover"
							>
							<span class="absolute top-4 right-4 bg-amber-500 text-white text-xs font-medium px-3 py-1 rounded">
								<?= esc($trip['thematic'] ?? 'Destination') ?>
							</span>
						</div>

						<!-- Contenu -->
						<div class="p-6">
							<!-- Titre -->
							<h3 class="text-lg font-semibold text-gray-800 mb-2">
								<?= esc($trip['title'] ?? 'Voyage') ?>
							</h3>
							
							<!-- Description courte (italique) -->
							<p class="text-gray-500 text-sm italic mb-3">
								<?= esc($trip['hostingdesc'] ?? '') ?>
							</p>
							
							<!-- Description longue -->
							<p class="text-gray-600 text-sm mb-5 leading-relaxed">
								<?= esc($trip['programdesc'] ?? '') ?>
							</p>

							<!-- Points forts -->
							<div class="mb-5">
								<h4 class="flex items-center text-amber-500 text-sm font-medium mb-3">
									<svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
										<path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
									</svg>
									Points forts
								</h4>
								<?php if (!empty($trip['highlights'])): ?>
									<div class="grid grid-cols-2 gap-x-4 gap-y-2">
										<?php foreach ($trip['highlights'] as $highlight): ?>
											<div class="flex items-center text-sm text-gray-600">
												<svg class="w-4 h-4 mr-2 text-amber-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
													<path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
												</svg>
												<?= esc($highlight) ?>
											</div>
										<?php endforeach; ?>
									</div>
								<?php endif; ?>
							</div>

							<!-- Infos (Durée, Saison, Prix) -->
							<div class="bg-gray-50 rounded-lg p-4 mb-4">
								<div class="grid grid-cols-3 divide-x divide-gray-200 text-center">
									<div class="px-2">
										<svg class="w-5 h-5 mx-auto text-gray-400 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
										</svg>
										<p class="text-xs text-gray-400 mb-1">Date de départ</p>
										<p class="text-sm font-medium text-gray-700"><?= esc($trip['departureDate'] ?? '1970-01-01 00:00:00') ?></p>
									</div>
									<div class="px-2">
										<svg class="w-5 h-5 mx-auto text-gray-400 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 12a4 4 0 100-8 4 4 0 000 8zm0 2c-2.667 0-8 1.333-8 4v2h16v-2c0-2.667-5.333-4-8-4z"/>
										</svg>
										<p class="text-xs text-gray-400 mb-1">Type Voyage</p>
										<p class="text-sm font-medium text-gray-700"><?= esc($trip['type'] ?? 'Luxe') ?></p>
									</div>
									<div class="px-2">
										<svg class="w-5 h-5 mx-auto text-amber-500 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
										</svg>
										<p class="text-xs text-gray-400 mb-1">Prix</p>
										<p class="text-sm font-medium text-amber-500">A partir de <?= esc($trip['amount'] ?? '0') ?>€</p>
									</div>
								</div>
							</div>

							<!-- Bouton -->
							<a 
								href="<?= site_url('viewTrip/' . ($trip['idTrip'] ?? '#')) ?>" 
								class="block w-full bg-amber-500 hover:bg-amber-600 text-white text-center py-3 rounded font-medium transition-colors"
							>
								Découvrir ce voyage
							</a>
						</div>
					</div>
				<?php endforeach; ?>
			<?php else: ?>
				<div class="col-span-2 text-center py-16">
					<p class="text-gray-500 text-lg">Aucun voyage disponible pour le moment.</p>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<?= $this->endSection() ?>