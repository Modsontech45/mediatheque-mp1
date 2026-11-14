# Médiathèque IPNET – Catalogue dynamique (TP1 IT 231)

## Description

Application web PHP sans base de données présentant le catalogue de la Médiathèque IPNET.
Les données sont stockées dans un tableau PHP. Le projet couvre la génération de pages
dynamiques, le filtrage par catégorie, la consultation du détail d'un ouvrage et la
sécurité de base (échappement XSS, validation des paramètres GET).

## Prérequis

- PHP 8.0 ou supérieur
- Navigateur web

## Installation et lancement

1. Cloner le dépôt :
   ```bash
   git clone <url-du-depot>
   ```
2. Se placer dans le dossier :
   ```bash
   cd mediatheque-mp1
   ```
3. Lancer le serveur PHP intégré :
   ```bash
   php -S localhost:8000
   ```
4. Ouvrir <http://localhost:8000> dans le navigateur.

> **XAMPP/WAMP** : copier le dossier dans `htdocs/` ou `www/` et accéder à
> `http://localhost/mediatheque-mp1/`.

## Structure du projet

```
mediatheque-mp1/
├── index.php          Page d'accueil
├── catalogue.php      Catalogue avec filtrage par catégorie
├── detail.php         Fiche détail d'un livre
├── apropos.php        Présentation de la médiathèque
├── includes/
│   ├── header.php     En-tête HTML commun
│   ├── footer.php     Pied de page commun
│   └── fonctions.php  Fonctions PHP utilitaires
├── data/
│   └── livres.php     Tableau de données (10 livres)
├── css/
│   └── style.css      Feuille de styles
└── README.md
```

## Fonctionnalités réalisées

- [x] Page d'accueil avec message de bienvenue et statistiques (total, disponibles, empruntés)
- [x] Catalogue complet avec compteur de livres affichés
- [x] Filtrage par catégorie via paramètre URL (`catalogue.php?categorie=roman`)
- [x] Message d'erreur propre pour catégorie inexistante
- [x] Lien « Tous les livres » pour revenir à l'affichage complet
- [x] Page détail avec validation de l'id (`absent`, `non entier`, `inexistant`, `valide`)
- [x] Page « À propos » avec date du jour en français
- [x] Mise en forme CSS responsive (grille de cartes, badges disponibilité)
- [x] Échappement systématique via `htmlspecialchars()` / fonction `e()`
- [x] Fonctions imposées : `afficherLivre`, `filtrerParCategorie`, `trouverLivreParId`, `compterLivresDisponibles`
