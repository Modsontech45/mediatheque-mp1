<?php
require_once __DIR__ . '/data/livres.php';
require_once __DIR__ . '/includes/fonctions.php';

$titrePage = 'À propos';
require __DIR__ . '/includes/header.php';
?>

<section class="page-titre">
    <h1>À propos de la Médiathèque IPNET</h1>
    <p class="date-jour">Aujourd'hui&nbsp;: <?= e(dateDuJour()) ?></p>
</section>

<section class="apropos-contenu">
    <h2>Notre mission</h2>
    <p>
        La Médiathèque IPNET est un espace dédié à la lecture, au savoir et à la culture.
        Fondée pour accompagner les étudiants et enseignants de l'Institut, elle met à disposition
        un catalogue varié couvrant la littérature africaine et internationale, les sciences,
        l'informatique et l'histoire.
    </p>

    <h2>Nos collections</h2>
    <ul>
        <li><strong>Romans</strong>  Littérature africaine et francophone, classiques mondiaux.</li>
        <li><strong>Histoire</strong>  Ouvrages sur l'histoire de l'Afrique et du monde.</li>
        <li><strong>Informatique</strong>  Langages de programmation, algorithmes, développement web.</li>
        <li><strong>Sciences</strong>  Mathématiques, physique, sciences naturelles.</li>
    </ul>

    <h2>Horaires d'ouverture</h2>
    <table class="table-detail">
        <tr><th>Lundi  Vendredi</th><td>08h00 – 18h00</td></tr>
        <tr><th>Samedi</th><td>09h00 – 13h00</td></tr>
        <tr><th>Dimanche</th><td>Fermé</td></tr>
    </table>

    <h2>Contact</h2>
    <p>
        Médiathèque IPNET, Campus principal<br>
        Tél. : +228 00 00 00 00<br>
        Email : mediatheque@ipnet.tg
    </p>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
