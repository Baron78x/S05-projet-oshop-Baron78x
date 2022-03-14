<?php

namespace Oshop\controllers;

use Oshop\models\CoreModel;
use Oshop\models\Category;
use Oshop\models\Brand;
use Oshop\models\Type;

// classe mère de tous nos contrôleurs
class CoreController
{
    // la méthode show est commune entre tous nos contrôleurs !
    // méthode show : pour afficher nos templates
    // protected pour qu'elle soit accessible dans les classes enfants (MainController, ErrorController et CatalogController)
    protected function show($viewName, $viewData = [])
    {
        // on doit utiliser une variable globale pour $routeur, sinon on n'y a pas accès :'(
        // (en tout cas, pour l'instant, on ne sait pas faire mieux !) 
        global $router;

        // on récupère l'URL depuis la racine (/) de notre serveur web
        // pour charger nos assets (css, js) grâce à une URL absolue !
        $absoluteURL = dirname($_SERVER['SCRIPT_NAME']);

        // récupérons de quoi alimenter nos foreach dans la navigation !
        // 1. on instancie un objet à partir de notre model
        $categoryModel = new Category();
        // 2. on appelle la méthode findAll() et stocker ce qu'elle retourne dans un tableau
        $categoryList = $categoryModel->findAll();

        $typeModel = new Type();
        $typeList = $typeModel->findAllOrderedByNameAsc();

        $brandModel = new Brand();
        $brandList = $brandModel->findAllOrderedByNameAsc();

        // on va charger nos vues (header + viewName + footer)
        // $viewData est disponible dans chaque fichier de vue
        require_once __DIR__ . '/../views/header.tpl.php';
        require_once __DIR__ . '/../views/' . $viewName . '.tpl.php';
        require_once __DIR__ . '/../views/footer.tpl.php';
    }
}