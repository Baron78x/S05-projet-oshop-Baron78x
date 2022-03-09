# Composer

Composer est un gestionnaire de dépendances (qu'on peut aussi appeler des bibliothèques)

Il nous permet d'installer / mettre à jour automatiquement des dépendances qui sont récupérées depuis packagist.org

## Commandes

`composer require nom_de_la_dependance` pour ajouter un dépendance à notre projet
`composer install` pour installer les dépendances après avoir cloné un dépot !
`composer update` pour mettre à jour les dépendances

## Composer.json

Quand on fait un `composer require`, Composer va automatiquement alimenter un fichier `composer.json` à la racine de notre projet. 

## Composer.lock

Ce fichier "fixe" la version utilisée de nos dépendances, et c'est ce fichier qui sera lu par composer quand on fera un `composer install` sur un projet cloné depuis github (afin de récupérer le dossier vendor !)

## Fichier .gitignore

On ajoute le dossier `vendor/` dans un fichier `.gitignore` à la racine de notre projet, puisqu'on ne veut pas que ce dossier soit poussé sur github !

Fiche récap Kourou : https://kourou.oclock.io/ressources/fiche-recap/composer/

## Comment utiliser les dépendances installées par Composer ?

Il faut ajouter `require_once __DIR__ . '/../vendor/autoload.php` au début de notre fichier index.php ! (et ces dépendances vont être chargées **automatiquement** !)