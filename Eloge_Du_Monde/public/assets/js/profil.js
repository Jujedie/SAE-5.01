document.addEventListener('DOMContentLoaded', function()
{
	const semestreFilter = document.getElementById('semestreFilter');
	const ressourceSelect = document.getElementById('ressourceSelect');
	
	if (!semestreFilter || !ressourceSelect) return;
	
	const allOptions = Array.from(ressourceSelect.options);
	
	semestreFilter.addEventListener('change', function()
	{
		const selectedSemestre = this.value;

		// Restaurer toutes les options
		ressourceSelect.innerHTML = '';
		allOptions.forEach(option =>{ressourceSelect.appendChild(option.cloneNode(true));});

		// Filtrer si un semestre est sélectionné
		if (selectedSemestre)
		{
			const options = ressourceSelect.options;
			for (let i = options.length - 1; i >= 0; i--)
			{
				const option = options[i];
				if (option.value && option.dataset.semestre !== selectedSemestre)
				{
					ressourceSelect.remove(i);
				}
			}
		}

		// Réinitialiser la sélection
		ressourceSelect.value = '';
	});
});