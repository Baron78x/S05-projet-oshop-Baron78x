<?php

// Point d'entrée unique => FrontController

// On inclut l'autoload de Composer
// (va permettre d'utiliser les librairies installées avec `composer require`)
require __DIR__ . '/../vendor/autoload.php';

// Inclusion de nos classes
require_once __DIR__ . '/../app/Controllers/MainController.php';
require_once __DIR__ . '/../app/Controllers/ErrorController.php';
require_once __DIR__ . '/../app/Controllers/CatalogController.php';

// On instancie AltoRouter
// @link altorouter.com
$router = new AltoRouter();

// On doit indiquer à AltoRouter si on travaille dans un sous-dossier

// Le chemin de base, se trouve être le dossier parent du fichier index.php
// accessible depuis la super-globale PHP $_SERVER (infos liées au serveur et à PHP)
// /!\ Pas d'espaces ni d'accents dans le nom du dossier
$publicFolder = dirname($_SERVER['SCRIPT_NAME']);

$router->setBasePath($publicFolder);

// On map nos routes

// Home
$router->map(
    // La méthode HTTP
    'GET',
    // Route/motif de l'URL
    '/',
    // Destination
    [
        'controller' => 'MainController',
        'method' => 'home',
    ],
    // Nom de la route (pour référence interne à Altorouter)
    'main_home'
);

// Les produits par catégorie
$router->map(
    'GET',
    // Ici on rend dynamique l'URL
    // /!\ C'est nous qui nommons le paramètre d'URL comme on le souhaite
    // @link http://altorouter.com/usage/mapping-routes.html
    '/category/[i:id]',
    // Destination
    [
        'controller' => 'CatalogController',
        'method' => 'category',
    ],
    // Nom de la route (pour référence interne à Altorouter)
    'catalog_category'
);

// Y'a-t-il une correspondance ? (entre la requête et nos routes)
$match = $router->match();

// dump($match);

// Dispatcher (on appelle la destination demandée)

// Si une correspndance est trouvée ($match !== false)
if($match) {

    // On va chercher le contrôleur et la méthode à appeler depuis le tableau de routes
    // Pour la page demandée

    // Le tableau de destination se trouve dans $match['target']
    // $match = [
    //   "target" => [
    //     "controller" => "MainController"
    //     "method" => "home"
    //   ]
    //   "params" => [
    //     "id" => "3"
    //   ]
    // ]
    $controllerName = $match['target']['controller'];
    $methodName = $match['target']['method'];

    // Instanciation de la classe MainController
    // Dynamiquement...
    $controller = new $controllerName();
    // Appel de la méthode correspondant à ce point d'entrée (page)
    // /!\ On appelle la méthode qui correspond au contenu de la variable $methodName
    // /!\ On en profite pour transmettre les paramètres d'URL reçus d'AltoRouter
    $controller->$methodName($match['params']);

} else {

    $controller = new ErrorController();
    $controller->error404();

}
