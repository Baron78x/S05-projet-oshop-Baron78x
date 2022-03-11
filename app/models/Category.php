<?php 

// le model Category hérite de la classe mère CoreModel
// (et donc hérite de ses propriétés & méthodes !)
class Category extends CoreModel
{
    // On suit le design pattern Active Record :
    // on a autant de propriétes dans nos models qu'on a de colonnes de nos tables !

    private $name;
    private $subtitle;
    private $picture;
    private $home_order;

    /**
     * Get the value of name
     */ 
    public function getName() 
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of subtitle
     */ 
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * Set the value of subtitle
     *
     * @return  self
     */ 
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    /**
     * Get the value of picture
     */ 
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set the value of picture
     *
     * @return  self
     */ 
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get the value of home_order
     */ 
    public function getHomeOrder()
    {
        return $this->home_order;
    }

    /**
     * Set the value of home_order
     *
     * @return  self
     */ 
    public function setHomeOrder($home_order)
    {
        $this->home_order = $home_order;

        return $this;
    }

    /**
     * findAll() permet de récupérer tous les enregistrement de la table category
     * 
     * @return Category[]
     */
    public function findAll()
    {
        // notre requête SQL
        $sql = "SELECT * FROM `category`";

        // on récupère notre connexion à la BDD
        $pdo = Database::getPDO();

        // https://kourou.oclock.io/content/uploads/2020/11/query-exec.png
        // on récupère un pdo statement avec $pdo->query($sql)
        $pdoStmt = $pdo->query($sql);

        // https://kourou.oclock.io/content/uploads/2020/11/fetch-fetchall.png
        $results = $pdoStmt->fetchAll(PDO::FETCH_CLASS, 'Category');

        // il ne nous reste plus qu'à ... retourner ce tableau results !
        return $results;
    }

    /**
     * find() permet de récupérer une catégorie spécifique par son id
     * 
     * @param Integer id du produit à récupérer
     * @return Category
     */
    public function find($id)
    {
        // notre requête SQL
        $sql = "SELECT * FROM `category` WHERE id = {$id}";

        // on récupère notre connexion à la BDD
        $pdo = Database::getPDO();

        // on récupère un pdo statement avec $pdo->query($sql)
        $pdoStmt = $pdo->query($sql);

        // pour récupérer un seul objet de type Product, on utilise 
        // la méthode fetchObject() de PDO !
        $result = $pdoStmt->fetchObject('Category');

        return $result;
    }
}
