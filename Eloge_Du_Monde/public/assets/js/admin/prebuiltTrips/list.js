function filterTrips() {
	const searchInput = document.getElementById('searchInput').value.toLowerCase();
	const cards = document.querySelectorAll('.voyage-card');
	
	cards.forEach(card => {
		const title = card.getAttribute('data-title') || '';
		const thematic = card.getAttribute('data-thematic') || '';
		
		if (title.includes(searchInput) || thematic.includes(searchInput)) {
			card.style.display = 'block';
		} else {
			card.style.display = 'none';
		}
	});
}

function toggleExtensions(tripId) {
	const container = document.getElementById('extensions-' + tripId);
	if (container) {
		container.classList.toggle('active');
	}
}
