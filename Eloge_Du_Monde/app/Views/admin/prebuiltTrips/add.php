<?= $this->extend('layouts/default') ?>

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
	const countries = <?= json_encode($countries ?? [], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE) ?>;
	const tripSteps = <?= json_encode($tripSteps ?? [], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE) ?>;
	
	
	let stepCount = 0;

	document.getElementById('addStepBtn').addEventListener('click', function() {
		addStepRow();
	});

	function addStepRow() {
		stepCount++;
		const container = document.getElementById('stepsContainer');
		const noStepsMessage = document.getElementById('noStepsMessage');
		
		noStepsMessage.style.display = 'none';

		// Vérifier si countries est bien un tableau
		if (!Array.isArray(countries) || countries.length === 0) {
			console.error('Aucun pays disponible!');
			alert('Erreur: Aucun pays disponible dans la base de données.');
			return;
		}

		const countryOptions = countries.map(c => {
			const id = c.idCountry || c.idcountry;
			const name = c.name;
			const continent = c.continent;
			return `<option value="${id}">${name} (${continent})</option>`;
		}).join('');

		const stepHtml = `
			<div class="step-row bg-gray-50 rounded-lg p-4 border border-gray-200" data-step="${stepCount}">
				<div class="flex items-start gap-4">
					<div class="flex-shrink-0 w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center font-semibold text-sm step-badge">
						${stepCount}
					</div>
					<div class="flex-1 grid grid-cols-1 md:grid-cols-5 gap-4">
						<div class="md:col-span-1">
							<label class="block text-sm font-medium text-gray-700 mb-1">Pays <span class="text-red-500">*</span></label>
							<select name="steps[${stepCount}][idCountry]" required
									class="country-select w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
									onchange="updateStepOptions(this, ${stepCount})">
								<option value="">Sélectionner un pays</option>
								${countryOptions}
							</select>
						</div>
						<div class="md:col-span-2">
							<label class="block text-sm font-medium text-gray-700 mb-1">Étape <span class="text-red-500">*</span></label>
							<select name="steps[${stepCount}][idTripStep]" required
									class="step-select w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
									id="stepSelect_${stepCount}" disabled>
								<option value="">Sélectionner d'abord un pays</option>
							</select>
						</div>
						<div>
							<label class="block text-sm font-medium text-gray-700 mb-1">Nb jours <span class="text-red-500">*</span></label>
							<input type="number" name="steps[${stepCount}][nbDays]" min="1" value="1" required
								   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
						</div>
						<div>
							<label class="block text-sm font-medium text-gray-700 mb-1">Nb nuits <span class="text-red-500">*</span></label>
							<input type="number" name="steps[${stepCount}][nbNights]" min="0" value="1" required
								   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
						</div>
					</div>
					<button type="button" onclick="removeStep(this)" 
							class="flex-shrink-0 p-2 text-red-500 hover:text-red-700 hover:bg-red-50 rounded-lg transition">
						<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
						</svg>
					</button>
				</div>
			</div>
		`;

		container.insertAdjacentHTML('beforeend', stepHtml);
	}

	function updateStepOptions(countrySelect, stepNumber) {
		const idCountry = countrySelect.value;
		const stepSelect = document.getElementById(`stepSelect_${stepNumber}`);
		
		stepSelect.innerHTML = '<option value="">Sélectionner une étape</option>';
		
		if (!idCountry) {
			stepSelect.disabled = true;
			stepSelect.innerHTML = '<option value="">Sélectionner d\'abord un pays</option>';
			return;
		}

		// Filtrer les étapes par pays (gérer les deux cas de casse)
		const filteredSteps = tripSteps.filter(step => {
			const stepCountryId = step.idCountry || step.idcountry;
			return stepCountryId == idCountry;
		});
		
		console.log('Filtering steps for country:', idCountry, 'Found:', filteredSteps.length);

		if (filteredSteps.length === 0) {
			stepSelect.innerHTML = '<option value="">Aucune étape disponible pour ce pays</option>';
			stepSelect.disabled = true;
			return;
		}

		filteredSteps.forEach(step => {
			const option = document.createElement('option');
			option.value = step.idTripStep || step.idtripstep;
			option.textContent = `${step.name} (${step.cost}€)`;
			stepSelect.appendChild(option);
		});

		stepSelect.disabled = false;
	}

	function removeStep(button) {
		const stepRow = button.closest('.step-row');
		stepRow.remove();

		const steps = document.querySelectorAll('.step-row');
		if (steps.length === 0) {
			document.getElementById('noStepsMessage').style.display = 'block';
		}

		steps.forEach((step, index) => {
			const badge = step.querySelector('.step-badge');
			if (badge) {
				badge.textContent = index + 1;
			}
		});
	}
</script>
<?= $this->endSection() ?>
