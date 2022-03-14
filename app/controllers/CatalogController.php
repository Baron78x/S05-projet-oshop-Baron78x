<?php

namespace Oshop\controllers;

use Oshop\models\CoreModel;
use Oshop\models\Product;
use Oshop\models\Category;
use Oshop\models\Brand;
use Oshop\models\Type;

// on fait l'inclusion de nos modèles au début de nos contrôleurs
// require_once __DIR__ . '/../models/CoreModel.php';
// require_once __DIR__ . '/../models/Product.php';
// require_once __DIR__ . '/../models/Category.php';
// require_once __DIR__ . '/../models/Brand.php';
// require_once __DIR__ . '/../models/Type.php';

class CatalogController extends CoreController
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

        //dump($productToDisplay);
        //dump($productToDisplay->getBrandId());

        // on a aussi besoin d'afficher la marque sur notre vue produit,
        // donc on va récupérer la marque grâce à son id (contenu dans $productToDisplay)

        $brand = new Brand();
        $brandToDisplay = $brand->find($productToDisplay->getBrandId());
        

        // on prépare les données à envoyer à notre vue ! 
        // (comme on faisait par exemple avec les horaires d'ouverture du café)
        $viewData = [
            'productToDisplay' => $productToDisplay,
            'brandToDisplay' => $brandToDisplay
        ];

        // on délègue l'affichage de nos vues à la méthode show()
        $this->show('product', $viewData);
    }

    
}