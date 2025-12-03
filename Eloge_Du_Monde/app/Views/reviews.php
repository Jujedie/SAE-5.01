<?= $this->extend('layout/default') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/reviews.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="testimonials-hero">
	<div class="testimonials-hero-overlay">
		<div class="testimonials-hero-decoration top-left"></div>
		<div class="testimonials-hero-decoration bottom-right"></div>
	</div>
	
	<div class="testimonials-hero-content">
		<div class="testimonials-badge">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
				<path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"></path>
				<path d="M15 21c3 0 7-1 7-8V5c0-1.25-.757-2.017-2-2h-4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2h.75c0 2.25.25 4-2.75 4v3c0 1 0 1 1 1z"></path>
			</svg>
			<span>TÉMOIGNAGES CLIENTS</span>
		</div>
		
		<h1 class="testimonials-hero-title playfair">Ils ont voyagé avec nous</h1>
		
		<p class="testimonials-hero-description">
			Découvrez les expériences de nos voyageurs et laissez-vous inspirer pour votre prochain séjour
		</p>

		<!-- Average Rating -->
		<div class="testimonials-rating-box">
			<div class="stars-row">
				<?php for($i = 0; $i < 5; $i++): ?>
				<svg class="star filled" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
					<path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
				</svg>
				<?php endfor; ?>
			</div>
			<div class="rating-divider"></div>
			<div class="rating-text">
				<span class="rating-number playfair">4.9</span>
				<span class="rating-label">/ 5 (12 avis)</span>
			</div>
		</div>
	</div>
</section>

<!-- Testimonials Grid -->
<section class="testimonials-section">
	<div class="testimonials-container">
		<div class="testimonials-content">
			<!-- Add Testimonial Button -->
			<div class="add-testimonial-btn-wrapper">
				<a href="<?= base_url('contact') ?>" class="btn btn-primary">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
						<line x1="12" y1="5" x2="12" y2="19"></line>
						<line x1="5" y1="12" x2="19" y2="12"></line>
					</svg>
					Partager mon expérience
				</a>
			</div>

			<!-- Testimonials Grid -->
			<div class="testimonials-grid">
				<!-- Testimonial 1 -->
				<article class="testimonial-card">
					<div class="testimonial-header">
						<div class="testimonial-author">
							<div class="author-avatar">SM</div>
							<div class="author-info">
								<p class="author-name">Sophie Martin</p>
								<div class="testimonial-date">
									<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
										<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
										<line x1="16" y1="2" x2="16" y2="6"></line>
										<line x1="8" y1="2" x2="8" y2="6"></line>
										<line x1="3" y1="10" x2="21" y2="10"></line>
									</svg>
									<span>3 novembre 2024</span>
								</div>
							</div>
						</div>
						<div class="testimonial-stars">
							<?php for($i = 0; $i < 5; $i++): ?>
							<svg class="star filled" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
								<path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
							</svg>
							<?php endfor; ?>
						</div>
					</div>
					
					<div class="testimonial-destination">
						<span class="destination-badge">Maldives</span>
					</div>
					
					<div class="testimonial-content">
						<svg class="quote-icon" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
							<path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"></path>
						</svg>
						<p class="testimonial-text">Un voyage absolument exceptionnel aux Maldives ! L'équipe d'Éloge du Monde a su comprendre nos attentes et créer un séjour sur mesure qui a dépassé toutes nos espérances. Le choix du resort, les activités proposées, tout était parfait. Une attention particulière aux détails qui fait toute la différence. Nous reviendrons sans hésiter pour notre prochain voyage.</p>
					</div>
				</article>

				<!-- Testimonial 2 -->
				<article class="testimonial-card">
					<div class="testimonial-header">
						<div class="testimonial-author">
							<div class="author-avatar">TD</div>
							<div class="author-info">
								<p class="author-name">Thomas Dubois</p>
								<div class="testimonial-date">
									<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
										<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
										<line x1="16" y1="2" x2="16" y2="6"></line>
										<line x1="8" y1="2" x2="8" y2="6"></line>
										<line x1="3" y1="10" x2="21" y2="10"></line>
									</svg>
									<span>28 octobre 2024</span>
								</div>
							</div>
						</div>
						<div class="testimonial-stars">
							<?php for($i = 0; $i < 5; $i++): ?>
							<svg class="star filled" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
								<path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
							</svg>
							<?php endfor; ?>
						</div>
					</div>
					
					<div class="testimonial-destination">
						<span class="destination-badge">Japon</span>
					</div>
					
					<div class="testimonial-content">
						<svg class="quote-icon" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
							<path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"></path>
						</svg>
						<p class="testimonial-text">Notre lune de miel au Japon restera gravée dans nos mémoires pour toujours. L'organisation était impeccable, les conseils avisés et l'itinéraire parfaitement équilibré entre découvertes culturelles et moments de détente. Les ryokans sélectionnés étaient d'une beauté et d'une authenticité remarquables. Merci pour cette expérience inoubliable !</p>
					</div>
				</article>

				<!-- Testimonial 3 -->
				<article class="testimonial-card">
					<div class="testimonial-header">
						<div class="testimonial-author">
							<div class="author-avatar">ML</div>
							<div class="author-info">
								<p class="author-name">Marie Lefebvre</p>
								<div class="testimonial-date">
									<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
										<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
										<line x1="16" y1="2" x2="16" y2="6"></line>
										<line x1="8" y1="2" x2="8" y2="6"></line>
										<line x1="3" y1="10" x2="21" y2="10"></line>
									</svg>
									<span>20 octobre 2024</span>
								</div>
							</div>
						</div>
						<div class="testimonial-stars">
							<?php for($i = 0; $i < 5; $i++): ?>
							<svg class="star filled" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
								<path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
							</svg>
							<?php endfor; ?>
						</div>
					</div>
					
					<div class="testimonial-destination">
						<span class="destination-badge">Tanzanie</span>
					</div>
					
					<div class="testimonial-content">
						<svg class="quote-icon" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
							<path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"></path>
						</svg>
						<p class="testimonial-text">Première expérience avec une agence de voyages sur mesure et nous sommes conquis ! Notre safari en Tanzanie était tout simplement magique. Chaque détail était pensé, des lodges exceptionnels aux guides passionnants. La réactivité de l'équipe pendant notre voyage nous a rassurés. Un rapport qualité-prix excellent pour un service premium.</p>
					</div>
				</article>

				<!-- Testimonial 4 -->
				<article class="testimonial-card">
					<div class="testimonial-header">
						<div class="testimonial-author">
							<div class="author-avatar">LR</div>
							<div class="author-info">
								<p class="author-name">Laurent Rousseau</p>
								<div class="testimonial-date">
									<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
										<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
										<line x1="16" y1="2" x2="16" y2="6"></line>
										<line x1="8" y1="2" x2="8" y2="6"></line>
										<line x1="3" y1="10" x2="21" y2="10"></line>
									</svg>
									<span>15 octobre 2024</span>
								</div>
							</div>
						</div>
						<div class="testimonial-stars">
							<?php for($i = 0; $i < 4; $i++): ?>
							<svg class="star filled" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
								<path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
							</svg>
							<?php endfor; ?>
							<svg class="star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
								<path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
							</svg>
						</div>
					</div>
					
					<div class="testimonial-destination">
						<span class="destination-badge">Grèce</span>
					</div>
					
					<div class="testimonial-content">
						<svg class="quote-icon" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
							<path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"></path>
						</svg>
						<p class="testimonial-text">Très belle découverte de la Grèce en famille. L'agence a su adapter l'itinéraire à nos enfants tout en nous permettant de profiter pleinement des merveilles grecques. Les hébergements étaient bien choisis avec piscines pour les petits. Seul petit bémol : quelques temps de trajet un peu longs, mais l'équipe a été à l'écoute de nos retours.</p>
					</div>
				</article>

				<!-- Testimonial 5 -->
				<article class="testimonial-card">
					<div class="testimonial-header">
						<div class="testimonial-author">
							<div class="author-avatar">CB</div>
							<div class="author-info">
								<p class="author-name">Camille Bernard</p>
								<div class="testimonial-date">
									<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
										<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
										<line x1="16" y1="2" x2="16" y2="6"></line>
										<line x1="8" y1="2" x2="8" y2="6"></line>
										<line x1="3" y1="10" x2="21" y2="10"></line>
									</svg>
									<span>8 octobre 2024</span>
								</div>
							</div>
						</div>
						<div class="testimonial-stars">
							<?php for($i = 0; $i < 5; $i++): ?>
							<svg class="star filled" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
								<path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
							</svg>
							<?php endfor; ?>
						</div>
					</div>
					
					<div class="testimonial-destination">
						<span class="destination-badge">Patagonie</span>
					</div>
					
					<div class="testimonial-content">
						<svg class="quote-icon" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
							<path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"></path>
						</svg>
						<p class="testimonial-text">Un trek en Patagonie organisé de main de maître ! Nous qui aimons l'aventure, nous avons été servis. Les guides locaux étaient fantastiques, l'équipement fourni de qualité et les paysages à couper le souffle. L'équipe d'Éloge du Monde a su trouver le parfait équilibre entre challenge sportif et confort. Bravo !</p>
					</div>
				</article>

				<!-- Testimonial 6 -->
				<article class="testimonial-card">
					<div class="testimonial-header">
						<div class="testimonial-author">
							<div class="author-avatar">JM</div>
							<div class="author-info">
								<p class="author-name">Julien Moreau</p>
								<div class="testimonial-date">
									<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
										<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
										<line x1="16" y1="2" x2="16" y2="6"></line>
										<line x1="8" y1="2" x2="8" y2="6"></line>
										<line x1="3" y1="10" x2="21" y2="10"></line>
									</svg>
									<span>2 octobre 2024</span>
								</div>
							</div>
						</div>
						<div class="testimonial-stars">
							<?php for($i = 0; $i < 5; $i++): ?>
							<svg class="star filled" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
								<path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
							</svg>
							<?php endfor; ?>
						</div>
					</div>
					
					<div class="testimonial-destination">
						<span class="destination-badge">Costa Rica</span>
					</div>
					
					<div class="testimonial-content">
						<svg class="quote-icon" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
							<path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"></path>
						</svg>
						<p class="testimonial-text">Notre voyage au Costa Rica était une réussite totale ! Nous souhaitions un séjour écologique et riche en découvertes nature, et nos attentes ont été comblées. L'observation des animaux, les hébergements eco-friendly, les activités variées... Tout était parfaitement orchestré. Les enfants parlent encore des paresseux et des singes ! Merci pour ces souvenirs précieux.</p>
					</div>
				</article>

				<!-- Testimonial 7 -->
				<article class="testimonial-card">
					<div class="testimonial-header">
						<div class="testimonial-author">
							<div class="author-avatar">IG</div>
							<div class="author-info">
								<p class="author-name">Isabelle Garnier</p>
								<div class="testimonial-date">
									<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
										<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
										<line x1="16" y1="2" x2="16" y2="6"></line>
										<line x1="8" y1="2" x2="8" y2="6"></line>
										<line x1="3" y1="10" x2="21" y2="10"></line>
									</svg>
									<span>25 septembre 2024</span>
								</div>
							</div>
						</div>
						<div class="testimonial-stars">
							<?php for($i = 0; $i < 5; $i++): ?>
							<svg class="star filled" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
								<path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
							</svg>
							<?php endfor; ?>
						</div>
					</div>
					
					<div class="testimonial-destination">
						<span class="destination-badge">Grèce - Santorini</span>
					</div>
					
					<div class="testimonial-content">
						<svg class="quote-icon" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
							<path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"></path>
						</svg>
						<p class="testimonial-text">Santorini pour notre anniversaire de mariage, un choix inspiré ! Le niveau de service et la qualité des prestations étaient irréprochables. L'hôtel avec vue sur la caldeira était sublime, le dîner romantique organisé pour l'occasion était parfait. L'équipe a pensé à tout, y compris des surprises qui nous ont beaucoup touchés. Une expérience luxueuse sans être ostentatoire.</p>
					</div>
				</article>

				<!-- Testimonial 8 -->
				<article class="testimonial-card">
					<div class="testimonial-header">
						<div class="testimonial-author">
							<div class="author-avatar">PB</div>
							<div class="author-info">
								<p class="author-name">Pierre Blanc</p>
								<div class="testimonial-date">
									<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
										<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
										<line x1="16" y1="2" x2="16" y2="6"></line>
										<line x1="8" y1="2" x2="8" y2="6"></line>
										<line x1="3" y1="10" x2="21" y2="10"></line>
									</svg>
									<span>18 septembre 2024</span>
								</div>
							</div>
						</div>
						<div class="testimonial-stars">
							<?php for($i = 0; $i < 4; $i++): ?>
							<svg class="star filled" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
								<path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
							</svg>
							<?php endfor; ?>
							<svg class="star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
								<path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
							</svg>
						</div>
					</div>
					
					<div class="testimonial-destination">
						<span class="destination-badge">Islande</span>
					</div>
					
					<div class="testimonial-content">
						<svg class="quote-icon" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
							<path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"></path>
						</svg>
						<p class="testimonial-text">Voyage en Islande magnifiquement organisé. Les paysages étaient époustouflants et l'itinéraire très bien conçu pour voir l'essentiel en deux semaines. Les hébergements étaient confortables et bien situés. Nous aurions aimé un peu plus de temps libre pour explorer par nous-mêmes, mais dans l'ensemble une excellente prestation qui nous a permis de découvrir cette île fascinante.</p>
					</div>
				</article>

				<!-- Testimonial 9 -->
				<article class="testimonial-card">
					<div class="testimonial-header">
						<div class="testimonial-author">
							<div class="author-avatar">EP</div>
							<div class="author-info">
								<p class="author-name">Émilie Petit</p>
								<div class="testimonial-date">
									<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
										<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
										<line x1="16" y1="2" x2="16" y2="6"></line>
										<line x1="8" y1="2" x2="8" y2="6"></line>
										<line x1="3" y1="10" x2="21" y2="10"></line>
									</svg>
									<span>12 septembre 2024</span>
								</div>
							</div>
						</div>
						<div class="testimonial-stars">
							<?php for($i = 0; $i < 5; $i++): ?>
							<svg class="star filled" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
								<path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
							</svg>
							<?php endfor; ?>
						</div>
					</div>
					
					<div class="testimonial-destination">
						<span class="destination-badge">Bali</span>
					</div>
					
					<div class="testimonial-content">
						<svg class="quote-icon" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
							<path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"></path>
						</svg>
						<p class="testimonial-text">Un séjour à Bali absolument paradisiaque ! L'équipe a su créer un itinéraire équilibré entre plages, rizières, temples et bien-être. Les hôtels sélectionnés étaient tous magnifiques, particulièrement celui à Ubud avec vue sur la jungle. Les expériences culturelles proposées (cours de cuisine, cérémonie traditionnelle) ont enrichi notre voyage. Service impeccable du début à la fin !</p>
					</div>
				</article>

				<!-- Testimonial 10 -->
				<article class="testimonial-card">
					<div class="testimonial-header">
						<div class="testimonial-author">
							<div class="author-avatar">AR</div>
							<div class="author-info">
								<p class="author-name">Antoine Roux</p>
								<div class="testimonial-date">
									<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
										<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
										<line x1="16" y1="2" x2="16" y2="6"></line>
										<line x1="8" y1="2" x2="8" y2="6"></line>
										<line x1="3" y1="10" x2="21" y2="10"></line>
									</svg>
									<span>5 septembre 2024</span>
								</div>
							</div>
						</div>
						<div class="testimonial-stars">
							<?php for($i = 0; $i < 5; $i++): ?>
							<svg class="star filled" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
								<path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
							</svg>
							<?php endfor; ?>
						</div>
					</div>
					
					<div class="testimonial-destination">
						<span class="destination-badge">Pérou</span>
					</div>
					
					<div class="testimonial-content">
						<svg class="quote-icon" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
							<path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"></path>
						</svg>
						<p class="testimonial-text">Notre circuit au Pérou était extraordinaire ! De Lima au Machu Picchu en passant par le lac Titicaca, chaque étape était fascinante. L'organisation du trek du chemin de l'Inca était parfaite, avec des porteurs et un guide exceptionnel. Les hôtels choisis alliaient charme et confort. Éloge du Monde a transformé notre rêve en réalité. Merci infiniment !</p>
					</div>
				</article>

				<!-- Testimonial 11 -->
				<article class="testimonial-card">
					<div class="testimonial-header">
						<div class="testimonial-author">
							<div class="author-avatar">CD</div>
							<div class="author-info">
								<p class="author-name">Claire Durand</p>
								<div class="testimonial-date">
									<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
										<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
										<line x1="16" y1="2" x2="16" y2="6"></line>
										<line x1="8" y1="2" x2="8" y2="6"></line>
										<line x1="3" y1="10" x2="21" y2="10"></line>
									</svg>
									<span>28 août 2024</span>
								</div>
							</div>
						</div>
						<div class="testimonial-stars">
							<?php for($i = 0; $i < 5; $i++): ?>
							<svg class="star filled" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
								<path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
							</svg>
							<?php endfor; ?>
						</div>
					</div>
					
					<div class="testimonial-destination">
						<span class="destination-badge">Polynésie française</span>
					</div>
					
					<div class="testimonial-content">
						<svg class="quote-icon" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
							<path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"></path>
						</svg>
						<p class="testimonial-text">Voyage de noces en Polynésie française absolument magique ! Bora Bora, Moorea, Tahiti... Chaque île était plus belle que la précédente. Les bungalows sur pilotis, les lagons turquoise, les repas gastronomiques, tout était parfait. L'équipe a su créer une atmosphère romantique à chaque étape. Un voyage qui restera gravé dans nos cœurs pour toujours.</p>
					</div>
				</article>

				<!-- Testimonial 12 -->
				<article class="testimonial-card">
					<div class="testimonial-header">
						<div class="testimonial-author">
							<div class="author-avatar">NS</div>
							<div class="author-info">
								<p class="author-name">Nicolas Simon</p>
								<div class="testimonial-date">
									<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
										<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
										<line x1="16" y1="2" x2="16" y2="6"></line>
										<line x1="8" y1="2" x2="8" y2="6"></line>
										<line x1="3" y1="10" x2="21" y2="10"></line>
									</svg>
									<span>20 août 2024</span>
								</div>
							</div>
						</div>
						<div class="testimonial-stars">
							<?php for($i = 0; $i < 4; $i++): ?>
							<svg class="star filled" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
								<path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
							</svg>
							<?php endfor; ?>
							<svg class="star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
								<path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
							</svg>
						</div>
					</div>
					
					<div class="testimonial-destination">
						<span class="destination-badge">Vietnam & Cambodge</span>
					</div>
					
					<div class="testimonial-content">
						<svg class="quote-icon" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
							<path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"></path>
						</svg>
						<p class="testimonial-text">Très beau voyage au Vietnam et Cambodge. La combinaison des deux pays était excellente et nous a permis de découvrir une diversité culturelle incroyable. Baie d'Halong, temples d'Angkor, Delta du Mékong... Des moments inoubliables. Parfois un peu de fatigue avec les déplacements, mais c'est le prix à payer pour voir autant de choses. Globalement très satisfaits !</p>
					</div>
				</article>
			</div>
		</div>
	</div>
</section>

<!-- CTA Section -->
<section class="testimonials-cta">
	<div class="testimonials-cta-container">
		<svg class="cta-icon" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
			<path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"></path>
			<path d="M15 21c3 0 7-1 7-8V5c0-1.25-.757-2.017-2-2h-4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2h.75c0 2.25.25 4-2.75 4v3c0 1 0 1 1 1z"></path>
		</svg>
		
		<h2 class="cta-title playfair">Prêt à vivre votre propre aventure ?</h2>
		
		<p class="cta-description">
			Rejoignez nos voyageurs comblés et laissez-nous créer pour vous 
			un séjour sur mesure qui dépassera vos attentes.
		</p>
		
		<div class="cta-buttons">
			<a href="<?= base_url('creer-voyage') ?>" class="btn btn-primary">Créer mon voyage</a>
			<a href="<?= base_url('destinations') ?>" class="btn btn-outline">Découvrir nos destinations</a>
		</div>
	</div>
</section>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="<?= base_url('assets/js/reviews.js') ?>"></script>
<?= $this->endSection() ?>
