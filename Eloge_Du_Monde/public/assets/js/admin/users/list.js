// Barre de recherche
document.getElementById('searchInput').addEventListener('keyup', function() {
	const searchTerm = this.value.toLowerCase();
	const cards = document.querySelectorAll('.user-card');
	
	cards.forEach(card => {
		const text = card.textContent.toLowerCase();
		card.style.display = text.includes(searchTerm) ? '' : 'none';
	});
});
