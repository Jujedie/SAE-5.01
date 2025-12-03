<?= $this->extend('layout/default') ?>

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
				<p class="filter-count" id="filterCount">8 articles</p>
			</div>

			<!-- Blog Posts -->
			<div class="blog-posts" id="blogPosts">
				<!-- Post 1 -->
				<article class="blog-post" data-tag="Destinations">
					<div class="post-header">
						<div class="post-date">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
								<line x1="16" y1="2" x2="16" y2="6"></line>
								<line x1="8" y1="2" x2="8" y2="6"></line>
								<line x1="3" y1="10" x2="21" y2="10"></line>
							</svg>
							<span>1 novembre 2024</span>
						</div>
						<span class="post-tag">Destinations</span>
					</div>
					
					<h2 class="post-title playfair">Comment bien préparer son premier voyage aux Maldives</h2>
					
					<div class="post-image">
						<img src="<?= base_url('assets/images/blog1.jpeg') ?>" alt="Maldives">
					</div>
					
					<div class="post-content">
						<p class="post-excerpt">Les Maldives représentent la destination rêvée pour de nombreux voyageurs en quête de paradis tropical. Mais comment s'assurer que votre séjour soit à la hauteur de vos attentes ? Voici nos conseils d'experts pour préparer au mieux votre voyage...</p>
						<button class="read-more-btn" data-post="1">Lire la suite</button>
					</div>
					
					<div class="post-footer">
						<button class="post-action">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
							</svg>
							<span>124</span>
						</button>
						<button class="post-action">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
							</svg>
							<span>18 commentaires</span>
						</button>
					</div>
				</article>

				<!-- Post 2 -->
				<article class="blog-post" data-tag="Destinations">
					<div class="post-header">
						<div class="post-date">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
								<line x1="16" y1="2" x2="16" y2="6"></line>
								<line x1="8" y1="2" x2="8" y2="6"></line>
								<line x1="3" y1="10" x2="21" y2="10"></line>
							</svg>
							<span>28 octobre 2024</span>
						</div>
						<span class="post-tag">Destinations</span>
					</div>
					
					<h2 class="post-title playfair">Le Japon en automne : pourquoi c'est la meilleure période</h2>
					
					<div class="post-image">
						<img src="<?= base_url('assets/images/blog2.jpeg') ?>" alt="Japon">
					</div>
					
					<div class="post-content">
						<p class="post-excerpt">L'automne japonais, ou 'momiji' (紅葉), est une période magique qui attire des millions de visiteurs chaque année. Découvrez pourquoi cette saison est si spéciale et comment en profiter pleinement...</p>
						<button class="read-more-btn" data-post="2">Lire la suite</button>
					</div>
					
					<div class="post-footer">
						<button class="post-action">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
							</svg>
							<span>156</span>
						</button>
						<button class="post-action">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
							</svg>
							<span>24 commentaires</span>
						</button>
					</div>
				</article>

				<!-- Post 3 -->
				<article class="blog-post" data-tag="Budgets">
					<div class="post-header">
						<div class="post-date">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
								<line x1="16" y1="2" x2="16" y2="6"></line>
								<line x1="8" y1="2" x2="8" y2="6"></line>
								<line x1="3" y1="10" x2="21" y2="10"></line>
							</svg>
							<span>22 octobre 2024</span>
						</div>
						<span class="post-tag">Budgets</span>
					</div>
					
					<h2 class="post-title playfair">Voyage sur mesure : quel budget prévoir ?</h2>
					
					<div class="post-content">
						<p class="post-excerpt">La question du budget est souvent la première qui nous est posée. Contrairement aux idées reçues, un voyage sur mesure n'est pas forcément plus coûteux qu'un voyage organisé classique. Explications...</p>
						<button class="read-more-btn" data-post="3">Lire la suite</button>
					</div>
					
					<div class="post-footer">
						<button class="post-action">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
							</svg>
							<span>98</span>
						</button>
						<button class="post-action">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
							</svg>
							<span>31 commentaires</span>
						</button>
					</div>
				</article>

				<!-- Post 4 -->
				<article class="blog-post" data-tag="Guides">
					<div class="post-header">
						<div class="post-date">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
								<line x1="16" y1="2" x2="16" y2="6"></line>
								<line x1="8" y1="2" x2="8" y2="6"></line>
								<line x1="3" y1="10" x2="21" y2="10"></line>
							</svg>
							<span>15 octobre 2024</span>
						</div>
						<span class="post-tag">Guides</span>
					</div>
					
					<h2 class="post-title playfair">Trek et randonnée : nos 5 destinations incontournables</h2>
					
					<div class="post-image">
						<img src="<?= base_url('assets/images/blog3.jpeg') ?>" alt="Trek">
					</div>
					
					<div class="post-content">
						<p class="post-excerpt">Pour les amoureux de nature et de grands espaces, voici notre sélection des destinations de trek les plus spectaculaires, adaptées à différents niveaux...</p>
						<button class="read-more-btn" data-post="4">Lire la suite</button>
					</div>
					
					<div class="post-footer">
						<button class="post-action">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
							</svg>
							<span>187</span>
						</button>
						<button class="post-action">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
							</svg>
							<span>42 commentaires</span>
						</button>
					</div>
				</article>

				<!-- Post 5 -->
				<article class="blog-post" data-tag="Conseils">
					<div class="post-header">
						<div class="post-date">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
								<line x1="16" y1="2" x2="16" y2="6"></line>
								<line x1="8" y1="2" x2="8" y2="6"></line>
								<line x1="3" y1="10" x2="21" y2="10"></line>
							</svg>
							<span>10 octobre 2024</span>
						</div>
						<span class="post-tag">Conseils</span>
					</div>
					
					<h2 class="post-title playfair">Assurance voyage : ce qu'il faut absolument savoir</h2>
					
					<div class="post-content">
						<p class="post-excerpt">L'assurance voyage est souvent négligée lors de la préparation d'un séjour. Pourtant, elle peut vous éviter bien des tracas et dépenses imprévues. Voici ce que vous devez savoir...</p>
						<button class="read-more-btn" data-post="5">Lire la suite</button>
					</div>
					
					<div class="post-footer">
						<button class="post-action">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
							</svg>
							<span>72</span>
						</button>
						<button class="post-action">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
							</svg>
							<span>15 commentaires</span>
						</button>
					</div>
				</article>

				<!-- Post 6 -->
				<article class="blog-post" data-tag="Destinations">
					<div class="post-header">
						<div class="post-date">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
								<line x1="16" y1="2" x2="16" y2="6"></line>
								<line x1="8" y1="2" x2="8" y2="6"></line>
								<line x1="3" y1="10" x2="21" y2="10"></line>
							</svg>
							<span>5 octobre 2024</span>
						</div>
						<span class="post-tag">Destinations</span>
					</div>
					
					<h2 class="post-title playfair">Safari en Afrique : Kenya, Tanzanie ou Afrique du Sud ?</h2>
					
					<div class="post-content">
						<p class="post-excerpt">Réaliser un safari est souvent le voyage d'une vie. Mais quelle destination choisir ? Voici notre comparatif des trois pays phares pour observer la faune africaine...</p>
						<button class="read-more-btn" data-post="6">Lire la suite</button>
					</div>
					
					<div class="post-footer">
						<button class="post-action">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
							</svg>
							<span>203</span>
						</button>
						<button class="post-action">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
							</svg>
							<span>38 commentaires</span>
						</button>
					</div>
				</article>

				<!-- Post 7 -->
				<article class="blog-post" data-tag="Conseils">
					<div class="post-header">
						<div class="post-date">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
								<line x1="16" y1="2" x2="16" y2="6"></line>
								<line x1="8" y1="2" x2="8" y2="6"></line>
								<line x1="3" y1="10" x2="21" y2="10"></line>
							</svg>
							<span>28 septembre 2024</span>
						</div>
						<span class="post-tag">Conseils</span>
					</div>
					
					<h2 class="post-title playfair">Voyage en famille : nos destinations préférées</h2>
					
					<div class="post-content">
						<p class="post-excerpt">Voyager avec des enfants demande une organisation spécifique. Voici nos destinations favorites qui combinent plaisir pour les petits et les grands...</p>
						<button class="read-more-btn" data-post="7">Lire la suite</button>
					</div>
					
					<div class="post-footer">
						<button class="post-action">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
							</svg>
							<span>145</span>
						</button>
						<button class="post-action">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
							</svg>
							<span>27 commentaires</span>
						</button>
					</div>
				</article>

				<!-- Post 8 -->
				<article class="blog-post" data-tag="Conseils">
					<div class="post-header">
						<div class="post-date">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
								<line x1="16" y1="2" x2="16" y2="6"></line>
								<line x1="8" y1="2" x2="8" y2="6"></line>
								<line x1="3" y1="10" x2="21" y2="10"></line>
							</svg>
							<span>20 septembre 2024</span>
						</div>
						<span class="post-tag">Conseils</span>
					</div>
					
					<h2 class="post-title playfair">Lune de miel : 5 erreurs à éviter</h2>
					
					<div class="post-image">
						<img src="<?= base_url('assets/images/blog4.jpeg') ?>" alt="Lune de miel">
					</div>
					
					<div class="post-content">
						<p class="post-excerpt">Votre lune de miel doit être parfaite. Fort de notre expérience avec des centaines de couples, voici les erreurs courantes à éviter absolument...</p>
						<button class="read-more-btn" data-post="8">Lire la suite</button>
					</div>
					
					<div class="post-footer">
						<button class="post-action">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
							</svg>
							<span>178</span>
						</button>
						<button class="post-action">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
							</svg>
							<span>34 commentaires</span>
						</button>
					</div>
				</article>
			</div>

			<!-- Load More -->
			<div class="load-more">
				<button class="btn btn-outline">Charger plus d'articles</button>
			</div>
		</div>
	</div>
</section>

<!-- CTA Section -->
<section class="blog-cta">
	<div class="blog-cta-container">
		<svg class="cta-icon" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
			<path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path>
			<line x1="7" y1="7" x2="7.01" y2="7"></line>
		</svg>
		
		<h2 class="cta-title playfair">Besoin de conseils personnalisés ?</h2>
		
		<p class="cta-description">
			Nos experts voyages sont à votre disposition pour vous accompagner dans 
			la préparation de votre séjour sur mesure.
		</p>
		
		<a href="<?= base_url('contact') ?>" class="btn btn-primary">Prendre rendez-vous</a>
	</div>
</section>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="<?= base_url('assets/js/blog.js') ?>"></script>
<?= $this->endSection() ?>
