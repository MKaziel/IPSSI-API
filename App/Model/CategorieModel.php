<?php
namespace App\Model;

use App\Entity\Categorie;
use Core\Database;

class CategorieModel {

    private $className = "App\Entity\Categorie";

    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * 
     */
    public function model(){
        $model = array(
            "nom"=> "vide"
        );
        return $model;
    }

    /**
     * return list of Categories
     *
     * @return Categorie[]
     */
    public function findAll() :array
    {
        $statement = "SELECT * FROM categorie";
        return $this->db->query($statement, $this->className);
    }

    /**
     * Return a Cateogie
     *
     * @param int $id
     * @return Categorie
     */
    public function find(int $id) :Categorie
    {
        $statement = "SELECT * FROM categorie WHERE id = $id";
        return $this->db->query($statement, $this->className, true);
    }

    public function create(array $data)
    {
        $statement = "INSERT INTO categorie (nom) 
            VALUES (:nom)";
        return $this->db->prepare($statement, $data);
    }

    public function update(array $data)
    {
        $statement = "UPDATE categorie SET
                        nom = :nom
                        ";
        
        return $this->db->prepare($statement, $data);
    }

    public function delete(int $id)
    {
        $statement = "DELETE FROM categorie WHERE id = $id";

        return $this->db->prepare($statement, array());
    }
}