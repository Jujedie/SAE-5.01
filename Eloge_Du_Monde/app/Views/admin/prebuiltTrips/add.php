<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>Créer un voyage préfait<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container mx-auto px-4 py-8">
	<div class="mb-8" style="margin-top:6rem;">
		<a href="<?= base_url('admin/prebuiltTrips') ?>" class="inline-flex items-center text-gray-600 hover:text-gray-800 mb-4">
			<svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
			</svg>
			Retour à la liste
		</a>
		<h1 class="text-3xl font-bold text-gray-800 mb-2">Créer un voyage préfait</h1>
		<p class="text-gray-600">Remplissez les informations du nouveau voyage préfait</p>
	</div>

	<div class="bg-white rounded-lg shadow-md p-8">
		<form action="<?= base_url('admin/prebuiltTrips/add') ?>" method="POST" enctype="multipart/form-data">
			<?= csrf_field() ?>

			<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
				<!-- Titre -->
				<div class="md:col-span-2">
					<label for="title" class="block text-sm font-medium text-gray-700 mb-2">Titre du voyage *</label>
					<input type="text" id="title" name="title" required
						   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
				</div>

				<!-- Date de départ -->
				<div>
					<label for="departureDate" class="block text-sm font-medium text-gray-700 mb-2">Date de départ *</label>
					<input type="date" id="departureDate" name="departureDate" required
						   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
				</div>

				<!-- Type -->
				<div>
					<label for="type" class="block text-sm font-medium text-gray-700 mb-2">Type de voyage *</label>
					<select id="type" name="type" required
							class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
						<option value="">Sélectionner un type</option>
						<option value="individuel">Individuel</option>
						<option value="groupe">Groupe</option>
						<option value="famille">Famille</option>
						<option value="luxe">Luxe</option>
						<option value="aventure">Aventure</option>
					</select>
				</div>

				<!-- Thématique -->
				<div>
					<label for="thematic" class="block text-sm font-medium text-gray-700 mb-2">Thématique</label>
					<input type="text" id="thematic" name="thematic"
						   placeholder="Ex: Culture, Nature, Plage..."
						   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
				</div>

				<!-- Montant -->
				<div>
					<label for="amount" class="block text-sm font-medium text-gray-700 mb-2">Prix (€) *</label>
					<input type="number" id="amount" name="amount" min="0" step="0.01" required
						   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
				</div>

				<!-- Description du programme -->
				<div class="md:col-span-2">
					<label for="programdesc" class="block text-sm font-medium text-gray-700 mb-2">Description du programme</label>
					<textarea id="programdesc" name="programdesc" rows="4"
							  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
							  placeholder="Décrivez le programme jour par jour..."></textarea>
				</div>

				<!-- Description de l'hébergement -->
				<div class="md:col-span-2">
					<label for="hostingdesc" class="block text-sm font-medium text-gray-700 mb-2">Description de l'hébergement</label>
					<textarea id="hostingdesc" name="hostingdesc" rows="3"
							  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
							  placeholder="Décrivez les hébergements inclus..."></textarea>
				</div>

				<!-- Conditions -->
				<div class="md:col-span-2">
					<label for="conditiondesc" class="block text-sm font-medium text-gray-700 mb-2">Conditions générales</label>
					<textarea id="conditiondesc" name="conditiondesc" rows="3"
							  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
							  placeholder="Conditions d'annulation, paiement..."></textarea>
				</div>

				<!-- Formalités -->
				<div class="md:col-span-2">
					<label for="formalitiesdesc" class="block text-sm font-medium text-gray-700 mb-2">Formalités</label>
					<textarea id="formalitiesdesc" name="formalitiesdesc" rows="3"
							  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
							  placeholder="Visa, passeport, vaccins..."></textarea>
				</div>

				<!-- Pièce jointe -->
				<div class="md:col-span-2">
					<label for="attachment" class="block text-sm font-medium text-gray-700 mb-2">Pièce jointe (PDF, image...)</label>
					<input type="file" id="attachment" name="attachment"
						   accept=".pdf,.jpg,.jpeg,.png"
						   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
					<p class="mt-1 text-sm text-gray-500">Formats acceptés: PDF, JPG, PNG (max 5MB)</p>
				</div>
			</div>

			<div class="mt-8 flex items-center justify-end space-x-4">
				<a href="<?= base_url('admin/prebuiltTrips') ?>" 
				   class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
					Annuler
				</a>
				<button type="submit" 
						class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition">
					Créer le voyage préfait
				</button>
			</div>
		</form>
	</div>
</div>

<?= $this->endSection() ?>
