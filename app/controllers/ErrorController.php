<?php

class ErrorController
{
    // une page = une méthode
    public function error404()
    {
        // gérer l'affichage de page erreur 404

        // on délègue l'affichage de nos vues à la méthode show()
        $this->show('404');
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