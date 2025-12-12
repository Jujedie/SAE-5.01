document.addEventListener('DOMContentLoaded', function()
{
	const observerOptions =
	{
		threshold : 0.1,
		rootMargin: '0px 0px -50px 0px'
	};

	const observer = new IntersectionObserver((entries) =>
	{
		entries.forEach((entry, index) =>
		{
			if (entry.isIntersecting)
			{
				setTimeout(() =>
				{
					entry.target.style.opacity   = '1';
					entry.target.style.transform = 'translateY(0)';
				}, index * 100);
			}
		});
	}, observerOptions);

	const testimonialCards = document.querySelectorAll('.testimonial-card');
	testimonialCards.forEach((card, index) =>
	{
		card.style.opacity         = '0';
		card.style.transform       = 'translateY(30px)';
		card.style.transition      = 'opacity 0.6s ease, transform 0.6s ease';
		card.style.animationDelay  = `${index * 0.1}s`;
		observer.observe(card);
	});

	const ctaButtons = document.querySelectorAll('.cta-buttons a');
	ctaButtons.forEach(button =>
	{
		button.addEventListener('click', function(e)
		{
			if (this.getAttribute('href').startsWith('#'))
			{
				e.preventDefault();
				const targetId      = this.getAttribute('href');
				const targetElement = document.querySelector(targetId);

				if (targetElement)
				{
					targetElement.scrollIntoView
					({
						behavior: 'smooth',
						block   : 'start'
					});
				}
			}
		});
	});

	testimonialCards.forEach(card =>
	{
		card.addEventListener('mouseenter', function()
		{
			this.style.transform = 'translateY(-8px)';
		});

		card.addEventListener('mouseleave', function()
		{
			this.style.transform = 'translateY(0)';
		});
	});

	const calculateAverageRating = () =>
	{
		const allStars         = document.querySelectorAll('.testimonial-stars');
		let totalRating        = 0;
		let totalTestimonials  = allStars.length;

		allStars.forEach(stars =>
		{
			const filledStars = stars.querySelectorAll('.star.filled');
			totalRating += filledStars.length;
		});

		const average = (totalRating / totalTestimonials).toFixed(1);

		const ratingNumber = document.querySelector('.rating-number');
		const ratingLabel  = document.querySelector('.rating-label' );
		
		if (ratingNumber && ratingLabel)
		{
			ratingNumber.textContent = average;
			ratingLabel.textContent  = `/ 5 (${totalTestimonials} avis)`;
		}
	};

	calculateAverageRating();

	const ratingBox = document.querySelector('.testimonials-rating-box');
	if (ratingBox)
	{
		setTimeout(() =>
		{
			ratingBox.style.opacity    = '0';
			ratingBox.style.transform  = 'scale(0.9)';
			ratingBox.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
			
			setTimeout(() =>
			{
				ratingBox.style.opacity   = '1';
				ratingBox.style.transform = 'scale(1)';
			}, 300);
		}, 100);
	}

	// Modal functionality
	const openModalBtn = document.getElementById('openReviewModal');
	const closeModalBtn = document.getElementById('closeReviewModal');
	const cancelModalBtn = document.getElementById('cancelReviewModal');
	const modalOverlay = document.getElementById('reviewModalOverlay');
	
	if (openModalBtn) {
		openModalBtn.addEventListener('click', function() {
			modalOverlay.classList.add('active');
			document.body.style.overflow = 'hidden'; // Prevent scrolling
		});
	}
	
	if (closeModalBtn) {
		closeModalBtn.addEventListener('click', function() {
			closeModal();
		});
	}
	
	if (cancelModalBtn) {
		cancelModalBtn.addEventListener('click', function() {
			closeModal();
		});
	}
	
	// Close modal when clicking outside
	if (modalOverlay) {
		modalOverlay.addEventListener('click', function(e) {
			if (e.target === modalOverlay) {
				closeModal();
			}
		});
	}
	
	function closeModal() {
		modalOverlay.classList.remove('active');
		document.body.style.overflow = ''; // Restore scrolling
		// Reset form
		ratingInput.value = '';
		starInputs.forEach(s => {
			s.style.fill = 'none';
			s.style.stroke = 'currentColor';
		});
		document.getElementById('content').value = '';
	}
	
	// Close modal with Escape key
	document.addEventListener('keydown', function(e) {
		if (e.key === 'Escape' && modalOverlay.classList.contains('active')) {
			closeModal();
		}
	});

	// Star rating system for modal
	const starInputs = document.querySelectorAll('.star-input');
	const ratingInput = document.getElementById('rating');
	
	starInputs.forEach(star => {
		star.addEventListener('click', function() {
			const value = parseInt(this.getAttribute('data-value'));
			ratingInput.value = value;
			
			// Update visual state of stars
			starInputs.forEach((s, index) => {
				if (index < value) {
					s.style.fill = '#C9A96E';
					s.style.stroke = '#C9A96E';
				} else {
					s.style.fill = 'none';
					s.style.stroke = 'currentColor';
				}
			});
		});
		
		// Hover effect
		star.addEventListener('mouseenter', function() {
			const value = parseInt(this.getAttribute('data-value'));
			starInputs.forEach((s, index) => {
				if (index < value) {
					s.style.opacity = '0.7';
				}
			});
		});
		
		star.addEventListener('mouseleave', function() {
			starInputs.forEach(s => {
				s.style.opacity = '1';
			});
		});
	});
});