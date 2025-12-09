document.addEventListener('DOMContentLoaded', function()
{
	const semestreFilter  = document.getElementById('semestreFilter' );
	const ressourceSelect = document.getElementById('ressourceSelect');
	
	if (!semestreFilter || !ressourceSelect) return;
	
	const allOptions = Array.from(ressourceSelect.options);
	
	semestreFilter.addEventListener('change', function()
	{
		const selectedSemestre = this.value;

		// Restaurer toutes les options
		ressourceSelect.innerHTML = '';
		allOptions.forEach(option =>
		{
			ressourceSelect.appendChild(option.cloneNode(true));
		});

		// Filtrer si un semestre est sélectionné
		if (selectedSemestre)
		{
			const options = ressourceSelect.options;
			for (let cpt = options.length - 1; cpt >= 0; cpt--)
			{
				const option = options[cpt];
				if (option.value && option.dataset.semestre !== selectedSemestre)
				{
					ressourceSelect.remove(cpt);
				}
			}
		}

		// Réinitialiser la sélection
		ressourceSelect.value = '';
	});
});