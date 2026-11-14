<?php
require_once __DIR__ . '/data/livres.php';
require_once __DIR__ . '/includes/fonctions.php';

$titrePage = 'Détail du livre';

// Validation de l'identifiant reçu en GET
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($id === null) {
    $erreur = 'Aucun livre sélectionné. Veuillez choisir un livre dans le catalogue.';
    $livre  = null;
} elseif ($id === false) {
    $erreur = 'Identifiant invalide. L\'identifiant doit être un nombre entier.';
    $livre  = null;
} else {
    $livre  = trouverLivreParId($livres, $id);
    $erreur = $livre === null ? 'Livre introuvable. Cet identifiant ne correspond à aucun ouvrage.' : null;
}

if ($livre !== null) {
    $titrePage = $livre['titre'];
}

require __DIR__ . '/includes/header.php';
?>

<section class="page-titre">
    <h1>Détail du livre</h1>
</section>

<?php if ($erreur !== null): ?>
    <div class="message-erreur">
        <?= e($erreur) ?>
        <br><a href="catalogue.php">&larr; Retour au catalogue</a>
    </div>

<?php else: ?>
    <article class="detail-livre">
        <h2><?= e($livre['titre']) ?></h2>

        <table class="table-detail">
            <tr>
                <th>Auteur</th>
                <td><?= e($livre['auteur']) ?></td>
            </tr>
            <tr>
                <th>Année</th>
                <td><?= e($livre['annee']) ?></td>
            </tr>
            <tr>
                <th>Catégorie</th>
                <td><?= e(ucfirst($livre['categorie'])) ?></td>
            </tr>
            <tr>
                <th>Prix</th>
                <td><?= e(formaterPrix((float) $livre['prix'])) ?> FCFA</td>
            </tr>
            <tr>
                <th>Disponibilité</th>
                <td>
                    <span class="badge <?= $livre['disponible'] ? 'disponible' : 'indisponible' ?>">
                        <?= $livre['disponible'] ? 'Disponible' : 'Non disponible' ?>
                    </span>
                </td>
            </tr>
        </table>

        <a href="catalogue.php?categorie=<?= urlencode($livre['categorie']) ?>" class="lien-retour">
            &larr; Autres livres dans &laquo;&nbsp;<?= e(ucfirst($livre['categorie'])) ?>&nbsp;&raquo;
        </a>
        &nbsp;|&nbsp;
        <a href="catalogue.php" class="lien-retour">Tout le catalogue</a>
    </article>
<?php endif; ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
