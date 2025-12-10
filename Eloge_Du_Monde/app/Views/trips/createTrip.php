<?= $this->extend('layouts/default') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/trips/createTrip.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="create-trip-hero">
	<div class="create-trip-hero-overlay">
		<div class="create-trip-hero-decoration top-left"></div>
		<div class="create-trip-hero-decoration bottom-right"></div>
	</div>
	
	<div class="create-trip-hero-content" style="margin-top: 5rem;">
		<div class="create-trip-badge">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
				<path d="M12 22s-8-4.5-8-11.8A8 8 0 0 1 12 2a8 8 0 0 1 8 8.2c0 7.3-8 11.8-8 11.8z"></path>
				<circle cx="12" cy="10" r="3"></circle>
			</svg>
			<span>CRÉATEUR DE VOYAGE</span>
		</div>
		
		<h1 class="create-trip-hero-title playfair">Créez votre voyage sur mesure</h1>
		
		<p class="create-trip-hero-description">
			Sélectionnez vos destinations et composez l'itinéraire de vos rêves
		</p>
	</div>
</section>

<!-- Main Section -->
<section class="create-trip-builder">
	<div class="builder-container">
		<div class="builder-grid">
			<!-- Left Panel: Add Destination -->
			<div class="add-destination-panel">
				<div class="panel-header">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
						<path d="M12 22s-8-4.5-8-11.8A8 8 0 0 1 12 2a8 8 0 0 1 8 8.2c0 7.3-8 11.8-8 11.8z"></path>
						<circle cx="12" cy="10" r="3"></circle>
					</svg>
					<h2 class="panel-title">Ajouter une destination</h2>
				</div>

				<div class="destination-form">
					<div class="form-group">
						<label for="continent" class="form-label">Continent</label>
						<select id="continent" class="form-control">
							<option value="">Sélectionner</option>
							<!-- Les continents seront chargés dynamiquement depuis la base de données -->
						</select>
					</div>

					<div class="form-group">
						<label for="pays" class="form-label">Pays</label>
						<select id="pays" class="form-control">
							<option value="">Sélectionner un continent d'abord</option>
						</select>
					</div>

					<div class="form-group">
						<label for="destination" class="form-label">Destination</label>
						<select id="destination" class="form-control">
							<option value="">Sélectionner un pays d'abord</option>
						</select>
					</div>

					<button type="button" class="btn btn-add" onclick="addDestination()">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
							<line x1="12" y1="5" x2="12" y2="19"></line>
							<line x1="5" y1="12" x2="19" y2="12"></line>
						</svg>
						Ajouter à mon itinéraire
					</button>
				</div>

				<div class="panel-header" style="margin-top: 2rem;">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
						<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
						<line x1="16" y1="2" x2="16" y2="6"></line>
						<line x1="8" y1="2" x2="8" y2="6"></line>
						<line x1="3" y1="10" x2="21" y2="10"></line>
					</svg>
					<h2 class="panel-title">Date de départ</h2>
				</div>

				<div class="destination-form">
					<div class="form-group">
						<label for="departureDate" class="form-label">Date de départ</label>
						<input type="date" id="departureDate" class="form-control" min="<?= date('Y-m-d', strtotime('+1 day')) ?>" value="<?= date('Y-m-d', strtotime('+7 days')) ?>">
					</div>

					<div id="endDateInfo" class="info-box" style="display: none; background: #f0f9ff; border-left: 4px solid #3b82f6;">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
							<circle cx="12" cy="12" r="10"></circle>
							<polyline points="12 6 12 12 16 14"></polyline>
						</svg>
						<p id="endDateText">La date de retour sera calculée automatiquement en fonction du nombre de nuits total</p>
					</div>
				</div>

			<div class="info-box">
				<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
					<path d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
				</svg>
				<p>Conseil : Sélectionnez plusieurs destinations pour créer un circuit sur mesure. Vous pourrez définir le nombre de nuits pour chaque étape.</p>
			</div>
			</div>

			<!-- Right Panel: Itinerary -->
			<div class="itinerary-panel">
				<div class="panel-header">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
						<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
						<line x1="16" y1="2" x2="16" y2="6"></line>
						<line x1="8" y1="2" x2="8" y2="6"></line>
						<line x1="3" y1="10" x2="21" y2="10"></line>
					</svg>
					<h2 class="panel-title">Votre itinéraire</h2>
				</div>

				<div id="destinationsList" class="destinations-list">
					<!-- Empty state -->
					<div class="empty-state">
						<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
							<path d="M12 22s-8-4.5-8-11.8A8 8 0 0 1 12 2a8 8 0 0 1 8 8.2c0 7.3-8 11.8-8 11.8z"></path>
							<circle cx="12" cy="10" r="3"></circle>
						</svg>
						<p>Aucune destination sélectionnée</p>
						<span>Commencez par ajouter une destination à votre itinéraire</span>
					</div>
				</div>

				<div class="itinerary-summary">
					<div class="summary-row">
						<span>Destinations :</span>
						<strong id="totalDestinations">0</strong>
					</div>
					<div class="summary-row">
						<span>Nuits totales :</span>
						<strong id="totalNights">0</strong>
					</div>
					<div class="summary-row">
						<span>Jours totaux :</span>
						<strong id="totalDays">0</strong>
					</div>
				</div>

				<button type="button" class="btn btn-reserve" onclick="reserveTrip()" disabled id="reserveBtn">
					Réserver ce voyage
				</button>
			</div>
		</div>
	</div>
</section>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="<?= base_url('assets/js/trips/createTrip.js') ?>"></script>
<?= $this->endSection() ?>