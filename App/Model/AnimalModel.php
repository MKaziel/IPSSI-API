<?php
namespace App\Model;

use App\Entity\Animal;
use Core\Database;

class AnimalModel {

    private $className = "App\Entity\Animal";

    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * 
     */
    public function model(){
        $model = array(
            "nom" => "nom",
            "type" => "type",
            "race" => "race",
            "poids" => "poids",
            "age" => 0,
            "description" => "description",
            "photo" => "photo",
            "proprietaire" => "proprietaire nullable"
        );
        return $model;
    }

    /**
     * return list of Animals
     *
     * @return Animal[]
     */
    public function findAll() :array
    {
        $statement = "SELECT * FROM animal";
        return $this->db->query($statement, $this->className);
    }

    /**
     * Return a Cateogie
     *
     * @param int $id
     * @return Animal
     */
    public function find(int $id) :Animal
    {
        $statement = "SELECT * FROM animal WHERE id = $id";
        return $this->db->query($statement, $this->className, true);
    }

    public function create(array $data)
    {
        $statement = "INSERT INTO animal (nom,type,race,poids,age,description,photo) 
            VALUES (:nom,
            :type,
            :race,:poids,
            :age,
            :description,
            :photo
            )";
        return $this->db->prepare($statement, $data);
    }

    public function update(array $data)
    {
        if(!isset($data['proprietaire'])){
            $data['proprietaire'] = null;
        }
        $statement = "UPDATE animal SET
                        nom = :nom,
                        type = :type,
                        race = :type,
                        poids = :poids,
                        age = :age,
                        description = :description,
                        photo = :photo,
                        proprietaire = :proprietaire
                        ";
        
        return $this->db->prepare($statement, $data);
    }

    public function delete(int $id)
    {
        $statement = "DELETE FROM animal WHERE id = $id";

        return $this->db->prepare($statement, array());
    }
}