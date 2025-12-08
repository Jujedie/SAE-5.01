<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>Gestion des témoignages<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<style>
	.temoignage-card {
		transition: all 0.3s ease;
	}
	.temoignage-card:hover {
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
	.status-approuve {
		background-color: #d1fae5;
		color: #065f46;
	}
	.status-attente {
		background-color: #fef3c7;
		color: #92400e;
	}
	.stars {
		color: #fbbf24;
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
		<h1 class="text-3xl font-bold text-gray-800 mb-2">Gestion des postes du blog</h1>
		<p class="text-gray-600"><?= count($posts) ?> postes au total</p>
	</div>

	<!-- Search Box -->
	<div class="mb-6">
		<div class="relative">
			<svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
			</svg>
			<input type="text" id="searchInput" placeholder="Rechercher par nom ou destination..." 
				   class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 bg-gray-50">
		</div>
	</div>

	<!-- Posts List -->
	<div class="space-y-4" id="postsList">
		<?php if (empty($posts)): ?> 
			<p>Pas de témoignages</p>
		<?php else: ?>
			<?php for ($i = 0; $i < count($posts); $i++): ?>
				<div class="temoignage-card bg-white rounded-lg shadow-md p-6">
					<div class="flex items-start justify-between mb-4">
						<div class="flex-1">
							<div class="flex items-center justify-between mb-2">
								<h3 class="text-lg font-bold text-gray-900"><?= $users[$i]['firstName'] ?> <?= $users[$i]['lastName'] ?></h3>
							</div>
							<img src="<?= base_url($posts[$i]['image']) ?>" alt="Image du poste" class="w-full h-48 object-cover rounded-md mb-4">
							<p class="text-gray-700 mb-3"><?= $posts[$i]['content'] ?></p>
							<p class="text-xs text-gray-500"><?= date('d M Y', strtotime($posts[$i]['date'])) ?></p>
						</div>
					</div>
				</div>
			<?php endfor; ?>
		<?php endif; ?>
	</div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
// Search functionality
document.getElementById('searchInput').addEventListener('input', function(e) {
	const searchTerm = e.target.value.toLowerCase();
	const temoignageCards = document.querySelectorAll('.temoignage-card');
	
	temoignageCards.forEach(card => {
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
