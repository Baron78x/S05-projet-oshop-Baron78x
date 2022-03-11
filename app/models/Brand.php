<?php

class Brand extends CoreModel
{
    private $name;

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
     * findAll() permet de récupérer tous les enregistrement de la table brand
     * 
     * @return Brand[]
     */
    public function findAll()
    {
        // notre requête SQL
        $sql = "SELECT * FROM `brand`";

        // on récupère notre connexion à la BDD
        $pdo = Database::getPDO();

        // https://kourou.oclock.io/content/uploads/2020/11/query-exec.png
        // on récupère un pdo statement avec $pdo->query($sql)
        $pdoStmt = $pdo->query($sql);

        // https://kourou.oclock.io/content/uploads/2020/11/fetch-fetchall.png
        $results = $pdoStmt->fetchAll(PDO::FETCH_CLASS, 'Brand');

        // il ne nous reste plus qu'à ... retourner ce tableau results !
        return $results;
    }

    /**
     * find() permet de récupérer une marque spécifique par son id
     * 
     * @param Integer id du produit à récupérer
     * @return Brand
     */
    public function find($id)
    {
        // notre requête SQL
        $sql = "SELECT * FROM `brand` WHERE id = {$id}";

        // on récupère notre connexion à la BDD
        $pdo = Database::getPDO();

        // on récupère un pdo statement avec $pdo->query($sql)
        $pdoStmt = $pdo->query($sql);

        // pour récupérer un seul objet de type Product, on utilise 
        // la méthode fetchObject() de PDO !
        $result = $pdoStmt->fetchObject('Brand');

        return $result;
    }

}