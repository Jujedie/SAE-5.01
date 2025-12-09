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
});