// Données globales
let countries = [];
let tripSteps = [];
let stepCount = 0;

// Fonction d'initialisation des données
function initPrebuiltTripData(countriesData, tripStepsData) {
	countries = countriesData;
	tripSteps = tripStepsData;
}

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
