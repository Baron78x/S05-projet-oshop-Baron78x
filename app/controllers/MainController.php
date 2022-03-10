<?php

class MainController
{
    // une page = une méthode
    public function home()
    {
        // gérer l'affichage de la page d'accueil

        // on délègue l'affichage de nos vues à la méthode show()
        $this->show('home');
    }

    public function legal()
    {
        $this->show('legal');
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