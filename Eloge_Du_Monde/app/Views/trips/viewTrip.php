<?= $this->extend('layouts/default') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/trips/viewTrip.css') ?>">
<style>
	.hero-trip {
		background-image: url('<?= esc($trip['attachment'] ?? '/assets/images/fond-voyage.jpeg') ?>');
	}
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="hero-trip relative h-96 flex items-end">
	<div class="w-full bg-gradient-to-t p-8">
		<div class="max-w-7xl mx-auto">
			<span class="inline-block bg-amber-500 text-white text-sm font-medium px-4 py-1 rounded mb-4">
				<?= esc($trip['thematic'] ?? 'Voyage') ?>
			</span>
			<h1 class="text-4xl font-bold text-white mb-2">
				<?= esc($trip['title'] ?? 'Voyage') ?>
			</h1>
		</div>
	</div>
</section>

<!-- Infos rapides -->
<section class="bg-white shadow-md">
	<div class="max-w-7xl mx-auto px-4">
		<div class="grid grid-cols-2 md:grid-cols-4 divide-x divide-gray-200">
			<div class="py-6 px-4 text-center">
				<svg class="w-6 h-6 mx-auto text-amber-500 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
				</svg>
				<p class="text-xs text-gray-500 mb-1">Prix</p>
				<p class="text-lg font-semibold text-amber-500"><?= esc($trip['amount'] ?? '0') ?> €</p>
			</div>
			<div class="py-6 px-4 text-center">
				<svg class="w-6 h-6 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
				</svg>
				<p class="text-xs text-gray-500 mb-1">Date de départ</p>
				<p class="text-lg font-semibold text-gray-700"><?= esc($trip['departureDate'] ?? 'À définir') ?></p>
			</div>
			<div class="py-6 px-4 text-center">
				<svg class="w-6 h-6 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
				</svg>
				<p class="text-xs text-gray-500 mb-1">Type</p>
				<p class="text-lg font-semibold text-gray-700"><?= esc($trip['type'] ?? 'Standard') ?></p>
			</div>
			<div class="py-6 px-4 text-center">
				<svg class="w-6 h-6 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
				</svg>
				<p class="text-xs text-gray-500 mb-1">Étapes</p>
				<p class="text-lg font-semibold text-gray-700"><?= count($steps ?? []) ?> étapes</p>
			</div>
		</div>
	</div>
</section>

<!-- Contenu principal -->
<section class="py-12 px-4 bg-gray-50">
	<div class="max-w-7xl mx-auto">
		<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
			
			<!-- Colonne principale -->
			<div class="lg:col-span-2 space-y-8">
				
				<!-- Programme -->
				<?php if (!empty($trip['programdesc'])): ?>
				<div class="bg-white rounded-lg shadow-md p-6">
					<h2 class="flex items-center text-xl font-semibold text-gray-800 mb-4">
						<svg class="w-5 h-5 mr-2 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
						</svg>
						Programme du voyage
					</h2>
					<p class="text-gray-600 leading-relaxed"><?= nl2br(esc($trip['programdesc'])) ?></p>
				</div>
				<?php endif; ?>

				<!-- Hébergement -->
				<?php if (!empty($trip['hostingdesc'])): ?>
				<div class="bg-white rounded-lg shadow-md p-6">
					<h2 class="flex items-center text-xl font-semibold text-gray-800 mb-4">
						<svg class="w-5 h-5 mr-2 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
						</svg>
						Hébergement
					</h2>
					<p class="text-gray-600 leading-relaxed"><?= nl2br(esc($trip['hostingdesc'])) ?></p>
				</div>
				<?php endif; ?>

				<!-- Étapes du voyage -->
				<?php if (!empty($steps)): ?>
				<div class="bg-white rounded-lg shadow-md p-6">
					<h2 class="flex items-center text-xl font-semibold text-gray-800 mb-6">
						<svg class="w-5 h-5 mr-2 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
						</svg>
						Étapes du voyage
					</h2>
					<div class="relative">
						<!-- Ligne verticale -->
						<div class="absolute left-4 top-0 bottom-0 w-0.5 bg-amber-200"></div>
						
						<div class="space-y-6">
							<?php foreach ($steps as $index => $step): ?>
							<div class="relative flex items-start ml-4 pl-8">
								<!-- Point -->
								<div class="absolute left-0 w-4 h-4 bg-amber-500 rounded-full border-4 border-amber-100 -translate-x-1/2"></div>
								
								<div class="bg-gray-50 rounded-lg p-4 flex-1">
									<div class="flex justify-between items-start">
										<div>
											<span class="text-xs text-amber-500 font-medium">Étape <?= $index + 1 ?></span>
											<h3 class="text-lg font-medium text-gray-800"><?= esc($step['name']) ?></h3>
											<?php if (!empty($step['country'])): ?>
											<p class="text-sm text-gray-500"><?= esc($step['country']) ?></p>
											<?php endif; ?>
										</div>
										<?php if (!empty($step['cost'])): ?>
										<span class="text-amber-500 font-semibold"><?= esc($step['cost']) ?> €</span>
										<?php endif; ?>
									</div>
								</div>
							</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
				<?php endif; ?>

			</div>

			<!-- Sidebar -->
			<div class="space-y-6">
				
				<!-- Carte de réservation -->
				<div class="bg-white rounded-lg shadow-md p-6 sticky top-4">
					<div class="text-center mb-6">
						<p class="text-gray-500 text-sm">À partir de</p>
						<p class="text-3xl font-bold text-amber-500"><?= esc($trip['amount'] ?? '0') ?> €</p>
						<p class="text-gray-500 text-sm">par personne</p>
					</div>
					
					<a 
						href="<?= site_url('booking/create/' . ($trip['idTrip'] ?? '#')) ?>" 
						class="block w-full bg-amber-500 hover:bg-amber-600 text-white text-center py-3 rounded-lg font-medium transition-colors mb-4"
					>
						Réserver ce voyage
					</a>
					
					<a 
						href="<?= site_url('contact') ?>" 
						class="block w-full border border-amber-500 text-amber-500 hover:bg-amber-50 text-center py-3 rounded-lg font-medium transition-colors"
					>
						Nous contacter
					</a>
				</div>

				<!-- Conditions -->
				<?php if (!empty($trip['conditiondesc'])): ?>
				<div class="bg-white rounded-lg shadow-md p-6">
					<h3 class="flex items-center text-lg font-semibold text-gray-800 mb-3">
						<svg class="w-5 h-5 mr-2 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
						</svg>
						Conditions
					</h3>
					<p class="text-gray-600 text-sm leading-relaxed"><?= nl2br(esc($trip['conditiondesc'])) ?></p>
				</div>
				<?php endif; ?>

				<!-- Formalités -->
				<?php if (!empty($trip['formalitiesdesc'])): ?>
				<div class="bg-white rounded-lg shadow-md p-6">
					<h3 class="flex items-center text-lg font-semibold text-gray-800 mb-3">
						<svg class="w-5 h-5 mr-2 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
						</svg>
						Formalités
					</h3>
					<p class="text-gray-600 text-sm leading-relaxed"><?= nl2br(esc($trip['formalitiesdesc'])) ?></p>
				</div>
				<?php endif; ?>

			</div>
		</div>
	</div>
</section>

<!-- Retour -->
<section class="py-8 px-4 bg-white">
	<div class="max-w-7xl mx-auto text-center">
		<a href="<?= site_url('trips') ?>" class="inline-flex items-center text-amber-500 hover:text-amber-600 font-medium">
			<svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
			</svg>
			Retour aux destinations
		</a>
	</div>
</section>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<?= $this->endSection() ?>