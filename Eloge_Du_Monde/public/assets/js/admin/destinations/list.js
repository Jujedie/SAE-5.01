let baseUrl = '';

// Fonction pour initialiser l'URL de base
function initBaseUrl(url) {
	baseUrl = url;
}

function editDestination(id) {
	window.location.href = baseUrl + 'admin/destinations/edit/' + id;
}

function deleteDestination(id) {
	if (confirm('Êtes-vous sûr de vouloir supprimer cette destination ?')) {
		fetch(baseUrl + 'admin/destinations/delete/' + id, {
			method: 'POST',
			headers: {
				'X-Requested-With': 'XMLHttpRequest'
			}
		})
		.then(response => response.json())
		.then(data => {
			if (data.success) {
				location.reload();
			}
		});
	}
}

// Search functionality
document.getElementById('searchInput').addEventListener('keyup', function() {
	const searchTerm = this.value.toLowerCase();
	const cards = document.querySelectorAll('.destination-card');
	
	cards.forEach(card => {
		const text = card.textContent.toLowerCase();
		card.style.display = text.includes(searchTerm) ? '' : 'none';
	});
});
