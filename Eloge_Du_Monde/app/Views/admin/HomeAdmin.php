<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>Tableau de bord administrateur<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<style>
	.stat-card {
		transition: all 0.3s ease;
		cursor: pointer;
	}
	.stat-card:hover {
		transform: translateY(-5px);
		box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
	}
	.icon-wrapper {
		width: 64px;
		height: 64px;
		display: flex;
		align-items: center;
		justify-content: center;
		border-radius: 12px;
	}
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container mx-auto px-4 py-8" style="margin-top:6rem;">
	<!-- Header -->
	<div class="mb-8">
		<h1 class="text-3xl font-bold text-gray-800 mb-2">Tableau de bord administrateur</h1>
		<p class="text-gray-600">Vue d'ensemble des statistiques et gestion du contenu du site Éloge du Monde</p>
	</div>

	<!-- Statistics Grid -->
	<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
		
		<!-- Destinations Card -->
		<div class="stat-card bg-white rounded-lg shadow-md p-6" onclick="navigateTo('/admin/destinations')">
			<div class="flex items-start justify-between mb-4">
				<div class="icon-wrapper bg-blue-100">
					<svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
					</svg>
				</div>
				<svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
				</svg>
			</div>
			<div>
				<p class="text-gray-600 text-sm mb-1">Destinations</p>
				<p class="text-4xl font-bold text-gray-800 mb-1">156</p>
				<p class="text-gray-500 text-sm">destinations uniques</p>
			</div>
		</div>

		<!-- Pays Card -->
		<div class="stat-card bg-white rounded-lg shadow-md p-6" onclick="navigateTo('/admin/pays')">
			<div class="flex items-start justify-between mb-4">
				<div class="icon-wrapper bg-green-100">
					<svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
					</svg>
				</div>
				<svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
				</svg>
			</div>
			<div>
				<p class="text-gray-600 text-sm mb-1">Pays</p>
				<p class="text-4xl font-bold text-gray-800 mb-1">45</p>
				<p class="text-gray-500 text-sm">pays couverts</p>
			</div>
		</div>

		<!-- Continents Card -->
		<div class="stat-card bg-white rounded-lg shadow-md p-6" onclick="navigateTo('/admin/continents')">
			<div class="flex items-start justify-between mb-4">
				<div class="icon-wrapper bg-purple-100">
					<svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
					</svg>
				</div>
				<svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
				</svg>
			</div>
			<div>
				<p class="text-gray-600 text-sm mb-1">Continents</p>
				<p class="text-4xl font-bold text-gray-800 mb-1">6</p>
				<p class="text-gray-500 text-sm">continents explorés</p>
			</div>
		</div>

		<!-- Utilisateurs Card -->
		<div class="stat-card bg-white rounded-lg shadow-md p-6" onclick="navigateTo('/admin/utilisateurs')">
			<div class="flex items-start justify-between mb-4">
				<div class="icon-wrapper bg-orange-100">
					<svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
					</svg>
				</div>
				<svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
				</svg>
			</div>
			<div>
				<p class="text-gray-600 text-sm mb-1">Utilisateurs</p>
				<p class="text-4xl font-bold text-gray-800 mb-1">2,847</p>
				<p class="text-gray-500 text-sm">utilisateurs inscrits</p>
			</div>
		</div>

		<!-- Témoignages Card -->
		<div class="stat-card bg-white rounded-lg shadow-md p-6" onclick="navigateTo('/admin/temoignages')">
			<div class="flex items-start justify-between mb-4">
				<div class="icon-wrapper bg-pink-100">
					<svg class="w-8 h-8 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
					</svg>
				</div>
				<svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
				</svg>
			</div>
			<div>
				<p class="text-gray-600 text-sm mb-1">Témoignages</p>
				<p class="text-4xl font-bold text-gray-800 mb-1">324</p>
				<p class="text-gray-500 text-sm">témoignages clients</p>
			</div>
		</div>

		<!-- Voyages Card -->
		<div class="stat-card bg-white rounded-lg shadow-md p-6" onclick="navigateTo('/admin/voyages')">
			<div class="flex items-start justify-between mb-4">
				<div class="icon-wrapper bg-yellow-100">
					<svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
					</svg>
				</div>
				<svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
				</svg>
			</div>
			<div>
				<p class="text-gray-600 text-sm mb-1">Voyages</p>
				<p class="text-4xl font-bold text-gray-800 mb-1">1,523</p>
				<p class="text-gray-500 text-sm">voyages créés</p>
			</div>
		</div>

		<!-- Réservations Card -->
		<div class="stat-card bg-white rounded-lg shadow-md p-6" onclick="navigateTo('/admin/reservations')">
			<div class="flex items-start justify-between mb-4">
				<div class="icon-wrapper bg-teal-100">
					<svg class="w-8 h-8 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
					</svg>
				</div>
				<svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
				</svg>
			</div>
			<div>
				<p class="text-gray-600 text-sm mb-1">Réservations</p>
				<p class="text-4xl font-bold text-gray-800 mb-1">487</p>
				<p class="text-gray-500 text-sm">réservations actives</p>
			</div>
		</div>

	</div>

	<!-- Quick Actions Section -->
	<div class="mt-12">
		<h2 class="text-2xl font-bold text-gray-800 mb-6">Actions rapides</h2>
		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
			<button onclick="navigateTo('/admin/destinations/ajouter')" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-300 flex items-center justify-center space-x-2">
				<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
				</svg>
				<span>Ajouter une destination</span>
			</button>
			
			<button onclick="navigateTo('/admin/voyages/ajouter')" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-300 flex items-center justify-center space-x-2">
				<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
				</svg>
				<span>Créer un voyage</span>
			</button>
			
			<button onclick="navigateTo('/admin/utilisateurs/gestion')" class="bg-purple-600 hover:bg-purple-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-300 flex items-center justify-center space-x-2">
				<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
				</svg>
				<span>Gérer les utilisateurs</span>
			</button>
			
			<button onclick="navigateTo('/admin/rapports')" class="bg-orange-600 hover:bg-orange-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-300 flex items-center justify-center space-x-2">
				<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
				</svg>
				<span>Voir les rapports</span>
			</button>
		</div>
	</div>
</div>

<script>
	// Navigation function
	function navigateTo(url) {
		window.location.href = '<?= base_url() ?>' + url;
	}

	// Animate numbers on page load
	document.addEventListener('DOMContentLoaded', function() {
		const stats = document.querySelectorAll('.stat-card p.text-4xl');
		
		stats.forEach(stat => {
			const target = parseInt(stat.textContent.replace(/,/g, ''));
			const duration = 2000; // 2 seconds
			const step = target / (duration / 16); // 60fps
			let current = 0;
			
			const timer = setInterval(() => {
				current += step;
				if (current >= target) {
					current = target;
					clearInterval(timer);
				}
				
				// Format number with comma separator
				const formatted = Math.floor(current).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
				stat.textContent = formatted;
			}, 16);
		});

		// Add hover effect sound (optional)
		const cards = document.querySelectorAll('.stat-card');
		cards.forEach(card => {
			card.addEventListener('mouseenter', function() {
				this.style.boxShadow = '0 15px 35px rgba(0, 0, 0, 0.15)';
			});
			
			card.addEventListener('mouseleave', function() {
				this.style.boxShadow = '';
			});
		});
	});

	// Auto-hide notifications after 5 seconds
	setTimeout(() => {
		const toasts = document.querySelectorAll('.toast');
		toasts.forEach(toast => {
			const bsToast = new bootstrap.Toast(toast);
			bsToast.hide();
		});
	}, 5000);
</script>

<?= $this->endSection() ?>
