<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		<?= file_get_contents(FCPATH . 'assets/css/email.css') ?>
	</style>
</head>
<body>
	<div class="email-wrapper">
		<div class="container">
			<div class="header">
				<h1>Éloge du Monde</h1>
				<p><?= $this->renderSection('emailTitle') ?></p>
			</div>
			<div class="content">
				<?= $this->renderSection('content') ?>
				
				<div class="signature">
					<p>Cordialement,</p>
					<p><strong>L'équipe Éloge du Monde</strong></p>
					<p style="font-size: 13px; font-style: normal; color: #888;">Votre agence de voyages d'exception</p>
				</div>
			</div>
			<div class="footer">
				<p class="brand">Éloge du Monde</p>
				<p>Département Informatique - IUT du Havre - Groupe 1</p>
				<p>&copy; <?= date('Y') ?> Éloge du Monde - Tous droits réservés</p>
			</div>
		</div>
	</div>
</body>
</html>