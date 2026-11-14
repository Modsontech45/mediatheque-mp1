<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($titrePage ?? 'Médiathèque IPNET') ?> | Médiathèque IPNET</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?= e($baseUrl ?? '') ?>css/style.css">
</head>
<body>
    <header class="site-header">
        <div class="header-inner">
            <a href="<?= e($baseUrl ?? '') ?>index.php" class="logo">
                <i class="fas fa-book"></i> Médiathèque IPNET
            </a>
            <nav class="nav-principale">
                <a href="<?= e($baseUrl ?? '') ?>index.php">Accueil</a>
                <a href="<?= e($baseUrl ?? '') ?>catalogue.php">Catalogue</a>
                <a href="<?= e($baseUrl ?? '') ?>apropos.php">À propos</a>
            </nav>
        </div>
    </header>
    <main class="contenu-principal">
