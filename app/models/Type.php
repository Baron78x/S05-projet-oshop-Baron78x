<?php

namespace Oshop\models;

use Oshop\utils\Database;
use PDO;

class Type extends CoreModel
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
     * findAll() permet de récupérer tous les enregistrement de la table type
     * 
     * @return Type[]
     */
    public function findAll()
    {
        // notre requête SQL
        $sql = "SELECT * FROM `type`";

        // on récupère notre connexion à la BDD
        $pdo = Database::getPDO();

        // https://kourou.oclock.io/content/uploads/2020/11/query-exec.png
        // on récupère un pdo statement avec $pdo->query($sql)
        $pdoStmt = $pdo->query($sql);

        // https://kourou.oclock.io/content/uploads/2020/11/fetch-fetchall.png
        $results = $pdoStmt->fetchAll(PDO::FETCH_CLASS, 'Oshop\models\Type');

        // il ne nous reste plus qu'à ... retourner ce tableau results !
        return $results;
    }

    public function findAllOrderedByNameAsc()
    {
        // 1. requêtes SQL
        $sql = "SELECT * FROM `type` ORDER BY `name`";

        // 2. on récupère notre connexion à la BDD
        $pdo = Database::getPDO();

        // 3. lancer la requête (et récupérer un PDO statement)
        $pdoStmt = $pdo->query($sql);

        // 4. récupérer les résultats avec FetchAll
        $results = $pdoStmt->fetchAll(PDO::FETCH_CLASS, 'Oshop\models\Type');

        // 5. on retourne les résultats
        return $results;
    }

    /**
     * find() permet de récupérer une marque spécifique par son id
     * 
     * @param Integer id du produit à récupérer
     * @return Type
     */
    public function find($id)
    {
        // notre requête SQL
        $sql = "SELECT * FROM `type` WHERE id = {$id}";

        // on récupère notre connexion à la BDD
        $pdo = Database::getPDO();

        // on récupère un pdo statement avec $pdo->query($sql)
        $pdoStmt = $pdo->query($sql);

        // pour récupérer un seul objet de type Product, on utilise 
        // la méthode fetchObject() de PDO !
        $result = $pdoStmt->fetchObject('Oshop\models\Type');

        return $result;
    }
}