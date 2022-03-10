Petit récap sur les routes paramétriques :

On a commencé à faire un peu de magie ce matin et ça a fait fumer quelques cerveaux. C’est normal, pas de panique ! 

AltoRouter nous permet de faire passer des paramètres dans l’url de notre route qui seront directement accessibles dans notre method. C’est hyper pratique !

Il nous a fallu créer une route categorie/[i:id] . Cette manière d’écrire indique à AltoRouter qu’on veut stocker la partie [i:id] dans un un tableau de paramètres qui se trouve dans $match['params'] .

Attention ça pique un peu, on respire et on y va :

Dans notre dispatcher, on instancie le bon controller et on appelle la bonne méthode. Jusque là rien de nouveau. Par contre, en appelant cette méthode on lui donne en argument le contenu de $match['params'] qui est le tableau de paramètres.

Dans notre controller, on récupère donc le tableau de paramètres $params et on peut accéder à l’id grâce à $params[‘id’].

Ca pique ? C’est normal. Vous allez mieux comprendre en pratiquant. Cette saison c’est un peu le jeu de la patate chaude. On se passe de la donnée et c’est parfois compliqué de voir le chemin qu’elle parcourt.

Il semble que vous aimiez bien mes petits récaps, donc à toutes fins utiles je peux vous communiquer mon PayPal en MP. Il n’y a pas de raison qu’Adrien soit le seul à arrondir ses fins de mois 















Aujourd’hui, on a vu le design pattern Active Record. Dans ce dernier :

1. chaque table de notre BDD est représentée par une classe (Model) .
2. chaque colonne de notre table devient une propriété dans la classe associée.
3. la classe contient un getter et un setter pour chaque propriété ( seulement getter pour l’id)
4. la classe contient des méthodes permettant d'interagir avec la BDD, par le biais de commandes SQL ( find(), findAll(), …)
5. chaque nouvelle instance de classe (objet) représente une entrée dans notre table.

Le schéma de Baptiste est top pour récapituler tout ça ! 

*

Pour se connecter à la BDD :

1. il nous faut Database.php dans le dossier utils
2. on crée le config.ini (à partir du config.ini.dist) dans lequel on renseigne les informations de connexion
3. on n’oublie pas d’ajouter le config.ini au .gitignore pour éviter d’envoyer son mdp sur github

Dans notre Model, on peut récupérer notre connexion à la BDD en utilisant $pdo = Database::getPDO(); si l’on n’oublie pas de require le Database.php en haut du fichier  .

*

On a vu un petit nouveau dans nos méthodes : PDO::FETCH_CLASS qui permet de récupérer les résultats sous forme d’une liste d’objets plutôt que le PDO::FETCH_ASSOC qui retournait un tableau.

Dans nos Controllers on n’oublie pas d’include les Models nécessaires, sinon VSC va râler si l’on essaye d’instancier la classe du Model ou utiliser ses méthodes.

*

Grâce à nos Models et à leurs méthodes (find, findAll), on a pu récupérer des données de la BDD dans nos Controllers, qu’on a ensuite communiquées aux Views par le biais de $viewData ( on se souvient du site sur le café, parcours de la donnée, tout ça … )