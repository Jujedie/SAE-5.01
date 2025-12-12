function filterDestinations() {
	const searchInput = document.getElementById('searchInput').value.toLowerCase();
	const cards = document.querySelectorAll('.destination-card');
	
	cards.forEach(card => {
		const name = card.getAttribute('data-name') || '';
		
		if (name.includes(searchInput)) {
			card.style.display = 'block';
		} else {
			card.style.display = 'none';
		}
	});
}
