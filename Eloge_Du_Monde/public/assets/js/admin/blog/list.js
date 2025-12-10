// Search functionality
document.getElementById('searchInput').addEventListener('input', function(e) {
	const searchTerm = e.target.value.toLowerCase();
	const temoignageCards = document.querySelectorAll('.temoignage-card');
	
	temoignageCards.forEach(card => {
		const text = card.textContent.toLowerCase();
		if (text.includes(searchTerm)) {
			card.style.display = '';
		} else {
			card.style.display = 'none';
		}
	});
});
