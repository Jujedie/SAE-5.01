document.getElementById('btn-modifier').addEventListener('click', function (e)
{
	e.preventDefault();
	document.getElementById('modifierModal').classList.remove('hidden');
});

document.getElementById('closeModal').addEventListener('click', function ()
{
	document.getElementById('modifierModal').classList.add('hidden');
});