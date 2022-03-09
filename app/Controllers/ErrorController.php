<?php

// Classe qui gère les erreurs

class ErrorController
{
    public function error404()
    {
        $data = [
            'page_title' => 'Page non trouvée',
        ];

        // /!\ gérer le status code HTTP
        http_response_code(404);

        $this->show('error404', $data);
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