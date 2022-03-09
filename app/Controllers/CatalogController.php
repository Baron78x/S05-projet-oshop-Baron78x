<?php

// Classe qui gère le catalogue

class CatalogController
{
    // On récupère en entrée les paramètres d'AltoRouter
    public function category($params)
    {
        // $params
        // [
        //   "id" => "23"
        // ]
        // dump('depuis le contrôleur', $params);

        // On extrait l'info voulue
        $id = $params['id'];

        $data = [
            'page_title' => 'Produits de la catégorie ' . $id,
            'id' => $id,
        ];

        $this->show('products_list', $data);
    }

    // Fonction qui permet de rendre une vue (à partir d'un template)
    // $viewName : nom du fichier de template à charger
    // $viewData : données pour la vue/le template (nécessaire pour envoyer des données dans ce template)
    // en visibilité "private", on ne pourra appeler cette méthode que depuis $this
    private function show($viewName, $viewData = [])
    {
        // Dans tous ces fichiers requis ci-dessous, $viewData est accessible

        // Inclusion header
        require_once __DIR__ . "/../views/header.tpl.php";

        // On inclut le template dynamiquement
        // Avec son chemin complet (chemin absolu)

        require_once __DIR__ . "/../views/{$viewName}.tpl.php";
        // Equivaut à
        // require_once __DIR__ . '/views/' . $page . '.tpl.php';

        // Inclusion header
        require_once __DIR__ . "/../views/footer.tpl.php";
    }
}