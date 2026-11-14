<?php
require_once __DIR__ . '/data/livres.php';
require_once __DIR__ . '/includes/fonctions.php';

$titrePage = 'Accueil';
require __DIR__ . '/includes/header.php';

$nbTotal      = count($livres);
$nbDisponibles = compterLivresDisponibles($livres);
?>

<section class="hero">
    <h1>Bienvenue à la Médiathèque IPNET</h1>
    <p class="sous-titre">Votre catalogue de livres en ligne, simple et accessible.</p>
</section>

<section class="stats">
    <div class="stat-carte">
        <span class="stat-nombre"><?= e($nbTotal) ?></span>
        <span class="stat-label">Livres au catalogue</span>
    </div>
    <div class="stat-carte">
        <span class="stat-nombre"><?= e($nbDisponibles) ?></span>
        <span class="stat-label">Livres disponibles</span>
    </div>
    <div class="stat-carte">
        <span class="stat-nombre"><?= e($nbTotal - $nbDisponibles) ?></span>
        <span class="stat-label">Livres empruntés</span>
    </div>
</section>

<section class="accueil-action">
    <p>Découvrez l'ensemble de nos ouvrages&nbsp;: romans, essais, informatique, sciences et histoire.</p>
    <a href="catalogue.php" class="btn-primaire">Voir le catalogue</a>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
