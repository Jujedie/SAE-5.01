<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@300;400;500;600&display=swap');
		
		body { 
			font-family: 'Inter', Arial, sans-serif; 
			line-height: 1.6; 
			color: #2C2C2C;
			background-color: #f5f5f5;
			margin: 0;
			padding: 0;
		}
		.email-wrapper {
			background-color: #f5f5f5;
			padding: 40px 20px;
		}
		.container { 
			max-width: 600px; 
			margin: 0 auto; 
			background-color: #ffffff;
			border-radius: 8px;
			overflow: hidden;
			box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
		}
		.header { 
			background: linear-gradient(135deg, #2C2C2C 0%, #1a1a1a 100%);
			color: white; 
			padding: 40px 30px; 
			text-align: center;
		}
		.header h1 {
			font-family: 'Playfair Display', serif;
			font-size: 28px;
			font-weight: 700;
			margin: 0 0 10px 0;
			color: #C9A96E;
		}
		.header p {
			margin: 0;
			font-size: 14px;
			color: #e0e0e0;
		}
		.content { 
			background-color: #ffffff; 
			padding: 40px 30px;
		}
		.content p {
			margin: 0 0 15px 0;
			color: #4a4a4a;
			font-size: 15px;
		}
		.content p.greeting {
			font-size: 16px;
			font-weight: 500;
			color: #2C2C2C;
		}
		.button-container {
			text-align: center;
			margin: 30px 0;
		}
		.button { 
			display: inline-block; 
			padding: 14px 40px; 
			background-color: #C9A96E;
			color: #ffffff !important; 
			text-decoration: none; 
			border-radius: 6px;
			font-weight: 600;
			font-size: 16px;
			transition: background-color 0.3s ease;
		}
		.button:hover {
			background-color: #b8986a;
		}
		.info-box {
			background-color: #FFF8F0;
			border-left: 4px solid #C9A96E;
			padding: 15px 20px;
			margin: 25px 0;
			border-radius: 4px;
		}
		.info-box p {
			margin: 0;
			font-size: 14px;
			color: #6B5B47;
		}
		.signature {
			margin-top: 30px;
			padding-top: 20px;
			border-top: 1px solid #e0e0e0;
		}
		.signature p {
			margin: 5px 0;
			font-style: italic;
			color: #6a6a6a;
		}
		.signature strong {
			color: #2C2C2C;
			font-weight: 600;
		}
		.footer { 
			background-color: #2C2C2C;
			color: #9a9a9a;
			text-align: center; 
			padding: 30px 20px;
			font-size: 13px;
		}
		.footer p {
			margin: 8px 0;
		}
		.footer .brand {
			color: #C9A96E;
			font-family: 'Playfair Display', serif;
			font-weight: 600;
			font-size: 18px;
			margin-bottom: 10px;
		}
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
