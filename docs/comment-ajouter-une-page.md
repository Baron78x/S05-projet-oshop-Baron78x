# Comment ajouter une page ?

1. Ajouter une route dans index.php (notre FrontController, point d'entrée unique de notre site), cela consiste à copier/coller un appel de $router->map()
   
   **Pour Rappel, une route = une URL + une méthode dans un contrôleur !**

2. On ajoute une méthode dans un contrôleur.

3. On ajoute une nouvelle vue qui va contenir le HTML de la nouvelle page !

## Si cette page nécessite des données en provenance de la BDD

- depuis la méthode de cette page dans le contrôleur, on va utiliser les méthodes find(), findAll() de nos modèles pour récupérer les données
- on va ensuite envoyer ces données à la vue grâce à notre tableau $viewData[].