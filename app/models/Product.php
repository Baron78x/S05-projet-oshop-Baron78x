<?php

// On suit le pattern Active Record :
// une table dans la BDD -> une classe/un modèle

/**
 * La classe Product est un modèle (Model de MVC)
 * qui va nous permettre d'interragir avec notre 
 * table product en BDD.
 */
class Product
{

    // 1ère chose à mettre dans le modèle :
    // autant de propriétés (en private) que l'on a de colonnes
    private $id;
    private $name;
    private $description;
    private $picture;
    private $price;
    private $rate;

    /**
     * Status stocke la disponibilité du produit (en stock ou pas)
     * 
     * @var Integer disponibilité du produit
     */
    private $status;

    private $created_at;
    private $updated_at;
    private $brand_id;
    private $category_id;
    private $type_id;

    // 2ème chose à mettre : les getters & les setters

    /**
     * Get the value of id
     * 
     * @return Integer Id du produit
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     * 
     * @return String Le nom du produit
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param String name Le nom du produit
     * @return self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

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
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of rate
     */ 
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set the value of rate
     *
     * @return  self
     */ 
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of updated_at
     */ 
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */ 
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * Get the value of brand_id
     */ 
    public function getBrandId()
    {
        return $this->brand_id;
    }

    /**
     * Set the value of brand_id
     *
     * @return  self
     */ 
    public function setBrandId($brand_id)
    {
        $this->brand_id = $brand_id;

        return $this;
    }

    /**
     * Get the value of category_id
     */ 
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * Set the value of category_id
     *
     * @return  self
     */ 
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;

        return $this;
    }

    /**
     * Get the value of type_id
     */ 
    public function getTypeId()
    {
        return $this->type_id;
    }

    /**
     * Set the value of type_id
     *
     * @return  self
     */ 
    public function setTypeId($type_id)
    {
        $this->type_id = $type_id;

        return $this;
    }


    // 3ème chose à ajouter dans nos modèles : des méthodes findAll() & find()

    /**
     * findAll() permet de récupérer tous les enregistrement de la table product
     * 
     * @return Product[]
     */
    public function findAll()
    {
        // notre requête SQL
        $sql = "SELECT * FROM `product`";

        // on récupère notre connexion à la BDD
        $pdo = Database::getPDO();

        // https://kourou.oclock.io/content/uploads/2020/11/query-exec.png
        // on récupère un pdo statement avec $pdo->query($sql)
        $pdoStmt = $pdo->query($sql);

        // https://kourou.oclock.io/content/uploads/2020/11/fetch-fetchall.png
        $results = $pdoStmt->fetchAll(PDO::FETCH_CLASS, 'Product');

        // il ne nous reste plus qu'à ... retourner ce tableau results !
        return $results;
    }

    /**
     * find() permet de récupérer un produit spécifique par son id
     *
     * @param Integer id du produit à récupérer
     * @return Product
     */
    public function find($id){
        // requete sql
        $sql = "SELECT * FROM `product` WHERE id = {$id}";

        // on récupère notre connexion à la BDD
        $pdo = Database::getPDO();

        // on récupère un pdo statement avec $pdo->query($sql)
        $pdoStmt = $pdo->query($sql);

        $result = $pdoStmt->fetchObject('Product');

        return $result;

    }
}