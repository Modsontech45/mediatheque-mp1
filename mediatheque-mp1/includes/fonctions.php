<?php
declare(strict_types=1);

date_default_timezone_set('Africa/Lome');

function e(string|int|float $valeur): string
{
    return htmlspecialchars((string) $valeur, ENT_QUOTES, 'UTF-8');
}

function afficherLivre(array $livre): string
{
    $dispo      = $livre['disponible'] ? 'Oui' : 'Non';
    $dispoClass = $livre['disponible'] ? 'disponible' : 'indisponible';
    $prix       = formaterPrix((float) $livre['prix']);

    return sprintf(
        '<div class="carte-livre">
            <h3><a href="detail.php?id=%d">%s</a></h3>
            <p class="auteur">%s</p>
            <p class="meta">
                <span class="annee">%d</span> &middot;
                <span class="categorie">%s</span>
            </p>
            <p class="prix">%s FCFA</p>
            <span class="badge %s">%s</span>
        </div>',
        (int) $livre['id'],
        e($livre['titre']),
        e($livre['auteur']),
        (int) $livre['annee'],
        e($livre['categorie']),
        e($prix),
        e($dispoClass),
        e($dispo)
    );
}

function filtrerParCategorie(array $livres, string $categorie): array
{
    $resultat = array_filter(
        $livres,
        fn($livre) => $livre['categorie'] === $categorie
    );
    return array_values($resultat);
}

function trouverLivreParId(array $livres, int $id): ?array
{
    foreach ($livres as $livre) {
        if ((int) $livre['id'] === $id) {
            return $livre;
        }
    }
    return null;
}

function compterLivresDisponibles(array $livres): int
{
    return count(array_filter($livres, fn($livre) => $livre['disponible'] === true));
}

function listerCategories(array $livres): array
{
    $categories = array_column($livres, 'categorie');
    return array_values(array_unique($categories));
}

function formaterPrix(float $prix): string
{
    return number_format($prix, 0, ',', ' ');
}

function dateDuJour(): string
{
    $jours = ['dimanche', 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi'];
    $mois  = [
        1 => 'janvier', 'février', 'mars', 'avril', 'mai', 'juin',
        'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre',
    ];
    $j = (int) date('w');
    $m = (int) date('n');
    return sprintf('%s %d %s %d', $jours[$j], (int) date('j'), $mois[$m], (int) date('Y'));
}
