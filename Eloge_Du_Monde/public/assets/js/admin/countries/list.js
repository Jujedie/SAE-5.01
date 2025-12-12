function filterCountries() {
	const searchInput = document.getElementById('searchInput').value.toLowerCase();
	const cards = document.querySelectorAll('.country-card');
	
	cards.forEach(card => {
		const name = card.getAttribute('data-name') || '';
		const continent = card.getAttribute('data-continent') || '';
		
		if (name.includes(searchInput) || continent.includes(searchInput)) {
			card.style.display = 'block';
		} else {
			card.style.display = 'none';
		}
	});
}
