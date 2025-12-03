// Masquer automatiquement les notifications après 5 secondes
document.addEventListener('DOMContentLoaded', function()
{
	const notifications = document.querySelectorAll('.toast');
	notifications.forEach(notification =>
	{
		setTimeout(() =>
		{
			const bsNotification = new bootstrap.Toast(notification);
			bsNotification.hide();
		}, 5000);
	});
});