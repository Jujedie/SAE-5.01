document.addEventListener('DOMContentLoaded', function()
{
	const notifications = document.querySelectorAll('.notification-toast');
	
	notifications.forEach((notification, index) =>
	{
		// Délai progressif pour les multiples notifications
		const delay = index * 150;

		setTimeout(() =>
		{
			notification.style.opacity   = '1';
			notification.style.transform = 'translateX(0)';
		}, delay);

		// Masquer automatiquement après 5 secondes + délai
		setTimeout(() =>
		{
			notification.style.opacity   = '0';
			notification.style.transform = 'translateX(100%)';

			setTimeout(() =>
			{
				notification.remove();
			}, 500);
		}, 5000 + delay);
	});
});