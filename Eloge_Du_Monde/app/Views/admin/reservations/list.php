<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>Gestion des réservations<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<style>
	.search-box {
		transition: all 0.3s ease;
	}
	.search-box:focus {
		box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
	}
	.reservation-card {
		transition: all 0.3s ease;
	}
	.reservation-card:hover {
		transform: translateY(-2px);
		box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
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
		<h1 class="text-3xl font-bold text-gray-800 mb-2">Gérer toutes les réservations de voyages des clients</h1>
	</div>

	<!-- Statistics Cards -->
	<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
		<div class="bg-white rounded-lg shadow-md p-6">
			<div class="flex items-center justify-between">
				<div>
					<p class="text-gray-600 text-sm mb-1">Total réservations</p>
					<p class="text-3xl font-bold text-gray-800">6</p>
				</div>
				<div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
					<svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
					</svg>
				</div>
			</div>
		</div>

		<div class="bg-white rounded-lg shadow-md p-6">
			<div class="flex items-center justify-between">
				<div>
					<p class="text-gray-600 text-sm mb-1">Voyageurs</p>
					<p class="text-3xl font-bold text-gray-800">15</p>
				</div>
				<div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
					<svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
					</svg>
				</div>
			</div>
		</div>

		<div class="bg-white rounded-lg shadow-md p-6">
			<div class="flex items-center justify-between">
				<div>
					<p class="text-gray-600 text-sm mb-1">Destinations</p>
					<p class="text-3xl font-bold text-gray-800">6</p>
				</div>
				<div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
					<svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
					</svg>
				</div>
			</div>
		</div>

		<div class="bg-white rounded-lg shadow-md p-6">
			<div class="flex items-center justify-between">
				<div>
					<p class="text-gray-600 text-sm mb-1">Budget total</p>
					<p class="text-3xl font-bold text-gray-800">35 600€</p>
				</div>
				<div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
					<svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
					</svg>
				</div>
			</div>
		</div>
	</div>

	<!-- Search Box -->
	<div class="mb-6">
		<div class="relative">
			<svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
			</svg>
			<input type="text" id="searchInput" placeholder="Rechercher par nom, email, destination ou N° réservation..." 
				   class="search-box w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 bg-gray-50">
		</div>
	</div>

	<!-- Reservations Table -->
	<div class="bg-white rounded-lg shadow-md overflow-hidden">
		<div class="overflow-x-auto">
			<table class="w-full">
				<thead class="bg-gray-50">
					<tr>
						<th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">N° Réservation</th>
						<th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Client</th>
						<th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Destination</th>
						<th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Dates</th>
						<th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Voyageurs</th>
						<th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Budget</th>
						<th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Créée le</th>
						<th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
					</tr>
				</thead>
				<tbody class="divide-y divide-gray-200" id="reservationsTable">
					<!-- Sample data matching the image -->
					<tr class="reservation-card hover:bg-gray-50">
						<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">RES001</td>
						<td class="px-6 py-4">
							<div class="flex items-center">
								<div class="flex-shrink-0 w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
									<svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
									</svg>
								</div>
								<div class="ml-4">
									<div class="text-sm font-medium text-gray-900">Sophie Martin</div>
									<div class="text-sm text-gray-500">sophie.martin@email.fr</div>
									<div class="text-sm text-gray-400">+33 6 12 34 56 78</div>
								</div>
							</div>
						</td>
						<td class="px-6 py-4">
							<div class="flex items-center">
								<svg class="w-5 h-5 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
								</svg>
								<span class="text-sm text-gray-900">Bali, Indonésie</span>
							</div>
						</td>
						<td class="px-6 py-4 text-sm text-gray-900">
							<div>Du 15/06/2025</div>
							<div class="text-gray-500">Au 29/06/2025</div>
						</td>
						<td class="px-6 py-4 text-center text-sm font-semibold text-gray-900">2</td>
						<td class="px-6 py-4 text-center">
							<span class="inline-flex items-center text-sm font-semibold text-gray-900">
								<svg class="w-4 h-4 text-gray-400 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
								</svg>
								4500€
							</span>
						</td>
						<td class="px-6 py-4 text-center text-sm text-gray-500">15/01/2025</td>
						<td class="px-6 py-4 text-center">
							<button onclick="viewReservation(1)" class="text-gray-600 hover:text-blue-600 transition">
								<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
								</svg>
							</button>
						</td>
					</tr>
					
					<?php foreach($reservations ?? [] as $reservation): ?>
					<tr class="reservation-card hover:bg-gray-50">
						<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">RES<?= str_pad($reservation['id'] ?? 0, 3, '0', STR_PAD_LEFT) ?></td>
						<td class="px-6 py-4">
							<div class="flex items-center">
								<div class="flex-shrink-0 w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
									<svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
									</svg>
								</div>
								<div class="ml-4">
									<div class="text-sm font-medium text-gray-900"><?= esc($reservation['nom'] ?? 'N/A') ?></div>
									<div class="text-sm text-gray-500"><?= esc($reservation['email'] ?? 'N/A') ?></div>
								</div>
							</div>
						</td>
						<td class="px-6 py-4">
							<div class="flex items-center">
								<svg class="w-5 h-5 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
								</svg>
								<span class="text-sm text-gray-900"><?= esc($reservation['destination'] ?? 'N/A') ?></span>
							</div>
						</td>
						<td class="px-6 py-4 text-sm text-gray-900">
							<div>Du <?= date('d/m/Y', strtotime($reservation['date_debut'] ?? 'now')) ?></div>
							<div class="text-gray-500">Au <?= date('d/m/Y', strtotime($reservation['date_fin'] ?? 'now')) ?></div>
						</td>
						<td class="px-6 py-4 text-center text-sm font-semibold text-gray-900"><?= $reservation['nb_voyageurs'] ?? 0 ?></td>
						<td class="px-6 py-4 text-center">
							<span class="inline-flex items-center text-sm font-semibold text-gray-900">
								<svg class="w-4 h-4 text-gray-400 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
								</svg>
								<?= number_format($reservation['budget'] ?? 0, 0, ',', ' ') ?>€
							</span>
						</td>
						<td class="px-6 py-4 text-center text-sm text-gray-500"><?= date('d/m/Y', strtotime($reservation['created_at'] ?? 'now')) ?></td>
						<td class="px-6 py-4 text-center">
							<button onclick="viewReservation(<?= $reservation['id'] ?? 0 ?>)" class="text-gray-600 hover:text-blue-600 transition">
								<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
								</svg>
							</button>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script>
	function viewReservation(id) {
		window.location.href = '<?= base_url('admin/reservations/') ?>' + id;
	}

	// Search functionality
	document.getElementById('searchInput').addEventListener('keyup', function() {
		const searchTerm = this.value.toLowerCase();
		const rows = document.querySelectorAll('#reservationsTable tr');
		
		rows.forEach(row => {
			const text = row.textContent.toLowerCase();
			row.style.display = text.includes(searchTerm) ? '' : 'none';
		});
	});
</script>

<?= $this->endSection() ?>
