<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>Ajouter une extension<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container mx-auto px-4 py-8">
	<div class="mb-8" style="margin-top:6rem;">
		<a href="<?= base_url('admin/prebuiltTrips/view/' . $prebuiltTrip['idTrip']) ?>" class="inline-flex items-center text-gray-600 hover:text-gray-800 mb-4">
			<svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
			</svg>
			Retour au voyage
		</a>
		<h1 class="text-3xl font-bold text-gray-800 mb-2">Ajouter une extension</h1>
		<p class="text-gray-600">Pour le voyage : <?= esc($prebuiltTrip['title']) ?></p>
	</div>

	<div class="bg-white rounded-lg shadow-md p-8">
		<form action="<?= base_url('admin/prebuiltTrips/extension/add/' . $prebuiltTrip['idTrip']) ?>" method="POST" enctype="multipart/form-data">
			<?= csrf_field() ?>

			<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
				<!-- Titre de l'extension -->
				<div class="md:col-span-2">
					<label for="title" class="block text-sm font-medium text-gray-700 mb-2">Titre de l'extension *</label>
					<input type="text" id="title" name="title" required
						   placeholder="Ex: Extension balnéaire à Bali, Visite de temples..."
						   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-purple-500">
				</div>

				<!-- Montant -->
				<div class="md:col-span-2">
					<label for="amount" class="block text-sm font-medium text-gray-700 mb-2">Prix de l'extension (€) *</label>
					<input type="number" id="amount" name="amount" min="0" step="0.01" required
						   placeholder="500"
						   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-purple-500">
					<p class="mt-1 text-sm text-gray-500">Ce prix s'ajoute au prix de base du voyage</p>
				</div>

				<!-- Pièce jointe -->
				<div class="md:col-span-2">
					<label for="attachment" class="block text-sm font-medium text-gray-700 mb-2">Pièce jointe (PDF, image...)</label>
					<input type="file" id="attachment" name="attachment"
						   accept=".pdf,.jpg,.jpeg,.png"
						   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-purple-500">
					<p class="mt-1 text-sm text-gray-500">Formats acceptés: PDF, JPG, PNG (max 5MB)</p>
				</div>
			</div>

			<!-- Info héritée -->
			<div class="mt-6 p-4 bg-purple-50 border border-purple-200 rounded-lg">
				<h3 class="font-semibold text-purple-900 mb-2">Informations héritées du voyage principal</h3>
				<div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
					<div>
						<span class="text-gray-600">Date de départ:</span>
						<span class="ml-2 font-medium text-gray-900"><?= date('d/m/Y', strtotime($prebuiltTrip['departureDate'])) ?></span>
					</div>
					<div>
						<span class="text-gray-600">Type:</span>
						<span class="ml-2 font-medium text-gray-900"><?= esc($prebuiltTrip['type']) ?></span>
					</div>
					<div>
						<span class="text-gray-600">Utilisateur:</span>
						<span class="ml-2 font-medium text-gray-900">ID #<?= $prebuiltTrip['idUser'] ?></span>
					</div>
				</div>
				<p class="mt-2 text-xs text-purple-700">Ces informations seront automatiquement appliquées à l'extension</p>
			</div>

			<div class="mt-8 flex items-center justify-end space-x-4">
				<a href="<?= base_url('admin/prebuiltTrips/list/' . $prebuiltTrip['idTrip']) ?>" 
				   class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
					Annuler
				</a>
				<button type="submit" 
						class="px-6 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg transition">
					Ajouter l'extension
				</button>
			</div>
		</form>
	</div>
</div>

<?= $this->endSection() ?>
