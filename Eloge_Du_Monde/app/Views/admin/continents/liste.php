<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>Gestion des continents<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<style>
	.continent-card {
		transition: all 0.3s ease;
	}
	.continent-card:hover {
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
	.status-active {
		background-color: #d1fae5;
		color: #065f46;
	}
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container mx-auto px-4 py-8">
	<!-- Header with back button -->
	<div class="mb-8">
		<a href="<?= base_url('admin') ?>" class="inline-flex items-center text-gray-600 hover:text-gray-800 mb-4">
			<svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
			</svg>
			Retour au menu admin
		</a>
		<div class="flex items-center justify-between">
			<div>
				<h1 class="text-3xl font-bold text-gray-800 mb-2">Gestion des continents</h1>
				<p class="text-gray-600">6 continents disponibles</p>
			</div>
			<button onclick="window.location.href='<?= base_url('admin/continents/ajouter') ?>'" 
					class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-6 py-3 rounded-lg flex items-center space-x-2 transition">
				<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
				</svg>
				<span>Ajouter un continent</span>
			</button>
		</div>
	</div>

	<!-- Search Box -->
	<div class="mb-6">
		<div class="relative">
			<svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
			</svg>
			<input type="text" id="searchInput" placeholder="Rechercher un continent..." 
				   class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 bg-gray-50">
		</div>
	</div>

	<!-- Continents Grid -->
	<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="continentsList">
		<!-- Continent Card 1 - Europe -->
		<div class="continent-card bg-white rounded-lg shadow-md p-6">
			<div class="flex items-start justify-between mb-4">
				<div class="flex-1">
					<div class="flex items-center mb-2">
						<div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
							<svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
							</svg>
						</div>
						<div>
							<h3 class="text-xl font-bold text-gray-900">Europe</h3>
							<span class="status-badge status-active">Actif</span>
						</div>
					</div>
					<div class="mt-4 space-y-2">
						<div class="flex items-center text-sm text-gray-600">
							<svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
							</svg>
							<strong class="mr-2">32 destinations</strong>
						</div>
						<div class="flex items-center text-sm text-gray-600">
							<svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
							</svg>
							<strong class="mr-2">156 voyages</strong>
						</div>
					</div>
				</div>
			</div>
			<div class="flex items-center space-x-2 pt-4 border-t border-gray-200">
				<button onclick="editContinent(1)" class="flex-1 bg-blue-50 hover:bg-blue-100 text-blue-600 font-medium py-2 rounded-lg transition">
					Modifier
				</button>
				<button onclick="deleteContinent(1)" class="p-2 text-gray-600 hover:text-red-600 hover:bg-red-50 rounded-lg transition">
					<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
					</svg>
				</button>
			</div>
		</div>

		<!-- Continent Card 2 - Asie -->
		<div class="continent-card bg-white rounded-lg shadow-md p-6">
			<div class="flex items-start justify-between mb-4">
				<div class="flex-1">
					<div class="flex items-center mb-2">
						<div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mr-3">
							<svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
							</svg>
						</div>
						<div>
							<h3 class="text-xl font-bold text-gray-900">Asie</h3>
							<span class="status-badge status-active">Actif</span>
						</div>
					</div>
					<div class="mt-4 space-y-2">
						<div class="flex items-center text-sm text-gray-600">
							<svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
							</svg>
							<strong class="mr-2">45 destinations</strong>
						</div>
						<div class="flex items-center text-sm text-gray-600">
							<svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
							</svg>
							<strong class="mr-2">234 voyages</strong>
						</div>
					</div>
				</div>
			</div>
			<div class="flex items-center space-x-2 pt-4 border-t border-gray-200">
				<button onclick="editContinent(2)" class="flex-1 bg-blue-50 hover:bg-blue-100 text-blue-600 font-medium py-2 rounded-lg transition">
					Modifier
				</button>
				<button onclick="deleteContinent(2)" class="p-2 text-gray-600 hover:text-red-600 hover:bg-red-50 rounded-lg transition">
					<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
					</svg>
				</button>
			</div>
		</div>

		<!-- Continent Card 3 - Afrique -->
		<div class="continent-card bg-white rounded-lg shadow-md p-6">
			<div class="flex items-start justify-between mb-4">
				<div class="flex-1">
					<div class="flex items-center mb-2">
						<div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center mr-3">
							<svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
							</svg>
						</div>
						<div>
							<h3 class="text-xl font-bold text-gray-900">Afrique</h3>
							<span class="status-badge status-active">Actif</span>
						</div>
					</div>
					<div class="mt-4 space-y-2">
						<div class="flex items-center text-sm text-gray-600">
							<svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
							</svg>
							<strong class="mr-2">28 destinations</strong>
						</div>
						<div class="flex items-center text-sm text-gray-600">
							<svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
							</svg>
							<strong class="mr-2">89 voyages</strong>
						</div>
					</div>
				</div>
			</div>
			<div class="flex items-center space-x-2 pt-4 border-t border-gray-200">
				<button onclick="editContinent(3)" class="flex-1 bg-blue-50 hover:bg-blue-100 text-blue-600 font-medium py-2 rounded-lg transition">
					Modifier
				</button>
				<button onclick="deleteContinent(3)" class="p-2 text-gray-600 hover:text-red-600 hover:bg-red-50 rounded-lg transition">
					<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
					</svg>
				</button>
			</div>
		</div>

		<!-- Continent Card 4 - Amérique du Nord -->
		<div class="continent-card bg-white rounded-lg shadow-md p-6">
			<div class="flex items-start justify-between mb-4">
				<div class="flex-1">
					<div class="flex items-center mb-2">
						<div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-3">
							<svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
							</svg>
						</div>
						<div>
							<h3 class="text-xl font-bold text-gray-900">Amérique du Nord</h3>
							<span class="status-badge status-active">Actif</span>
						</div>
					</div>
					<div class="mt-4 space-y-2">
						<div class="flex items-center text-sm text-gray-600">
							<svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
							</svg>
							<strong class="mr-2">18 destinations</strong>
						</div>
						<div class="flex items-center text-sm text-gray-600">
							<svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
							</svg>
							<strong class="mr-2">124 voyages</strong>
						</div>
					</div>
				</div>
			</div>
			<div class="flex items-center space-x-2 pt-4 border-t border-gray-200">
				<button onclick="editContinent(4)" class="flex-1 bg-blue-50 hover:bg-blue-100 text-blue-600 font-medium py-2 rounded-lg transition">
					Modifier
				</button>
				<button onclick="deleteContinent(4)" class="p-2 text-gray-600 hover:text-red-600 hover:bg-red-50 rounded-lg transition">
					<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
					</svg>
				</button>
			</div>
		</div>

		<!-- Continent Card 5 - Amérique du Sud -->
		<div class="continent-card bg-white rounded-lg shadow-md p-6">
			<div class="flex items-start justify-between mb-4">
				<div class="flex-1">
					<div class="flex items-center mb-2">
						<div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mr-3">
							<svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
							</svg>
						</div>
						<div>
							<h3 class="text-xl font-bold text-gray-900">Amérique du Sud</h3>
							<span class="status-badge status-active">Actif</span>
						</div>
					</div>
					<div class="mt-4 space-y-2">
						<div class="flex items-center text-sm text-gray-600">
							<svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
							</svg>
							<strong class="mr-2">22 destinations</strong>
						</div>
						<div class="flex items-center text-sm text-gray-600">
							<svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
							</svg>
							<strong class="mr-2">98 voyages</strong>
						</div>
					</div>
				</div>
			</div>
			<div class="flex items-center space-x-2 pt-4 border-t border-gray-200">
				<button onclick="editContinent(5)" class="flex-1 bg-blue-50 hover:bg-blue-100 text-blue-600 font-medium py-2 rounded-lg transition">
					Modifier
				</button>
				<button onclick="deleteContinent(5)" class="p-2 text-gray-600 hover:text-red-600 hover:bg-red-50 rounded-lg transition">
					<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
					</svg>
				</button>
			</div>
		</div>

		<!-- Continent Card 6 - Océanie -->
		<div class="continent-card bg-white rounded-lg shadow-md p-6">
			<div class="flex items-start justify-between mb-4">
				<div class="flex-1">
					<div class="flex items-center mb-2">
						<div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
							<svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
							</svg>
						</div>
						<div>
							<h3 class="text-xl font-bold text-gray-900">Océanie</h3>
							<span class="status-badge status-active">Actif</span>
						</div>
					</div>
					<div class="mt-4 space-y-2">
						<div class="flex items-center text-sm text-gray-600">
							<svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
							</svg>
							<strong class="mr-2">12 destinations</strong>
						</div>
						<div class="flex items-center text-sm text-gray-600">
							<svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
							</svg>
							<strong class="mr-2">67 voyages</strong>
						</div>
					</div>
				</div>
			</div>
			<div class="flex items-center space-x-2 pt-4 border-t border-gray-200">
				<button onclick="editContinent(6)" class="flex-1 bg-blue-50 hover:bg-blue-100 text-blue-600 font-medium py-2 rounded-lg transition">
					Modifier
				</button>
				<button onclick="deleteContinent(6)" class="p-2 text-gray-600 hover:text-red-600 hover:bg-red-50 rounded-lg transition">
					<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
					</svg>
				</button>
			</div>
		</div>
	</div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
function editContinent(id) {
	window.location.href = '<?= base_url('admin/continents/modifier/') ?>' + id;
}

function deleteContinent(id) {
	if (confirm('Êtes-vous sûr de vouloir supprimer ce continent ? Toutes les destinations associées seront également supprimées.')) {
		window.location.href = '<?= base_url('admin/continents/supprimer/') ?>' + id;
	}
}

// Search functionality
document.getElementById('searchInput').addEventListener('input', function(e) {
	const searchTerm = e.target.value.toLowerCase();
	const continentCards = document.querySelectorAll('.continent-card');
	
	continentCards.forEach(card => {
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
