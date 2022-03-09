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

    // méthode show : pour afficher nos templates
    private function show($viewName, $viewData = [])
    {
        // on va charger nos vues (header + viewName + footer)
        // $viewData est disponible dans chaque fichier de vue
        require_once __DIR__ . '/../views/header.tpl.php';
        require_once __DIR__ . '/../views/' . $viewName . '.tpl.php';
        require_once __DIR__ . '/../views/footer.tpl.php';
    }
}