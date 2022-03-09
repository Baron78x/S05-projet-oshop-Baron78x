<?php

// Notre FrontController, point d'entrée UNIQUE de notre application

// require de nos Controllers
require_once __DIR__ . '/../app/controllers/MainController.php';

// tableau de routes
$routes = [
    '/' => [
        'controller' => 'MainController',
        'method' => 'home'
    ],
    '/categorie/?id?' => [
        'controller' => 'CatalogController',
        'method' => 'category'
    ]
];

// conditions sur $_GET pour gérer quelle page afficher
// plus exactement pour gérer quel controller initialiser 
// et quelle méthode appeler
// ROUTEUR -> DISPATCHEUR

// on vérifie si le paramètre d'URL page est fourni, et s'il n'est pas vide
if(isset($_GET['page']) && !empty($_GET['page'])) {
    // il est fourni et n'est pas vide, on stocke sa valeur dans $requestedPage
    $requestedPage = $_GET['page'];
} else {
    // paramètre non fourni ou vide, on affiche la page d'accueil
    $requestedPage = '/';
}
    
// est-ce qu'on a une route dans notre tableau qui correspond à la page demandée ?
if (isset($routes[$requestedPage])) {
    
    // on vient récupérer les informations (controleur + la méthode) sur la route
    // dans notre tableau de routes $routes
    $currentRoute = $routes[$requestedPage];

    // on va instancier le controleur correspondant
    $controller = new $currentRoute['controller']();

    // on récupère la méthode à appeler
    $method = $currentRoute['method'];

    // on appelle la bonne méthode du controleur qu'on vient d'instancier
    // la ligne ci-dessous c'est notre DISPATCHEUR !
    $controller->$method();
} else {
    // on a pas de route qui correspond à la page demandée par le visiteur, 
    // donc on affiche une erreur 404 !
    $controller = new ErrorController();
    $controller->error404();
}