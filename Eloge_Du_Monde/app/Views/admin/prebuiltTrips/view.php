<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>Visualisation du Voyage Préfait<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container mx-auto px-4 py-8">
	<div class="mb-8" style="margin-top:6rem;">
		<a href="<?= base_url('admin/prebuiltTrips') ?>" class="inline-flex items-center text-gray-600 hover:text-gray-800 mb-4">
			<svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
			</svg>
			Retour à la liste
		</a>
		<h1 class="text-3xl font-bold text-gray-800 mb-2">Visualisation du Voyage Préfait</h1>
		<p class="text-gray-600">Détails du voyage préfait</p>
	</div>

	<div class="bg-white rounded-lg shadow-md p-8">
		<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
			<!-- Titre -->
			<div class="md:col-span-2">
				<label class="block text-sm font-medium text-gray-700 mb-2">Titre du voyage</label>
				<div class="w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-900">
					<?= esc($prebuiltTrip['title'] ?? '') ?>
				</div>
			</div>

			<!-- Date de départ -->
			<div>
				<label class="block text-sm font-medium text-gray-700 mb-2">Date de départ</label>
				<div class="w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-900">
					<?= esc(date('d/m/Y', strtotime($prebuiltTrip['departuredate'] ?? $prebuiltTrip['departureDate'] ?? ''))) ?>
				</div>
			</div>

			<!-- Type -->
			<div>
				<label class="block text-sm font-medium text-gray-700 mb-2">Type de voyage</label>
				<div class="w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-900">
					<?php
					$typeLabels = [
						'individuel' => 'Individuel',
						'groupe' => 'Groupe',
						'famille' => 'Famille',
						'luxe' => 'Luxe',
						'aventure' => 'Aventure'
					];
					echo esc($typeLabels[$prebuiltTrip['type'] ?? ''] ?? ($prebuiltTrip['type'] ?? ''));
					?>
				</div>
			</div>

			<!-- Thématique -->
			<div>
				<label class="block text-sm font-medium text-gray-700 mb-2">Thématique</label>
				<div class="w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-900">
					<?= esc($prebuiltTrip['thematic'] ?? '') ?>
				</div>
			</div>

			<!-- Montant -->
			<div>
				<label class="block text-sm font-medium text-gray-700 mb-2">Prix (€)</label>
				<div class="w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-900">
					<?= esc($prebuiltTrip['amount'] ?? '') ?> €
				</div>
			</div>

			<!-- Description du programme -->
			<div class="md:col-span-2">
				<label class="block text-sm font-medium text-gray-700 mb-2">Description du programme</label>
				<div class="w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-900 min-h-[100px] flex flex-col justify-start">
					<div class="whitespace-pre-wrap text-left w-full">
						<?= esc($prebuiltTrip['programdesc'] ?? '') ?>
					</div>
				</div>
			</div>

			<!-- Description de l'hébergement -->
			<div class="md:col-span-2">
				<label class="block text-sm font-medium text-gray-700 mb-2">Description de l'hébergement</label>
				<div class="w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-900 min-h-[80px] flex flex-col justify-start">
					<div class="whitespace-pre-wrap text-left w-full">
						<?= esc($prebuiltTrip['hostingdesc'] ?? '') ?>
					</div>
				</div>
			</div>

			<!-- Conditions -->
			<div class="md:col-span-2">
				<label class="block text-sm font-medium text-gray-700 mb-2">Conditions générales</label>
				<div class="w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-900 min-h-[80px] flex flex-col justify-start">
					<div class="whitespace-pre-wrap text-left w-full">
						<?= esc($prebuiltTrip['conditiondesc'] ?? '') ?>
					</div>
				</div>
			</div>

			<!-- Formalités -->
			<div class="md:col-span-2">
				<label class="block text-sm font-medium text-gray-700 mb-2">Formalités</label>
				<div class="w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-900 min-h-[80px] flex flex-col justify-start">
					<div class="whitespace-pre-wrap text-left w-full">
						<?= esc($prebuiltTrip['formalitiesdesc'] ?? '') ?>
					</div>
				</div>
			</div>

			<!-- Pièce jointe -->
			<?php if (!empty($prebuiltTrip['attachment'])): ?>
				<div class="md:col-span-2">
					<label class="block text-sm font-medium text-gray-700 mb-2">Pièce jointe</label>
					<div class="flex items-center space-x-2 text-sm text-gray-600">
						<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/>
						</svg>
						<a href="<?= esc($prebuiltTrip['attachment']) ?>" target="_blank" class="text-blue-600 hover:underline">
							<?= esc(basename($prebuiltTrip['attachment'])) ?>
						</a>
					</div>
				</div>
			<?php endif; ?>

			<!-- Image -->
			<?php if (!empty($prebuiltTrip['image'])): ?>
				<div class="md:col-span-2">
					<label class="block text-sm font-medium text-gray-700 mb-2">Image du voyage</label>
					<div class="flex items-center space-x-4">
						<img src="<?= base_url($prebuiltTrip['image']) ?>" alt="Image du voyage" class="w-48 h-32 object-cover rounded-lg border border-gray-300">
					</div>
				</div>
			<?php endif; ?>

			<!-- Section Étapes du voyage -->
			<div class="md:col-span-2 border-t pt-6 mt-4">
				<h2 class="text-lg font-semibold text-gray-800 flex items-center mb-4">
					<svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
					</svg>
					Étapes du voyage
				</h2>

				<div class="space-y-4">
					<?php if (!empty($hosts)): ?>
						<?php foreach ($hosts as $index => $host): ?>
							<div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
								<div class="flex items-start gap-4">
									<div class="flex-shrink-0 w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center font-semibold text-sm">
										<?= $index + 1 ?>
									</div>
									<div class="flex-1 grid grid-cols-1 md:grid-cols-4 gap-4">
										<div>
											<label class="block text-sm font-medium text-gray-700 mb-1">Pays</label>
											<div class="w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-900">
												<?= esc($host['country'] ?? '') ?> (<?= esc($host['continent'] ?? '') ?>)
											</div>
										</div>
										<div>
											<label class="block text-sm font-medium text-gray-700 mb-1">Étape</label>
											<div class="w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-900">
												<?= esc($host['name'] ?? '') ?> (<?= esc($host['cost'] ?? '') ?>€)
											</div>
										</div>
										<div>
											<label class="block text-sm font-medium text-gray-700 mb-1">Nb jours</label>
											<div class="w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-900">
												<?= esc($host['nbDays'] ?? $host['nbdays'] ?? '') ?>
											</div>
										</div>
										<div>
											<label class="block text-sm font-medium text-gray-700 mb-1">Nb nuits</label>
											<div class="w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-lg text-gray-900">
												<?= esc($host['nbNights'] ?? $host['nbnights'] ?? '') ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					<?php else: ?>
						<p class="text-gray-500 text-sm italic py-4 text-center border-2 border-dashed border-gray-300 rounded-lg">
							Aucune étape définie pour ce voyage.
						</p>
					<?php endif; ?>
				</div>
			</div>

			<!-- Section Extensions -->
			<?php if (!empty($extensions)): ?>
			<div class="md:col-span-2 border-t pt-6 mt-4">
				<h2 class="text-lg font-semibold text-gray-800 flex items-center mb-4">
					<svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
					</svg>
					Extensions disponibles
				</h2>

				<div class="space-y-4">
					<?php foreach ($extensions as $extension): ?>
						<div class="bg-purple-50 rounded-lg p-4 border border-purple-200">
							<div class="flex items-start justify-between">
								<div class="flex-1">
									<h3 class="font-semibold text-purple-900 mb-2"><?= esc($extension['title']) ?></h3>
									<div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
										<div>
											<span class="text-gray-600">Prix supplémentaire:</span>
											<span class="ml-2 font-medium text-purple-900"><?= esc($extension['amount']) ?> €</span>
										</div>
										<?php if (!empty($extension['attachment'])): ?>
										<div>
											<span class="text-gray-600">Pièce jointe:</span>
											<a href="<?= base_url('uploads/' . $extension['attachment']) ?>" target="_blank" class="ml-2 text-purple-600 hover:text-purple-800 underline">Voir le fichier</a>
										</div>
										<?php endif; ?>
									</div>
								</div>
								<div class="flex items-center space-x-2 ml-4">
									<a href="<?= base_url('admin/prebuiltTrips/extension/edit/' . $extension['idTrip']) ?>" 
									   class="px-3 py-1 bg-purple-600 hover:bg-purple-700 text-white text-sm rounded transition">
										Modifier
									</a>
									<form action="<?= base_url('admin/prebuiltTrips/extension/delete/' . $extension['idTrip'] . '/' . $prebuiltTrip['idTrip']) ?>" method="POST" class="inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette extension ?')">
										<?= csrf_field() ?>
										<button type="submit" class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white text-sm rounded transition">
											Supprimer
										</button>
									</form>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<?php endif; ?>
		</div>

		<div class="mt-8 flex items-center justify-end space-x-4">
			<a href="<?= base_url('admin/prebuiltTrips') ?>"
			   class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
				Retour à la liste
			</a>
			<a href="<?= base_url('admin/prebuiltTrips/extension/add/' . $prebuiltTrip['idTrip']) ?>"
			   class="px-6 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg transition">
				Ajouter une extension
			</a>
			<a href="<?= base_url('admin/prebuiltTrips/edit/' . $prebuiltTrip['idTrip']) ?>"
			   class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition">
				Modifier
			</a>
		</div>
	</div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
	// No interactive functionality needed for view mode
</script>
<?= $this->endSection() ?>