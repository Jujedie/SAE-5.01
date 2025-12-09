window.addEventListener('scroll', function()
{
	const header = document.getElementById('header');
	if (window.scrollY > 50)
	{
		header.classList.add('scrolled');
	}
	else
	{
		header.classList.remove('scrolled');
	}
});

let currentSlide  = 0;
const slides      = document.querySelectorAll('.hero-slide');
const indicators  = document.querySelectorAll('.indicator' );
const totalSlides = slides.length;

function showSlide(index)
{
	slides.forEach(slide => slide.classList.remove('active'));
	indicators.forEach(indicator => indicator.classList.remove('active'));

	slides[index].classList.add('active');
	indicators[index].classList.add('active');
}

function nextSlide()
{
	currentSlide = (currentSlide + 1) % totalSlides;
	showSlide(currentSlide);
}

if (slides.length > 0)
{
	setInterval(nextSlide, 5000);
}

indicators.forEach((indicator, index) =>
{
	indicator.addEventListener('click', () =>
	{
		currentSlide = index;
		showSlide(currentSlide);
	});
});

const observerOptions =
{
	root       : null,
	rootMargin : '0px',
	threshold  : 0.1
};

const observer = new IntersectionObserver((entries) =>
{
	entries.forEach(entry =>
	{
		if (entry.isIntersecting)
		{
			entry.target.classList.add('visible');
		}
	});
}, observerOptions);

document.querySelectorAll('.fade-in').forEach(el =>
{
	observer.observe(el);
});

document.querySelectorAll('a[href^="#"]').forEach(anchor =>
{
	anchor.addEventListener('click', function (e)
	{
		e.preventDefault();
		const target = document.querySelector(this.getAttribute('href'));
		if (target)
		{
			target.scrollIntoView
			({
				behavior: 'smooth',
				block   : 'start'
			});
		}
	});
});