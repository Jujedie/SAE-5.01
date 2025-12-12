function filterReservations() {
	const searchInput = document.getElementById('searchInput').value.toLowerCase();
	const rows = document.querySelectorAll('.reservation-row');
	
	rows.forEach(row => {
		const client = row.getAttribute('data-client') || '';
		const email = row.getAttribute('data-email') || '';
		const destinations = row.getAttribute('data-destinations') || '';
		
		if (client.includes(searchInput) || email.includes(searchInput) || destinations.includes(searchInput)) {
			row.style.display = '';
		} else {
			row.style.display = 'none';
		}
	});
}
