// Create Trip Page JavaScript

// Destinations data by continent
const destinationsData = {
	asie: {
		Japon: ['Tokyo', 'Kyoto', 'Osaka', 'Hiroshima', 'Nara'],
		Chine: ['Pékin', 'Shanghai', 'Xi\'an', 'Guilin', 'Chengdu'],
		Thaïlande: ['Bangkok', 'Phuket', 'Chiang Mai', 'Krabi', 'Koh Samui'],
		Vietnam: ['Hanoi', 'Ho Chi Minh', 'Hoi An', 'Hue', 'Sapa'],
		Inde: ['Delhi', 'Agra', 'Jaipur', 'Mumbai', 'Goa'],
		'Indonésie': ['Bali', 'Jakarta', 'Yogyakarta', 'Lombok', 'Sumatra']
	},
	europe: {
		France: ['Paris', 'Lyon', 'Marseille', 'Bordeaux', 'Nice'],
		Italie: ['Rome', 'Florence', 'Venise', 'Milan', 'Naples'],
		Espagne: ['Madrid', 'Barcelone', 'Séville', 'Valence', 'Grenade'],
		Grèce: ['Athènes', 'Santorin', 'Mykonos', 'Rhodes', 'Crète'],
		Portugal: ['Lisbonne', 'Porto', 'Algarve', 'Madère', 'Açores'],
		'Royaume-Uni': ['Londres', 'Édimbourg', 'Manchester', 'Oxford', 'Brighton']
	},
	afrique: {
		Maroc: ['Marrakech', 'Casablanca', 'Fès', 'Rabat', 'Tanger'],
		Égypte: ['Le Caire', 'Louxor', 'Assouan', 'Alexandrie', 'Hurghada'],
		'Afrique du Sud': ['Le Cap', 'Johannesburg', 'Durban', 'Pretoria', 'Kruger'],
		Kenya: ['Nairobi', 'Mombasa', 'Masai Mara', 'Amboseli', 'Nakuru'],
		Tanzanie: ['Dar es Salaam', 'Zanzibar', 'Serengeti', 'Kilimandjaro', 'Arusha'],
		Tunisie: ['Tunis', 'Djerba', 'Sousse', 'Hammamet', 'Carthage']
	},
	amerique: {
		'États-Unis': ['New York', 'Los Angeles', 'San Francisco', 'Miami', 'Las Vegas'],
		Canada: ['Toronto', 'Vancouver', 'Montréal', 'Québec', 'Calgary'],
		Mexique: ['Cancún', 'Mexico', 'Playa del Carmen', 'Tulum', 'Puerto Vallarta'],
		Brésil: ['Rio de Janeiro', 'São Paulo', 'Salvador', 'Brasilia', 'Florianópolis'],
		Argentine: ['Buenos Aires', 'Mendoza', 'Patagonie', 'Ushuaia', 'Salta'],
		Pérou: ['Lima', 'Cusco', 'Machu Picchu', 'Arequipa', 'Nazca']
	},
	oceanie: {
		Australie: ['Sydney', 'Melbourne', 'Brisbane', 'Perth', 'Cairns'],
		'Nouvelle-Zélande': ['Auckland', 'Wellington', 'Queenstown', 'Christchurch', 'Rotorua'],
		'Polynésie française': ['Tahiti', 'Bora Bora', 'Moorea', 'Rangiroa', 'Huahine'],
		Fidji: ['Nadi', 'Suva', 'Denarau', 'Coral Coast', 'Yasawa']
	}
};

// Store selected destinations
let selectedDestinations = [];

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
	console.log('Create Trip JS loaded');
	
	// Setup continent selector
	const continentSelect = document.getElementById('continent');
	const paysSelect = document.getElementById('pays');
	const destinationSelect = document.getElementById('destination');
	
	console.log('Elements found:', {
		continent: continentSelect,
		pays: paysSelect,
		destination: destinationSelect
	});
	
	if (continentSelect) {
		continentSelect.addEventListener('change', function() {
			console.log('Continent changed to:', this.value);
			onContinentChange();
		});
	}

	// Setup country selector
	if (paysSelect) {
		paysSelect.addEventListener('change', function() {
			console.log('Pays changed to:', this.value);
			onPaysChange();
		});
	}

	// Initialize page animations
	animateHero();
});

// Handle continent change
function onContinentChange() {
	const continent = document.getElementById('continent').value;
	const paysSelect = document.getElementById('pays');
	const destinationSelect = document.getElementById('destination');

	console.log('onContinentChange called with:', continent);
	console.log('Available data for continent:', destinationsData[continent]);

	// Reset country and destination
	paysSelect.innerHTML = '<option value="">Sélectionner un pays</option>';
	destinationSelect.innerHTML = '<option value="">Sélectionner un pays d\'abord</option>';

	if (continent && destinationsData[continent]) {
		const countries = Object.keys(destinationsData[continent]);
		console.log('Countries found:', countries);
		
		countries.forEach(country => {
			const option = document.createElement('option');
			option.value = country;
			option.textContent = country;
			paysSelect.appendChild(option);
		});
		
		console.log('Pays select updated with', countries.length, 'countries');
	}
}

// Handle country change
function onPaysChange() {
	const continent = document.getElementById('continent').value;
	const pays = document.getElementById('pays').value;
	const destinationSelect = document.getElementById('destination');

	// Reset destination
	destinationSelect.innerHTML = '<option value="">Sélectionner une destination</option>';

	if (pays && destinationsData[continent] && destinationsData[continent][pays]) {
		const destinations = destinationsData[continent][pays];
		destinations.forEach(dest => {
			const option = document.createElement('option');
			option.value = dest;
			option.textContent = dest;
			destinationSelect.appendChild(option);
		});
	}
}

// Add destination to itinerary
function addDestination() {
	const continent = document.getElementById('continent').value;
	const pays = document.getElementById('pays').value;
	const destination = document.getElementById('destination').value;

	if (!continent || !pays || !destination) {
		alert('Veuillez sélectionner un continent, un pays et une destination');
		return;
	}

	// Check if already added
	const exists = selectedDestinations.some(d => 
		d.destination === destination && d.pays === pays
	);

	if (exists) {
		alert('Cette destination est déjà dans votre itinéraire');
		return;
	}

	// Add to array
	const newDest = {
		continent: continent,
		pays: pays,
		destination: destination,
		nights: 3
	};

	selectedDestinations.push(newDest);
	updateDestinationsList();
	updateSummary();

	// Reset form
	document.getElementById('continent').value = '';
	document.getElementById('pays').innerHTML = '<option value="">Sélectionner un continent d\'abord</option>';
	document.getElementById('destination').innerHTML = '<option value="">Sélectionner un pays d\'abord</option>';
}

// Update destinations list display
function updateDestinationsList() {
	const listContainer = document.getElementById('destinationsList');
	
	if (selectedDestinations.length === 0) {
		listContainer.innerHTML = `
			<div class="empty-state">
				<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
					<path d="M12 22s-8-4.5-8-11.8A8 8 0 0 1 12 2a8 8 0 0 1 8 8.2c0 7.3-8 11.8-8 11.8z"></path>
					<circle cx="12" cy="10" r="3"></circle>
				</svg>
				<p>Aucune destination sélectionnée</p>
				<span>Commencez par ajouter une destination à votre itinéraire</span>
			</div>
		`;
		return;
	}

	listContainer.innerHTML = selectedDestinations.map((dest, index) => `
		<div class="destination-card">
			<div class="destination-header">
				<div class="destination-main">
					<div class="destination-number">${index + 1}</div>
					<div class="destination-info">
						<h3 class="destination-name">${dest.destination}</h3>
						<p class="destination-country">${dest.pays}</p>
						<span class="continent-badge">${getContinentLabel(dest.continent)}</span>
					</div>
				</div>
				<button class="btn-delete" onclick="removeDestination(${index})" title="Supprimer">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
						<line x1="18" y1="6" x2="6" y2="18"></line>
						<line x1="6" y1="6" x2="18" y2="18"></line>
					</svg>
				</button>
			</div>
			<div class="nights-control">
				<label>Nombre de nuits :</label>
				<div class="nights-input-group">
					<button class="btn-nights" onclick="changeNights(${index}, -1)">−</button>
					<div class="nights-display">${dest.nights}</div>
					<button class="btn-nights" onclick="changeNights(${index}, 1)">+</button>
				</div>
			</div>
		</div>
	`).join('');
}

// Get continent label in French
function getContinentLabel(continent) {
	const labels = {
		'asie': 'Asie',
		'europe': 'Europe',
		'afrique': 'Afrique',
		'amerique': 'Amérique',
		'oceanie': 'Océanie'
	};
	return labels[continent] || continent;
}

// Change number of nights
function changeNights(index, delta) {
	if (selectedDestinations[index]) {
		const newValue = selectedDestinations[index].nights + delta;
		if (newValue >= 1 && newValue <= 30) {
			selectedDestinations[index].nights = newValue;
			updateDestinationsList();
			updateSummary();
		}
	}
}

// Remove destination
function removeDestination(index) {
	if (confirm('Êtes-vous sûr de vouloir retirer cette destination ?')) {
		selectedDestinations.splice(index, 1);
		updateDestinationsList();
		updateSummary();
	}
}

// Update summary
function updateSummary() {
	const totalDestinations = selectedDestinations.length;
	const totalNights = selectedDestinations.reduce((sum, dest) => sum + dest.nights, 0);
	const totalDays = totalNights > 0 ? totalNights + 1 : 0;

	document.getElementById('totalDestinations').textContent = totalDestinations;
	document.getElementById('totalNights').textContent = totalNights;
	document.getElementById('totalDays').textContent = totalDays;

	// Enable/disable reserve button
	const reserveBtn = document.getElementById('reserveBtn');
	if (reserveBtn) {
		reserveBtn.disabled = totalDestinations === 0;
	}
}

// Reserve trip
function reserveTrip() {
	if (selectedDestinations.length === 0) {
		alert('Veuillez ajouter au moins une destination');
		return;
	}

	// Calculate estimated price (example: 500€ per night)
	const tripData = {
		destinations: selectedDestinations,
		totalNights: selectedDestinations.reduce((sum, dest) => sum + dest.nights, 0)
	};
	
	const estimatedPrice = tripData.totalNights * 500;

	// Show payment form
	const builderContainer = document.querySelector('.builder-container');
	if (builderContainer) {
		builderContainer.innerHTML = `
			<div class="payment-container" style="max-width: 600px; margin: 0 auto; padding: 40px 20px;">
				<div style="text-align: center; margin-bottom: 32px;">
					<h2 class="playfair" style="font-size: 32px; color: #1a1a1a; margin-bottom: 16px;">Finaliser votre réservation</h2>
					<p style="font-size: 16px; color: #6b7280; margin-bottom: 24px;">
						${selectedDestinations.length} destination${selectedDestinations.length > 1 ? 's' : ''} • ${tripData.totalNights} nuits
					</p>
					<div style="background: #f5f1ea; padding: 16px; border-radius: 12px; display: inline-block;">
						<div style="font-size: 14px; color: #6b7280; margin-bottom: 4px;">Montant total estimé</div>
						<div style="font-size: 36px; font-weight: 700; color: #C9A96E;">${estimatedPrice.toLocaleString('fr-FR')} €</div>
					</div>
				</div>

				<form id="paymentForm" style="background: white; border: 1px solid #e5e7eb; border-radius: 12px; padding: 32px;">
					<h3 style="font-size: 18px; font-weight: 700; color: #1a1a1a; margin-bottom: 24px;">Informations de paiement</h3>
					
					<div style="margin-bottom: 20px;">
						<label style="display: block; font-size: 14px; font-weight: 600; color: #1a1a1a; margin-bottom: 8px;">Numéro de carte</label>
						<input type="text" id="cardNumber" placeholder="1234 5678 9012 3456" maxlength="19" 
							style="width: 100%; padding: 12px 16px; border: 1px solid #e5e7eb; border-radius: 8px; font-size: 14px; font-family: 'Inter', monospace;"
							required>
					</div>

					<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 20px;">
						<div>
							<label style="display: block; font-size: 14px; font-weight: 600; color: #1a1a1a; margin-bottom: 8px;">Date d'expiration</label>
							<input type="text" id="cardExpiry" placeholder="MM/AA" maxlength="5"
								style="width: 100%; padding: 12px 16px; border: 1px solid #e5e7eb; border-radius: 8px; font-size: 14px; font-family: 'Inter', monospace;"
								required>
						</div>
						<div>
							<label style="display: block; font-size: 14px; font-weight: 600; color: #1a1a1a; margin-bottom: 8px;">CVV</label>
							<input type="text" id="cardCvv" placeholder="123" maxlength="3"
								style="width: 100%; padding: 12px 16px; border: 1px solid #e5e7eb; border-radius: 8px; font-size: 14px; font-family: 'Inter', monospace;"
								required>
						</div>
					</div>

					<div style="margin-bottom: 24px;">
						<label style="display: block; font-size: 14px; font-weight: 600; color: #1a1a1a; margin-bottom: 8px;">Nom sur la carte</label>
						<input type="text" id="cardName" placeholder="Jean Dupont"
							style="width: 100%; padding: 12px 16px; border: 1px solid #e5e7eb; border-radius: 8px; font-size: 14px; font-family: 'Inter', sans-serif;"
							required>
					</div>

					<div style="background: #f0f9ff; border: 1px solid #bae6fd; border-radius: 8px; padding: 12px; margin-bottom: 24px; display: flex; gap: 12px; align-items: start;">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#0284c7" stroke-width="2" style="flex-shrink: 0; margin-top: 2px;">
							<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
						</svg>
						<p style="font-size: 13px; color: #0c4a6e; margin: 0; line-height: 1.5;">
							<strong>Paiement sécurisé</strong><br>
							Cette transaction est une simulation. Aucun paiement réel ne sera effectué.
						</p>
					</div>

					<button type="submit" class="btn btn-add" style="width: 100%; background: #C9A96E; color: white; padding: 14px; border: none; border-radius: 8px; font-size: 16px; font-weight: 600; cursor: pointer; transition: all 0.3s ease;">
						Confirmer le paiement
					</button>

					<button type="button" onclick="location.reload()" style="width: 100%; margin-top: 12px; background: transparent; color: #6b7280; padding: 12px; border: 1px solid #e5e7eb; border-radius: 8px; font-size: 14px; font-weight: 500; cursor: pointer; transition: all 0.3s ease;">
						Annuler
					</button>
				</form>
			</div>
		`;

		// Format card number with spaces
		const cardNumberInput = document.getElementById('cardNumber');
		cardNumberInput.addEventListener('input', function(e) {
			let value = e.target.value.replace(/\s/g, '');
			value = value.replace(/\D/g, '');
			value = value.replace(/(\d{4})/g, '$1 ').trim();
			e.target.value = value;
		});

		// Format expiry date
		const cardExpiryInput = document.getElementById('cardExpiry');
		cardExpiryInput.addEventListener('input', function(e) {
			let value = e.target.value.replace(/\D/g, '');
			if (value.length >= 2) {
				value = value.substring(0, 2) + '/' + value.substring(2, 4);
			}
			e.target.value = value;
		});

		// Only allow numbers for CVV
		const cardCvvInput = document.getElementById('cardCvv');
		cardCvvInput.addEventListener('input', function(e) {
			e.target.value = e.target.value.replace(/\D/g, '');
		});

		// Handle form submission
		const paymentForm = document.getElementById('paymentForm');
		paymentForm.addEventListener('submit', function(e) {
			e.preventDefault();
			
			// Simulate payment processing
			const submitBtn = paymentForm.querySelector('button[type="submit"]');
			submitBtn.disabled = true;
			submitBtn.innerHTML = `
				<svg style="animation: spin 1s linear infinite; display: inline-block;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
					<line x1="12" y1="2" x2="12" y2="6"></line>
					<line x1="12" y1="18" x2="12" y2="22"></line>
					<line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line>
					<line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line>
					<line x1="2" y1="12" x2="6" y2="12"></line>
					<line x1="18" y1="12" x2="22" y2="12"></line>
					<line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line>
					<line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line>
				</svg>
				<span style="margin-left: 8px;">Traitement en cours...</span>
			`;

			// Show success after 2 seconds
			setTimeout(() => {
				showPaymentSuccess(tripData, estimatedPrice);
			}, 2000);
		});

		window.scrollTo({
			top: 0,
			behavior: 'smooth'
		});
	}
}

// Show payment success
function showPaymentSuccess(tripData, price) {
	const builderContainer = document.querySelector('.builder-container');
	if (builderContainer) {
		builderContainer.innerHTML = `
			<div class="success-message" style="text-align: center; padding: 80px 40px; max-width: 600px; margin: 0 auto;">
				<div style="width: 80px; height: 80px; margin: 0 auto 24px; border-radius: 50%; background: rgba(16, 185, 129, 0.1); display: flex; align-items: center; justify-content: center; border: 2px solid #10b981;">
					<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2">
						<polyline points="20 6 9 17 4 12"></polyline>
					</svg>
				</div>
				<h2 class="playfair" style="font-size: 32px; color: #1a1a1a; margin-bottom: 16px;">Paiement confirmé !</h2>
				<p style="font-size: 16px; color: #6b7280; line-height: 1.6; margin-bottom: 32px;">
					Votre réservation a été validée. Un email de confirmation vous a été envoyé avec tous les détails de votre voyage.
				</p>
				<div style="background: #f9fafb; padding: 24px; border-radius: 12px; margin-bottom: 32px; text-align: left;">
					<h3 style="font-size: 18px; font-weight: 700; color: #1a1a1a; margin-bottom: 16px;">Résumé de votre réservation</h3>
					<div style="display: flex; justify-content: space-between; padding: 12px 0; border-bottom: 1px solid #e5e7eb;">
						<span style="color: #6b7280;">Destinations</span>
						<strong>${selectedDestinations.length}</strong>
					</div>
					<div style="display: flex; justify-content: space-between; padding: 12px 0; border-bottom: 1px solid #e5e7eb;">
						<span style="color: #6b7280;">Durée totale</span>
						<strong>${tripData.totalNights} nuits / ${tripData.totalNights + 1} jours</strong>
					</div>
					<div style="display: flex; justify-content: space-between; padding: 12px 0;">
						<span style="color: #6b7280;">Montant payé</span>
						<strong style="color: #C9A96E;">${price.toLocaleString('fr-FR')} €</strong>
					</div>
				</div>
				<a href="${window.location.origin}" class="btn btn-add" style="display: inline-flex;">Retour à l'accueil</a>
			</div>
		`;

		// Add CSS animation for spinner
		const style = document.createElement('style');
		style.textContent = `
			@keyframes spin {
				from { transform: rotate(0deg); }
				to { transform: rotate(360deg); }
			}
		`;
		document.head.appendChild(style);

		window.scrollTo({
			top: 0,
			behavior: 'smooth'
		});
	}
}

// Animate hero section
function animateHero() {
	const heroContent = document.querySelector('.hero-content');
	if (heroContent) {
		heroContent.style.opacity = '0';
		heroContent.style.transform = 'translateY(20px)';
		
		setTimeout(() => {
			heroContent.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
			heroContent.style.opacity = '1';
			heroContent.style.transform = 'translateY(0)';
		}, 100);
	}
}
