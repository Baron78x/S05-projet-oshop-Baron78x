<?php

namespace Oshop\controllers;

class MainController extends CoreController
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

    public function cgv()
    {
        $this->show('cgv');
    }

    // public function test()
    // {
    //     // première chose à faire pour tester notre modèle ... l'inclure !
    //     require_once __DIR__ . '/../models/CoreModel.php';
    //     require_once __DIR__ . '/../models/Category.php';

    //     // il faut ensuite instancier un objet à partir de notre modèle
    //     $categoryModel = new Category();
        
    //     // récupérer toutes les catégories dans une variable categoryList :
    //     $categoryList = $categoryModel->findAll();

    //     // récupérer une catégorie spécifique grâce à son ID :
    //     $category = $categoryModel->find(3);

    //     // on dump tout ça !
    //     //dump($categoryList);
    //     //dump($category);

    //     // pour parcourir notre tableau de catégories on boucle !
    //     // foreach($categoryList as $item) {
    //     //     // on peut afficher le nom de chaque catégorie par exemple
    //     //     dump($item->getName());
    //     // }

    //     //dd($category->getName());
    // }
}