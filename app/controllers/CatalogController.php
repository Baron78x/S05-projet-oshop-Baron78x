<?php

class CatalogController
{
    // une page = une méthode
    //* /category est une route paramétrique, AltoRouter lui a donc envoyé un tableau de paramètres $params
    public function category($params)
    {
        // gérer l'affichage de la page qui liste les produits d'une catégorie

        dump($params);

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

        dump($params);

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

        dump($params);

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

        require_once __DIR__ . '/../models/Product.php';

        // on prépare les données à envoyer à notre vue ! 
        // (comme on faisait par exemple avec les horaires d'ouverture du café)
        
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
        // on récupère l'URL depuis la racine (/) de notre serveur web
        // pour charger nos assets (css, js) grâce à une URL absolue !
        $absoluteURL = dirname($_SERVER['SCRIPT_NAME']);

        // on va charger nos vues (header + viewName + footer)
        // $viewData est disponible dans chaque fichier de vue
        require_once __DIR__ . '/../views/header.tpl.php';
        require_once __DIR__ . '/../views/' . $viewName . '.tpl.php';
        require_once __DIR__ . '/../views/footer.tpl.php';
    }
}