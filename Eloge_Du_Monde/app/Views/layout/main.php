<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Éloge du Monde - Voyages sur mesure' ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/home.css') ?>">
    <?= $this->renderSection('styles') ?>
</head>
<body>
    <?= $this->include('layout/header') ?>
    
    <main>
        <?= $this->renderSection('content') ?>
    </main>
    
    <?= $this->include('layout/footer') ?>
    
    <?= $this->renderSection('scripts') ?>
</body>
</html>
