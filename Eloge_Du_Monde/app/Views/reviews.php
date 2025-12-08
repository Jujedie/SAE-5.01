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
	
	<div class="testimonials-hero-content" style="margin-top: 5rem;">
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
				<?php $hollowStars = 5 - round($average) ?>
				<?php for ($j = 0 ; $j < round($average) ; $j++): ?>
					<svg class="star filled" fill="currentColor" viewBox="0 0 20 20">
						<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
					</svg>
				<?php endfor; ?>
				<?php for ($k = 0 ; $k < $hollowStars ; $k++): ?>
					<svg class="star hollow" fill="none" stroke="currentColor" viewBox="0 0 20 20">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
					</svg>
				<?php endfor; ?>
			</div>
			<div class="rating-divider"></div>
			<div class="rating-text">
				<span class="rating-number playfair"><?= number_format($average, 1) ?></span>
				<span class="rating-label">/ 5 (<?= $count ?> avis)</span>
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
				<?php for ($i = 0; $i < count($reviews); $i++): ?>
					<article class="testimonial-card">
						<div class="testimonial-header">
							<div class="testimonial-author">
								<div class="author-avatar"><?= $users[$i]['firstName'][0] ?><?= $users[$i]['lastName'][0] ?></div>
								<div class="author-info">
									<p class="author-name"><?= $users[$i]['firstName'] ?> <?= $users[$i]['lastName'] ?></p>
									<div class="testimonial-date">
										<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
											<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
											<line x1="16" y1="2" x2="16" y2="6"></line>
											<line x1="8" y1="2" x2="8" y2="6"></line>
											<line x1="3" y1="10" x2="21" y2="10"></line>
										</svg>
										<span><?= date('d/m/Y', strtotime($reviews[$i]['date'])) ?></span>
									</div>
								</div>
							</div>
							<div class="testimonial-stars">
								<?php $hollowStars = 5 - $reviews[$i]['rating']; ?>
								<?php for ($j = 0 ; $j < $reviews[$i]['rating'] ; $j++): ?>
									<svg class="star filled" fill="currentColor" viewBox="0 0 20 20">
										<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
									</svg>
								<?php endfor; ?>
								<?php for ($k = 0 ; $k < $hollowStars ; $k++): ?>
									<svg class="star hollow" fill="none" stroke="currentColor" viewBox="0 0 20 20">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
									</svg>
								<?php endfor; ?>
							</div>
						</div>
						
						<div class="testimonial-content">
							<svg class="quote-icon" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"></path>
							</svg>
							<p class="testimonial-text"><?= $reviews[$i]['content'] ?></p>
						</div>
					</article>
				<?php endfor; ?>
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
