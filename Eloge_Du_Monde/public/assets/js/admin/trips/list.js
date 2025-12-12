function filterTrips() {
	const searchInput = document.getElementById('searchInput').value.toLowerCase();
	const cards = document.querySelectorAll('.voyage-card');
	
	cards.forEach(card => {
		const type = card.getAttribute('data-type') || '';
		const text = card.textContent.toLowerCase();
		
		if (type.includes(searchInput) || text.includes(searchInput)) {
			card.style.display = 'block';
		} else {
			card.style.display = 'none';
		}
	});
}
