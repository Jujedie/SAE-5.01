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
	.reservation-row {
		transition: all 0.3s ease;
	}
	.reservation-row:hover {
		background-color: #f9fafb;
	}
	.destination-badge {
		display: inline-block;
		background-color: #dbeafe;
		color: #1e40af;
		padding: 0.25rem 0.75rem;
		border-radius: 9999px;
		font-size: 0.75rem;
		font-weight: 600;
		margin: 0.125rem;
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
		<div class="flex items-center justify-between">
			<div>
				<h1 class="text-3xl font-bold text-gray-800 mb-2">Gestion des réservations</h1>
				<p class="text-gray-600"><?= count($reservations) ?> réservation(s) au total</p>
			</div>
		</div>
	</div>

	<!-- Flash Messages -->
	<?php if (session()->getFlashdata('success')): ?>
		<div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
			<span class="block sm:inline"><?= session()->getFlashdata('success') ?></span>
		</div>
	<?php endif; ?>

	<!-- Search Box -->
	<div class="mb-6">
		<div class="relative">
			<svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
			</svg>
			<input type="text" id="searchInput" placeholder="Rechercher par client, email ou destination..." 
				   class="search-box w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 bg-gray-50"
				   onkeyup="filterReservations()">
		</div>
	</div>

	<!-- Reservations Table -->
	<?php if (empty($reservations)): ?>
		<div class="bg-white rounded-lg shadow-md p-12 text-center">
			<svg class="mx-auto w-16 h-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
			</svg>
			<h3 class="text-xl font-semibold text-gray-700 mb-2">Aucune réservation</h3>
			<p class="text-gray-500">Les réservations des voyages apparaîtront ici</p>
		</div>
	<?php else: ?>
		<div class="bg-white rounded-lg shadow-md overflow-hidden">
			<div class="overflow-x-auto">
				<table class="w-full">
					<thead class="bg-gray-50">
						<tr>
							<th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">N° Réservation</th>
							<th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Client</th>
							<th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Destinations</th>
							<th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Dates</th>
							<th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Montant</th>
							<th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Type</th>
						</tr>
					</thead>
					<tbody class="divide-y divide-gray-200" id="reservationsTable">
						<?php foreach ($reservations as $index => $reservation): ?>
							<tr class="reservation-row" 
								data-client="<?= esc(strtolower($reservation['client']['lastname'] ?? '')) ?> <?= esc(strtolower($reservation['client']['firstname'] ?? '')) ?>"
								data-email="<?= esc(strtolower($reservation['client']['email'] ?? '')) ?>"
								data-destinations="<?= esc(strtolower(implode(' ', array_column($reservation['destinations'], 'name')))) ?>">
								
								<!-- N° Réservation -->
								<td class="px-6 py-4 whitespace-nowrap">
									<span class="text-sm font-bold text-gray-900">#<?= str_pad($reservation['idTrip'], 5, '0', STR_PAD_LEFT) ?></span>
								</td>

								<!-- Client -->
								<td class="px-6 py-4">
									<div class="flex items-center">
										<div class="flex-shrink-0 w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
											<svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
											</svg>
										</div>
										<div class="ml-4">
											<div class="text-sm font-medium text-gray-900">
												<?= esc($reservation['client']['firstName'] ?? 'N/A') ?> <?= esc($reservation['client']['lastName'] ?? '') ?>
											</div>
											<div class="text-sm text-gray-500"><?= esc($reservation['client']['email'] ?? 'N/A') ?></div>
											<?php if (!empty($reservation['client']['phone'])): ?>
												<div class="text-sm text-gray-400"><?= esc($reservation['client']['phone']) ?></div>
											<?php endif; ?>
										</div>
									</div>
								</td>

								<!-- Destinations -->
								<td class="px-6 py-4">
									<div class="flex flex-wrap gap-1">
										<?php foreach ($reservation['destinations'] as $dest): ?>
											<span class="destination-badge">
												<?= esc($dest['name']) ?> (<?= esc($dest['country']) ?>)
											</span>
										<?php endforeach; ?>
									</div>
									<div class="text-xs text-gray-500 mt-1">
										<?= count($reservation['destinations']) ?> destination(s)
									</div>
								</td>

								<!-- Dates -->
								<td class="px-6 py-4">
									<div class="text-sm text-gray-900">
										<div class="font-semibold">Du <?= date('d/m/Y', strtotime($reservation['departureDate'])) ?></div>
										<div>au <?= date('d/m/Y', strtotime($reservation['endDate'])) ?></div>
										<div class="text-xs text-gray-500 mt-1">(<?= $reservation['totalNights'] ?> nuit<?= $reservation['totalNights'] > 1 ? 's' : '' ?>)</div>
									</div>
								</td>

								<!-- Montant -->
								<td class="px-6 py-4 text-center">
									<div class="text-lg font-bold text-green-600">
										<?= number_format($reservation['totalAmount'], 0, ',', ' ') ?>€
									</div>
								</td>

								<!-- Type -->
								<td class="px-6 py-4 text-center">
									<span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium
										<?php 
											switch($reservation['type']) {
												case 'groupe':
													echo 'bg-purple-100 text-purple-800';
													break;
												case 'famille':
													echo 'bg-pink-100 text-pink-800';
													break;
												case 'luxe':
													echo 'bg-yellow-100 text-yellow-800';
													break;
												case 'aventure':
													echo 'bg-orange-100 text-orange-800';
													break;
												default:
													echo 'bg-blue-100 text-blue-800';
											}
										?>">
										<?= esc(ucfirst($reservation['type'])) ?>
									</span>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	<?php endif; ?>
</div>

<script>
	function filterReservations() {
		const searchInput = document.getElementById('searchInput').value.toLowerCase();
		const rows = document.querySelectorAll('.reservation-row');
		
		rows.forEach(row => {
			const client = row.getAttribute('data-client') || '';
			const email = row.getAttribute('data-email') || '';
			const destinations = row.getAttribute('data-destinations') || '';
			
			if (client.includes(searchInput) || email.includes(searchInput) || destinations.includes(searchInput)) {
				row.style.display = '';
			} else {
				row.style.display = 'none';
			}
		});
	}
</script>

<?= $this->endSection() ?>
