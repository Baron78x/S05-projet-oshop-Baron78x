<?php

// on fait l'inclusion de nos modèles au début de nos contrôleurs
require_once __DIR__ . '/../models/CoreModel.php';
require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . '/../models/Category.php';
require_once __DIR__ . '/../models/Brand.php';
require_once __DIR__ . '/../models/Type.php';

class CatalogController
{
    // une page = une méthode
    //* /category est une route paramétrique, AltoRouter lui a donc envoyé un tableau de paramètres $params
    public function category($params)
    {
        // gérer l'affichage de la page qui liste les produits d'une catégorie

        // on récupère et on dump tous les produits (pour test)
        //$product = new Product();
        //dump($product->findAll());

        // on prépare les données à envoyer à notre vue ! 
        // (comme on faisait par exemple avec les horaires d'ouverture du café)
        $viewData = [
            'categoryId' => $params['id']
        ];

        // on délègue l'affichage de nos vues à la méthode show()
        $this->show('category', $viewData);
    }

    public function type($params)
    {
        // gérer l'affichage de la page qui liste les produits d'un type de produit

        //dump($params);

        // on prépare les données à envoyer à notre vue ! 
        // (comme on faisait par exemple avec les horaires d'ouverture du café)
        $viewData = [
            'typeId' => $params['id']
        ];

        // on délègue l'affichage de nos vues à la méthode show()
        $this->show('type', $viewData);
    }

    public function brand($params)
    {
        // gérer l'affichage de la page qui liste les produits d'une marque

        //dump($params);

        // on prépare les données à envoyer à notre vue ! 
        // (comme on faisait par exemple avec les horaires d'ouverture du café)
        $viewData = [
            'brandId' => $params['id']
        ];

        // on délègue l'affichage de nos vues à la méthode show()
        $this->show('brand', $viewData);
    }

    public function product($params)
    {
        // gérer l'affichage de la page qui affiche les détails d'un produit

        $product = new Product();
        $productToDisplay = $product->find($params['id']);
        

        // on prépare les données à envoyer à notre vue ! 
        // (comme on faisait par exemple avec les horaires d'ouverture du café)
        $viewData = [
            'productId' => $params['id'],
            'productToDisplay' => $productToDisplay
        ];

        // on délègue l'affichage de nos vues à la méthode show()
        $this->show('product', $viewData);
    }

    // méthode show : pour afficher nos templates
    private function show($viewName, $viewData = [])
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
        $typeList = $typeModel->findAll();

        $brandModel = new Brand();
        $brandList = $brandModel->findAll();

        // on va charger nos vues (header + viewName + footer)
        // $viewData est disponible dans chaque fichier de vue
        require_once __DIR__ . '/../views/header.tpl.php';
        require_once __DIR__ . '/../views/' . $viewName . '.tpl.php';
        require_once __DIR__ . '/../views/footer.tpl.php';
    }
}