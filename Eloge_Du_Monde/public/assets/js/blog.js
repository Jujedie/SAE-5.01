// Blog Page JavaScript

document.addEventListener('DOMContentLoaded', function() {
	// Filter functionality
	const filterButtons = document.querySelectorAll('.filter-btn');
	const blogPosts = document.querySelectorAll('.blog-post');
	const filterCount = document.getElementById('filterCount');

	filterButtons.forEach(button => {
		button.addEventListener('click', function() {
			const filter = this.getAttribute('data-filter');
			
			// Update active button
			filterButtons.forEach(btn => btn.classList.remove('active'));
			this.classList.add('active');
			
			// Filter posts
			let visibleCount = 0;
			blogPosts.forEach(post => {
				const postTag = post.getAttribute('data-tag');
				
				if (filter === 'all' || postTag === filter) {
					post.classList.remove('hidden');
					post.style.display = 'block';
					visibleCount++;
				} else {
					post.classList.add('hidden');
					post.style.display = 'none';
				}
			});
			
			// Update count
			if (filterCount) {
				filterCount.textContent = `${visibleCount} article${visibleCount > 1 ? 's' : ''}${filter !== 'all' ? ' dans la catégorie "' + filter + '"' : ''}`;
			}
		});
	});

	// Read more functionality (expandable posts)
	const readMoreButtons = document.querySelectorAll('.read-more-btn');
	
	readMoreButtons.forEach(button => {
		button.addEventListener('click', function() {
			const postContent = this.closest('.post-content');
			const fullContent = postContent.querySelector('.post-full-content');
			
			// Toggle expanded state
			if (fullContent.style.display === 'none') {
				fullContent.style.display = 'block';
				this.textContent = 'Voir moins';
			} else {
				fullContent.style.display = 'none';
				this.textContent = 'Lire la suite';
				// Scroll back to post
				this.closest('.blog-post').scrollIntoView({ behavior: 'smooth', block: 'start' });
			}
		});
	});

	// Like button interaction
	const likeButtons = document.querySelectorAll('.post-action:first-child');
	
	likeButtons.forEach(button => {
		button.addEventListener('click', function() {
			const likeCount = this.querySelector('span');
			const currentCount = parseInt(likeCount.textContent);
			
			// Toggle liked state
			if (this.classList.contains('liked')) {
				this.classList.remove('liked');
				likeCount.textContent = currentCount - 1;
				this.querySelector('svg').style.fill = 'none';
			} else {
				this.classList.add('liked');
				likeCount.textContent = currentCount + 1;
				this.querySelector('svg').style.fill = 'currentColor';
			}
		});
	});

	// Fade in animations on scroll
	const observerOptions = {
		threshold: 0.1,
		rootMargin: '0px 0px -50px 0px'
	};

	const observer = new IntersectionObserver((entries) => {
		entries.forEach(entry => {
			if (entry.isIntersecting) {
				entry.target.style.opacity = '1';
				entry.target.style.transform = 'translateY(0)';
			}
		});
	}, observerOptions);

	blogPosts.forEach(post => {
		post.style.opacity = '0';
		post.style.transform = 'translateY(30px)';
		post.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
		observer.observe(post);
	});

	// Tag click functionality
	const postTags = document.querySelectorAll('.post-tag');
	
	postTags.forEach(tag => {
		tag.addEventListener('click', function() {
			const tagName = this.textContent;
			const targetButton = Array.from(filterButtons).find(btn => 
				btn.getAttribute('data-filter') === tagName
			);
			
			if (targetButton) {
				targetButton.click();
				// Scroll to top of posts section
				document.querySelector('.blog-filters').scrollIntoView({ 
					behavior: 'smooth', 
					block: 'start' 
				});
			}
		});
	});

	// Load more functionality (placeholder)
	const loadMoreBtn = document.querySelector('.load-more button');
	
	if (loadMoreBtn) {
		loadMoreBtn.addEventListener('click', function() {
			// This would typically load more posts via AJAX
			console.log('Loading more posts...');
			// For now, just disable the button
			this.textContent = 'Tous les articles chargés';
			this.disabled = true;
			this.style.opacity = '0.5';
			this.style.cursor = 'not-allowed';
		});
	}
});
