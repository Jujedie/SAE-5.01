<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>Gestion des témoignages<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/admin/blog/list.css') ?>">
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
				<h1 class="text-3xl font-bold text-gray-800 mb-2">Gestion des postes du blog</h1>
				<p class="text-gray-600"><?= count($posts) ?> postes au total</p>
			</div>
			<a href="<?= base_url('admin/blog/add') ?>" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-300 flex items-center space-x-2">
				<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
				</svg>
				<span>Ajouter un poste</span>
			</a>
		</div>
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
								<h3 class="text-lg font-bold text-gray-900">Titre :</span> <?= $posts[$i]['title'] ?></h3>
							</div>
							<p class="text-gray-600 mb-1"><span class="font-semibold"><?= $users[$i]['firstName'] ?> <?= $users[$i]['lastName'] ?></span></p>
							<?php if (!empty($posts[$i]['image'])): ?>
								<img src="<?= base_url('assets/images/' . $posts[$i]['image']) ?>" alt="Image du poste" class="w-full h-48 object-cover rounded-md mb-4">
							<?php endif; ?>
							<p class="text-gray-700 mb-3"><?= $posts[$i]['content'] ?></p>
							<p class="text-xs text-gray-500"><?= date('d M Y', strtotime($posts[$i]['date'])) ?></p>
						</div>
						<div class="flex space-x-2 ml-4">
							<a href="<?= base_url('admin/blog/edit/' . $posts[$i]['idBlogPost']) ?>" 
							class="p-2 text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition" 
							title="Modifier">
								<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
								</svg>
							</a>
							<a href="<?= base_url('admin/blog/delete/' . $posts[$i]['idBlogPost']) ?>">
								<button onclick="confirm('Êtes-vous sûr de vouloir supprimer ce post ?')" class="p-2 text-gray-600 hover:text-red-600 hover:bg-red-50 rounded-lg transition" title="Delete">
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
<script src="<?= base_url('assets/js/admin/blog/list.js') ?>"></script>
<?= $this->endSection() ?>
