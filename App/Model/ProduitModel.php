<?php
namespace App\Model;

use App\Entity\Produit;
use Core\Database;

class ProduitModel {

    private $className = "App\Entity\Produit";

    public function __construct()
    {
        $this->db = new Database;
    }

    public function model(){
        $model = array(
            "nom" => "nom",
            "prix" => "prix",
            "type_animal" => "type_animal",
            "quantite" => "quantite",
            "description" => "description"
        );
        return $model;
    }

    /**
     * return list of Produits
     *
     * @return Produit[]
     */
    public function findAll() :array
    {
        $statement = "SELECT * FROM produit";
        return $this->db->query($statement, $this->className);
    }

    /**
     * Return a Cateogie
     *
     * @param int $id
     * @return Produit
     */
    public function find(int $id) :Produit
    {
        $statement = "SELECT * FROM produit WHERE id = $id";
        return $this->db->query($statement, $this->className, true);
    }

    public function create(array $data)
    {
        $statement = "INSERT INTO produit (nom,prix,type_animal,quantite,) 
            VALUES (:nom,:prix,:type_animal,:quantite)";
        return $this->db->prepare($statement, $data);
    }

    public function update(array $data)
    {
        $statement = "UPDATE produit SET
                       nom = :nom,
                       prix = :prix,
                       type_animal = :type_animal,
                       quantite = :quantite,
                       description = :description
                        ";                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
        
        return $this->db->prepare($statement, $data);
    }

    public function delete(int $id)
    {
        $statement = "DELETE FROM produit WHERE id = $id";

        return $this->db->prepare($statement, array());
    }
}