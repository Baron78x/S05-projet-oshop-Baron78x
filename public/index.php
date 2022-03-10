<?php

// Notre FrontController, point d'entrée UNIQUE de notre application

// require d'autoload.php pour le chargement automatique des dépendances installées via composer
require_once __DIR__ . '/../vendor/autoload.php';

// inclusion de app/utils/Database.php
require_once __DIR__ . '/../app/utils/Database.php';

// require de nos Controllers
require_once __DIR__ . '/../app/controllers/MainController.php';
require_once __DIR__ . '/../app/controllers/CatalogController.php';
require_once __DIR__ . '/../app/controllers/ErrorController.php';

// Nouveau routeur : AltoRouter
// AltoRouter est un routeur un peu plus "pro" que ce qu'on a fait hier !

// On commence par instancier un objet AltoRouter
$router = new AltoRouter();

// on donne à AltoRouter la partie de l'URL à ne pas prendre en compte pour faire la 
// comparaison entre l'URL demandée par le visiteur (exemple /categoy/1) et l'URL de notre route
// Si on oublie de mettre ce setBasePath, AltoRouter croit que la route demandée c'est :
//! /S05/Boson/S05-projet-oShop-bdelphin/public/category/1
// or en fait, la route correcte c'est juste :
//* /category/1
$publicFolder = dirname($_SERVER['SCRIPT_NAME']);
// $_SERVER est une variable superglobale de PHP
//dump($_SERVER);
//dump($_SERVER['SCRIPT_NAME']); // retourne /S05/Boson/S05-projet-oshop-bdelphin/public/index.php
//dump(dirname($_SERVER['SCRIPT_NAME'])); // retourne /S05/Boson/S05-projet-oshop-bdelphin/public
$router->setBasePath($publicFolder);
//$router->setBasePath('/S05/Boson/S05-projet-oShop-bdelphin/public');

// On va ensuite pouvoir mapper nos routes
// grace à la méthode $router->map() (en suivant la doc !)
$router->map(
    'GET', // premier paramètre : méthode HTTP autorisée
    '/', // deuxième paramètre : l'URL de cette route
    // troisième paramètre : cible/target de notre route (une méthode dans un controlleur)
    [
        'action' => 'home', // méthode à appeler
        'controller' => 'MainController' // controller concerné
    ],
    'home' // le nom qu'on donne à notre route
);

// exemple d'une route paramétrique : 
// on ajoute [i:id] pour avoir un id qui peut changer dans notre URL !
$router->map(
    'GET', // premier paramètre : méthode HTTP autorisée
    '/catalogue/categorie/[i:id]', // deuxième paramètre : l'URL de cette route
    // troisième paramètre : cible/target de notre route (une méthode dans un controlleur)
    [
        'action' => 'category', // méthode à appeler
        'controller' => 'CatalogController' // controller concerné
    ],
    'category' // le nom qu'on donne à notre route
);

$router->map(
    'GET', // premier paramètre : méthode HTTP autorisée
    '/catalogue/marque/[i:id]', // deuxième paramètre : l'URL de cette route
    // troisième paramètre : cible/target de notre route (une méthode dans un controlleur)
    [
        'action' => 'brand', // méthode à appeler
        'controller' => 'CatalogController' // controller concerné
    ],
    'brand' // le nom qu'on donne à notre route
);

$router->map(
    'GET', // premier paramètre : méthode HTTP autorisée
    '/catalogue/type/[i:id]', // deuxième paramètre : l'URL de cette route
    // troisième paramètre : cible/target de notre route (une méthode dans un controlleur)
    [
        'action' => 'type', // méthode à appeler
        'controller' => 'CatalogController' // controller concerné
    ],
    'type' // le nom qu'on donne à notre route
);

$router->map(
    'GET', // premier paramètre : méthode HTTP autorisée
    '/catalogue/produit/[i:id]', // deuxième paramètre : l'URL de cette route
    // troisième paramètre : cible/target de notre route (une méthode dans un controlleur)
    [
        'action' => 'product', // méthode à appeler
        'controller' => 'CatalogController' // controller concerné
    ],
    'product' // le nom qu'on donne à notre route
);

// le 4ème paramètre / le nom qu'on donne à notre route, nous servira quand on voudra 
// utiliser $router->generate() (mais on verra ça plus tard !)

// si on veut ajouter une page, il va falloir ajouter un route et donc copier-coller 
// la méthode map() ci-dessus (exemple si on veut ajouter une page mentions légales) :

$router->map(
    'GET', // premier paramètre : méthode HTTP autorisée
    '/mentions-legales', // deuxième paramètre : l'URL de cette route
    // troisième paramètre : cible/target de notre route (une méthode dans un controlleur)
    [
        'action' => 'legal', // méthode à appeler
        'controller' => 'MainController' // controller concerné
    ],
    'legal' // le nom qu'on donne à notre route
);


// on vient "matcher" l'URL demandée par le visiteur avec nos routes définies ci-dessus !
$match = $router->match();
// $router->match() va retourner false si la route n'existe pas !
//dump($match);

// est-ce que notre route existe ? 
if($match) {
    // notre route existe, on va récupérer les données de la route 
    // que l'on a définit précédemment avec $router->map()

    // on récupère le controller
    $controllerName= $match['target']['controller'];

    // on récupère la méthode
    $method = $match['target']['action'];

    // on peut instancier notre controller
    $controller = new $controllerName();

    // on peut appeler la méthode de notre controller
    // on va envoyer les paramètres éventuels à notre méthode
    // ces paramètres étant ceux définis avec $router->map() ci dessus ! [i:id]
    $controller->$method($match['params']);
} else {
    // notre route n'existe pas, donc on renvoit sur une 404 !
    $controller = new ErrorController();
    $controller->error404();
}
