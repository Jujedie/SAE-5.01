<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>Gestion des voyages personnalisés<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<style>
	.voyage-card {
		transition: all 0.3s ease;
	}
	.voyage-card:hover {
		transform: translateY(-2px);
		box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
	}
	.type-badge {
		display: inline-flex;
		align-items: center;
		padding: 0.25rem 0.75rem;
		border-radius: 9999px;
		font-size: 0.75rem;
		font-weight: 600;
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
		<h1 class="text-3xl font-bold text-gray-800 mb-2">Gestion des voyages personnalisés</h1>
		<p class="text-gray-600"><?= count($trips ?? []) ?> voyage<?= count($trips ?? []) > 1 ? 's' : '' ?> personnalisé<?= count($trips ?? []) > 1 ? 's' : '' ?> au total</p>
	</div>

	<!-- Flash Messages -->
	<?php if (session()->getFlashdata('success')): ?>
		<div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
			<span class="block sm:inline"><?= session()->getFlashdata('success') ?></span>
		</div>
	<?php endif; ?>

	<?php if (session()->getFlashdata('error')): ?>
		<div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
			<span class="block sm:inline"><?= session()->getFlashdata('error') ?></span>
		</div>
	<?php endif; ?>

	<!-- Search Box -->
	<div class="mb-6">
		<div class="relative">
			<svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
			</svg>
			<input type="text" id="searchInput" placeholder="Rechercher par type..." 
				   class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 bg-gray-50"
				   onkeyup="filterTrips()">
		</div>
	</div>

	<!-- Voyages List -->
	<?php if (empty($trips)): ?>
		<div class="bg-white rounded-lg shadow-md p-12 text-center">
			<svg class="mx-auto w-16 h-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
			</svg>
			<h3 class="text-xl font-semibold text-gray-700 mb-2">Aucun voyage personnalisé</h3>
			<p class="text-gray-500">Les voyages personnalisés créés par les utilisateurs apparaîtront ici</p>
		</div>
	<?php else: ?>
		<div class="space-y-4" id="voyagesList">
			<?php 
			$userModel = new \App\Models\UserModel();
			foreach ($trips as $trip): 
				$user = $userModel->getUserById($trip['idUser']);
			?>
				<div class="voyage-card bg-white rounded-lg shadow-md p-6" data-type="<?= esc(strtolower($trip['type'] ?? '')) ?>">
					<div class="flex items-start justify-between">
						<div class="flex items-start flex-1">
							<div class="flex-shrink-0 w-14 h-14 bg-yellow-100 rounded-full flex items-center justify-center">
								<svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
								</svg>
							</div>
							<div class="ml-4 flex-1">
								<div class="flex items-center">
									<h3 class="text-xl font-bold text-gray-900">
										<?= esc($user['firstName'] ?? 'Utilisateur') ?> <?= esc($user['lastName'] ?? 'Inconnu') ?>
									</h3>
									<?php if (!empty($trip['type'])): ?>
										<span class="type-badge ml-3"><?= esc($trip['type']) ?></span>
									<?php endif; ?>
								</div>
								
								<?php if (!empty($trip['departureDate'])): ?>
									<div class="mt-2 flex items-center text-gray-600">
										<svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
										</svg>
										Départ: <?= date('d/m/Y', strtotime($trip['departureDate'])) ?>
									</div>
								<?php endif; ?>
								
								<?php if (!empty($user['email'])): ?>
									<div class="mt-1 flex items-center text-gray-600">
										<svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
										</svg>
										<?= esc($user['email']) ?>
									</div>
								<?php endif; ?>
								
								<?php if (!empty($user['phone'])): ?>
									<div class="mt-1 flex items-center text-gray-600">
										<svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
										</svg>
										<?= esc($user['phone']) ?>
									</div>
								<?php endif; ?>
							</div>
						</div>
						<div class="flex items-center space-x-2">
							<a href="<?= base_url('admin/trips/view/' . $trip['idTrip']) ?>" 
							   class="p-2 text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition" 
							   title="Voir les détails">
								<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
								</svg>
							</a>
							<a href="<?= base_url('admin/trips/edit/' . $trip['idTrip']) ?>" 
							   class="p-2 text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition" 
							   title="Modifier">
								<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
								</svg>
							</a>
							<form action="<?= base_url('admin/trips/delete/' . $trip['idTrip']) ?>" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce voyage ?');" class="inline">
								<?= csrf_field() ?>
								<button type="submit" class="p-2 text-gray-600 hover:text-red-600 hover:bg-red-50 rounded-lg transition" title="Supprimer">
									<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
									</svg>
								</button>
							</form>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</div>

<script>
	function filterTrips() {
		const searchInput = document.getElementById('searchInput').value.toLowerCase();
		const cards = document.querySelectorAll('.voyage-card');
		
		cards.forEach(card => {
			const type = card.getAttribute('data-type') || '';
			const text = card.textContent.toLowerCase();
			
			if (type.includes(searchInput) || text.includes(searchInput)) {
				card.style.display = 'block';
			} else {
				card.style.display = 'none';
			}
		});
	}
</script>

<?= $this->endSection() ?>
