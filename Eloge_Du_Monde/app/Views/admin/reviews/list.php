<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>Gestion des témoignages<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/admin/reviews/list.css') ?>">
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
		<h1 class="text-3xl font-bold text-gray-800 mb-2">Gestion des témoignages</h1>
		<p class="text-gray-600"><?= count($reviews) ?> témoignages au total</p>
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

	<!-- Reviews List -->
	<div class="space-y-4" id="reviewsList">
		<?php if (empty($reviews)): ?> 
			<p>Pas de témoignages</p>
		<?php else: ?>
			<?php for ($i = 0; $i < count($reviews); $i++): ?>
				<div class="temoignage-card bg-white rounded-lg shadow-md p-6">
					<div class="flex items-start justify-between mb-4">
						<div class="flex-1">
							<div class="flex items-center justify-between mb-2">
								<h3 class="text-lg font-bold text-gray-900"><?= $users[$i]['firstName'] ?> <?= $users[$i]['lastName'] ?></h3>
								<?php if ($reviews[$i]['verified'] === 't'): ?>
									<span class="status-badge status-approuve">Approuvé</span>
								<?php else: ?>
									<span class="status-badge status-attente">En attente</span>
								<?php endif; ?>
							</div>
							<div class="flex items-center mb-3">
								<div class="stars flex">
									<?php $hollowStars = 5 - $reviews[$i]['rating']; ?>
									<?php for ($j = 0 ; $j < $reviews[$i]['rating'] ; $j++): ?>
										<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
											<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
										</svg>
									<?php endfor; ?>
									<?php for ($k = 0 ; $k < $hollowStars ; $k++): ?>
										<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 20 20">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
										</svg>
									<?php endfor; ?>
								</div>
							</div>
							<p class="text-gray-700 mb-3"><?= $reviews[$i]['content'] ?></p>
							<p class="text-xs text-gray-500"><?= date('d M Y', strtotime($reviews[$i]['date'])) ?></p>
						</div>
						<div class="flex items-center space-x-2 ml-4">
							<a href="<?= base_url('admin/reviews/verify/' . $reviews[$i]['idReview']) ?>">
								<button class="p-2 text-gray-600 hover:text-green-600 hover:bg-green-50 rounded-lg transition" title="Approve">
									<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
									</svg>
								</button>
							</a>
							<a href="<?= base_url('admin/reviews/unverify/' . $reviews[$i]['idReview']) ?>">
								<button class="p-2 text-gray-600 hover:text-yellow-600 hover:bg-yellow-50 rounded-lg transition" title="Unapprove">
									<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
									</svg>
								</button>
							</a>
							<a href="<?= base_url('admin/reviews/delete/' . $reviews[$i]['idReview']) ?>">
								<button onclick="confirm('Êtes-vous sûr de vouloir supprimer ce témoignage ?')" class="p-2 text-gray-600 hover:text-red-600 hover:bg-red-50 rounded-lg transition" title="Delete">
									<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4a1 1 0 011 1v1H9V4a1 1 0 011-1zM4 7h16"/>
									</svg>
								</button>
							</a>
						</div>
					</div>
				</div>
			<?php endfor; ?>
		<?php endif; ?>
	</div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="<?= base_url('assets/js/admin/reviews/list.js') ?>"></script>
<?= $this->endSection() ?>
