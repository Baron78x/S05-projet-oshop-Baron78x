<?php

namespace Oshop\controllers;

class ErrorController extends CoreController
{
    // une page = une méthode
    public function error404()
    {
        // gérer l'affichage de page erreur 404

        // on délègue l'affichage de nos vues à la méthode show()
        $this->show('404');
    }
}