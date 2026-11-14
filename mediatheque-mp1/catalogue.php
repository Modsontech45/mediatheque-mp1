<?php
require_once __DIR__ . '/data/livres.php';
require_once __DIR__ . '/includes/fonctions.php';

$titrePage = 'Catalogue';

$categorieParam   = $_GET['categorie'] ?? '';
$categoriesValides = listerCategories($livres);
$erreurCategorie  = false;
$livresAffiches   = [];

if ($categorieParam === '') {
    $livresAffiches = $livres;
} elseif (in_array($categorieParam, $categoriesValides, true)) {
    $livresAffiches = filtrerParCategorie($livres, $categorieParam);
} else {
    $erreurCategorie = true;
    $livresAffiches  = [];
}

require __DIR__ . '/includes/header.php';
?>

<section class="page-titre">
    <h1>Catalogue</h1>
</section>

<nav class="filtre-nav">
    <a href="catalogue.php" class="<?= $categorieParam === '' ? 'actif' : '' ?>">
        Tous les livres
    </a>
    <?php foreach ($categoriesValides as $cat): ?>
        <a href="catalogue.php?categorie=<?= urlencode($cat) ?>"
           class="<?= $categorieParam === $cat ? 'actif' : '' ?>">
            <?= e(ucfirst($cat)) ?>
        </a>
    <?php endforeach; ?>
</nav>

<?php if ($erreurCategorie): ?>
    <div class="message-erreur">
        La catégorie &laquo;&nbsp;<?= e($categorieParam) ?>&nbsp;&raquo; n'existe pas.
        <a href="catalogue.php">Retour au catalogue complet</a>
    </div>
<?php else: ?>
    <p class="compteur">
        <?= e(count($livresAffiches)) ?> livre(s) affiché(s)
        <?= $categorieParam !== '' ? 'dans la catégorie <em>' . e(ucfirst($categorieParam)) . '</em>' : '' ?>
    </p>

    <?php if (empty($livresAffiches)): ?>
        <p class="message-info">Aucun livre dans cette catégorie.</p>
    <?php else: ?>
        <div class="grille-livres">
            <?php foreach ($livresAffiches as $livre): ?>
                <?= afficherLivre($livre) ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
<?php endif; ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
