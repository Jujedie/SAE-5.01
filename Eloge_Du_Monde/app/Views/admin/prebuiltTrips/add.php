<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>Créer un voyage préfait<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/admin/common.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/admin/prebuiltTrips/add.css') ?>">
<?= $this->endSection() ?>

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
					<label for="title" class="block text-sm font-medium text-gray-700 mb-2">Titre du voyage <span class="text-red-500">*</span></label>
					<input type="text" id="title" name="title" required
						   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
				</div>

				<!-- Date de départ -->
				<div>
					<label for="departureDate" class="block text-sm font-medium text-gray-700 mb-2">Date de départ <span class="text-red-500">*</span></label>
					<input type="date" id="departureDate" name="departureDate" required
						   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
				</div>

				<!-- Type -->
				<div>
					<label for="type" class="block text-sm font-medium text-gray-700 mb-2">Type de voyage <span class="text-red-500">*</span></label>
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
					<select id="thematic" name="thematic"
							class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
						<option value="">Sélectionner une thématique</option>
						<option value="Bien-être & Spa">Bien-être & Spa</option>
						<option value="Aventure & Nature">Aventure & Nature</option>
						<option value="Gastronomie">Gastronomie</option>
						<option value="Culture & Art">Culture & Art</option>
					</select>
				</div>	

				<!-- Montant -->
				<div>
					<label for="amount" class="block text-sm font-medium text-gray-700 mb-2">Prix (€) <span class="text-red-500">*</span></label>
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
						   accept=".pdf"
						   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
					<p class="mt-1 text-sm text-gray-500">Formats acceptés: PDF (max 5MB)</p>
				</div>

				<!-- Image -->
				<div class="md:col-span-2">
					<label for="image" class="block text-sm font-medium text-gray-700 mb-2">Image du voyage</label>
					<input type="file" id="image" name="image"
						   accept=".jpg,.jpeg,.png"
						   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
					<p class="mt-1 text-sm text-gray-500">Formats acceptés: JPG, PNG (max 5MB)</p>
				</div>

				<!-- Section Étapes du voyage -->
				<div class="md:col-span-2 border-t pt-6 mt-4">
					<div class="flex items-center justify-between mb-4">
						<h2 class="text-lg font-semibold text-gray-800 flex items-center">
							<svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
							</svg>
							Étapes du voyage
						</h2>
						<button type="button" id="addStepBtn"
								class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm rounded-lg transition">
							<svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
							</svg>
							Ajouter une étape
						</button>
					</div>

					<div id="stepsContainer" class="space-y-4">
						<!-- Les étapes seront ajoutées ici dynamiquement -->
					</div>

					<p id="noStepsMessage" class="text-gray-500 text-sm italic py-4 text-center border-2 border-dashed border-gray-300 rounded-lg">
						Aucune étape ajoutée. Cliquez sur "Ajouter une étape" pour commencer.
					</p>
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

<?= $this->section('scripts') ?>
<script>
	// Données chargées depuis le serveur
	const countriesData = <?= json_encode($countries ?? [], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE) ?>;
	const tripStepsData = <?= json_encode($tripSteps ?? [], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE) ?>;
</script>
<script src="<?= base_url('assets/js/admin/prebuiltTrips/add.js') ?>"></script>
<script>
	// Initialiser les données
	initPrebuiltTripData(countriesData, tripStepsData);
</script>
<?= $this->endSection() ?>
