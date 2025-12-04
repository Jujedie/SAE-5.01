<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>Gestion des voyages<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<style>
	.voyage-card {
		transition: all 0.3s ease;
	}
	.voyage-card:hover {
		transform: translateY(-2px);
		box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
	}
	.status-badge {
		display: inline-flex;
		align-items: center;
		padding: 0.25rem 0.75rem;
		border-radius: 9999px;
		font-size: 0.75rem;
		font-weight: 600;
	}
	.status-confirme {
		background-color: #d1fae5;
		color: #065f46;
	}
	.status-attente {
		background-color: #fef3c7;
		color: #92400e;
	}
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container mx-auto px-4 py-8">
	<!-- Header with back button -->
	<div class="mb-8" style="margin-top:6rem;">
		<a href="<?= base_url('admin') ?>" class="inline-flex items-center text-gray-600 hover:text-gray-800 mb-4">
			<svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
			</svg>
			Retour au menu admin
		</a>
		<h1 class="text-3xl font-bold text-gray-800 mb-2">Gestion des voyages</h1>
		<p class="text-gray-600">4 voyages au total</p>
	</div>

	<!-- Search Box -->
	<div class="mb-6">
		<div class="relative">
			<svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
			</svg>
			<input type="text" id="searchInput" placeholder="Rechercher par client ou destination..." 
				   class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 bg-gray-50">
		</div>
	</div>

	<!-- Voyages List -->
	<div class="space-y-4" id="voyagesList">
		<!-- Sample Voyage Card 1 -->
		<div class="voyage-card bg-white rounded-lg shadow-md p-6">
			<div class="flex items-start justify-between">
				<div class="flex items-start flex-1">
					<div class="flex-shrink-0 w-14 h-14 bg-yellow-100 rounded-full flex items-center justify-center">
						<svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
						</svg>
					</div>
					<div class="ml-4 flex-1">
						<div class="flex items-center">
							<h3 class="text-xl font-bold text-gray-900">Sophie Laurent</h3>
							<span class="status-badge status-confirme ml-3">Confirmé</span>
						</div>
						<div class="mt-2 flex items-center text-gray-600">
							<svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
							</svg>
							Japon - Tokyo, Kyoto, Osaka
						</div>
						<div class="mt-1 flex items-center text-gray-600">
							<svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
							</svg>
							15-28 Mars 2024 • 14 nuits
						</div>
						<div class="mt-2">
							<span class="text-lg font-bold text-yellow-600">5500€</span>
						</div>
					</div>
				</div>
				<div class="flex items-center space-x-2">
					<button onclick="viewVoyage(1)" class="p-2 text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Voir les détails">
						<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
						</svg>
					</button>
				</div>
			</div>
		</div>

		<!-- Sample Voyage Card 2 -->
		<div class="voyage-card bg-white rounded-lg shadow-md p-6">
			<div class="flex items-start justify-between">
				<div class="flex items-start flex-1">
					<div class="flex-shrink-0 w-14 h-14 bg-yellow-100 rounded-full flex items-center justify-center">
						<svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
						</svg>
					</div>
					<div class="ml-4 flex-1">
						<div class="flex items-center">
							<h3 class="text-xl font-bold text-gray-900">Marc Dubois</h3>
							<span class="status-badge status-attente ml-3">En attente</span>
						</div>
						<div class="mt-2 flex items-center text-gray-600">
							<svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
							</svg>
							Bali - Ubud, Seminyak
						</div>
						<div class="mt-1 flex items-center text-gray-600">
							<svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
							</svg>
							5-19 Avril 2024 • 15 nuits
						</div>
						<div class="mt-2">
							<span class="text-lg font-bold text-yellow-600">4200€</span>
						</div>
					</div>
				</div>
				<div class="flex items-center space-x-2">
					<button onclick="viewVoyage(2)" class="p-2 text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Voir les détails">
						<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
						</svg>
					</button>
				</div>
			</div>
		</div>

		<!-- Sample Voyage Card 3 -->
		<div class="voyage-card bg-white rounded-lg shadow-md p-6">
			<div class="flex items-start justify-between">
				<div class="flex items-start flex-1">
					<div class="flex-shrink-0 w-14 h-14 bg-yellow-100 rounded-full flex items-center justify-center">
						<svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
						</svg>
					</div>
					<div class="ml-4 flex-1">
						<div class="flex items-center">
							<h3 class="text-xl font-bold text-gray-900">Camille Martin</h3>
							<span class="status-badge status-confirme ml-3">Confirmé</span>
						</div>
						<div class="mt-2 flex items-center text-gray-600">
							<svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
							</svg>
							Islande - Reykjavik, Golden Circle
						</div>
						<div class="mt-1 flex items-center text-gray-600">
							<svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
							</svg>
							10-20 Mai 2024 • 10 nuits
						</div>
						<div class="mt-2">
							<span class="text-lg font-bold text-yellow-600">3800€</span>
						</div>
					</div>
				</div>
				<div class="flex items-center space-x-2">
					<button onclick="viewVoyage(3)" class="p-2 text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Voir les détails">
						<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
						</svg>
					</button>
				</div>
			</div>
		</div>

		<!-- Sample Voyage Card 4 -->
		<div class="voyage-card bg-white rounded-lg shadow-md p-6">
			<div class="flex items-start justify-between">
				<div class="flex items-start flex-1">
					<div class="flex-shrink-0 w-14 h-14 bg-yellow-100 rounded-full flex items-center justify-center">
						<svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
						</svg>
					</div>
					<div class="ml-4 flex-1">
						<div class="flex items-center">
							<h3 class="text-xl font-bold text-gray-900">Thomas Bernard</h3>
							<span class="status-badge status-confirme ml-3">Confirmé</span>
						</div>
						<div class="mt-2 flex items-center text-gray-600">
							<svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
							</svg>
							Nouvelle-Zélande - Auckland, Queenstown
						</div>
						<div class="mt-1 flex items-center text-gray-600">
							<svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
							</svg>
							1-18 Juin 2024 • 18 nuits
						</div>
						<div class="mt-2">
							<span class="text-lg font-bold text-yellow-600">6800€</span>
						</div>
					</div>
				</div>
				<div class="flex items-center space-x-2">
					<button onclick="viewVoyage(4)" class="p-2 text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Voir les détails">
						<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
						</svg>
					</button>
				</div>
			</div>
		</div>
	</div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
function viewVoyage(id) {
	window.location.href = '<?= base_url('admin/reservations/detail/') ?>' + id;
}

// Search functionality
document.getElementById('searchInput').addEventListener('input', function(e) {
	const searchTerm = e.target.value.toLowerCase();
	const voyageCards = document.querySelectorAll('.voyage-card');
	
	voyageCards.forEach(card => {
		const text = card.textContent.toLowerCase();
		if (text.includes(searchTerm)) {
			card.style.display = '';
		} else {
			card.style.display = 'none';
		}
	});
});
</script>
<?= $this->endSection() ?>
