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

    public function test()
    {
        // première chose à faire pour tester notre modèle ... l'inclure !
        require_once __DIR__ . '/../models/CoreModel.php';
        require_once __DIR__ . '/../models/Category.php';

        // il faut ensuite instancier un objet à partir de notre modèle
        $categoryModel = new Category();
        
        // récupérer toutes les catégories dans une variable categoryList :
        $categoryList = $categoryModel->findAll();

        // récupérer une catégorie spécifique grâce à son ID :
        $category = $categoryModel->find(3);

        // on dump tout ça !
        //dump($categoryList);
        //dump($category);

        // pour parcourir notre tableau de catégories on boucle !
        // foreach($categoryList as $item) {
        //     // on peut afficher le nom de chaque catégorie par exemple
        //     dump($item->getName());
        // }

        //dd($category->getName());
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