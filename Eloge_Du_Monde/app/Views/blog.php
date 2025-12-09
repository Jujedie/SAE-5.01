<?= $this->extend('layouts/default') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/blog.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="blog-hero" style="margin-top: 5rem;">
	<div class="blog-hero-overlay">
		<div class="blog-hero-decoration top-left"></div>
		<div class="blog-hero-decoration bottom-right"></div>
	</div>
	
	<div class="blog-hero-content">
		<div class="blog-badge">
			<svg class="blog-badge-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
				<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
			</svg>
			<span>BLOG & CONSEILS</span>
		</div>
		
		<h1 class="blog-hero-title playfair">Inspirations & Guides</h1>
		
		<p class="blog-hero-description">
			Conseils d'experts, guides de destinations et astuces pour préparer votre prochain voyage
		</p>
	</div>
</section>

<!-- Blog Posts Section -->
<section class="blog-posts-section">
	<div class="blog-container">
		<div class="blog-content">
			<!-- Filters -->
			<div class="blog-filters">
				<span class="filter-label">Filtrer par :</span>
				<div class="filter-buttons">
					<button class="filter-btn active" data-filter="all">Tous les articles</button>
					<button class="filter-btn" data-filter="Destinations">Destinations</button>
					<button class="filter-btn" data-filter="Budgets">Budgets</button>
					<button class="filter-btn" data-filter="Guides">Guides</button>
					<button class="filter-btn" data-filter="Conseils">Conseils</button>
				</div>
				<p class="filter-count" id="filterCount"><?= $count ?> articles</p>
			</div>

			<!-- Blog Posts -->
			<div class="blog-posts" id="blogPosts">
				<?php if (empty($posts)): ?>
					<p class="no-posts-message">Aucun article de blog</p>
				<?php else: ?>
					<?php for ($i = 0; $i < count($posts); $i++): ?>
						<article class="blog-post" data-tag="<?= $posts[$i]['type'] ?>">
							<div class="post-header">
								<div class="post-date">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
										<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
										<line x1="16" y1="2" x2="16" y2="6"></line>
										<line x1="8" y1="2" x2="8" y2="6"></line>
										<line x1="3" y1="10" x2="21" y2="10"></line>
									</svg>
									<span><?= date('d F Y', strtotime($posts[$i]['date'])) ?></span>
								</div>
								<span class="post-tag"><?= $posts[$i]['type'] ?></span>
							</div>

					<span class="ml-10 text-gray-400"><?= $users[$i]['firstName'] ?> <?= $users[$i]['lastName'] ?></span>
					
					<h2 class="post-title playfair"><?= $posts[$i]['title'] ?></h2>

					<?php if (!empty($posts[$i]['image'])): ?>
						<div class="post-image">
							<img src="<?= base_url('assets/images/' . $posts[$i]['image']) ?>" alt="image de l'article">
						</div>
					<?php endif; ?>

					<div class="post-content">
						<p class="post-excerpt"><?= $posts[$i]['content'] ?></p>
							</div>
						</article>
					<?php endfor; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="<?= base_url('assets/js/blog.js') ?>"></script>
<?= $this->endSection() ?>
