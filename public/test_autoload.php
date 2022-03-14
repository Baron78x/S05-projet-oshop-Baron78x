<?php
// require d'autoload.php pour le chargement automatique des dépendances installées via composer
require_once __DIR__ . '/../vendor/autoload.php';

// require de notre Autoload à nous !
//require_once __DIR__ . '/../app/utils/Autoload.php';

use Oshop\models\Product;

// on essaye d'instancier une classe pour tester si notre autoload fonctionne !
$product = new Product();

dump($product->findAll());