<?= $this->extend('layouts/email') ?>

<?= $this->section('emailTitle') ?>Réinitialisation de mot de passe<?= $this->endSection() ?>

<?= $this->section('content') ?>
<p class="greeting">Bonjour,</p>
<p>Vous avez demandé à réinitialiser le mot de passe de votre compte <strong>Éloge du Monde</strong>.</p>
<p>Pour créer un nouveau mot de passe et retrouver l'accès à votre compte, cliquez sur le bouton ci-dessous :</p>

<div class="button-container">
	<a href="<?= esc($resetLink) ?>" class="button">Réinitialiser mon mot de passe</a>
</div>

<div class="info-box">
	<p><strong>⏱️ Important :</strong> Ce lien de réinitialisation est valable pendant <strong>1 heure</strong> seulement pour des raisons de sécurité.</p>
</div>

<p>Si vous n'avez pas demandé cette réinitialisation de mot de passe, vous pouvez ignorer cet email en toute sécurité. Votre compte reste sécurisé.</p>
<?= $this->endSection() ?>
