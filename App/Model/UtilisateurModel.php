<?php
namespace App\Model;

use App\Entity\Utilisateur;
use Core\Database;

class UtilisateurModel {

    private $className = "App\Entity\Utilisateur";

    public function __construct()
    {
        $this->db = new Database;
    }

    public function model(){
        $model = array(
            "identifiant" => "identifiant",
            "motdepasse" => "motdepasse",
            "role" => "role",
        );
        return $model;
    }

    /**
     * return list of Utilisateurs
     *
     * @return Utilisateur[]
     */
    public function findAll() :array
    {
        $statement = "SELECT * FROM utilisateur";
        return $this->db->query($statement, $this->className);
    }

    /**
     * Return a Cateogie
     *
     * @param int $id
     * @return Utilisateur
     */
    public function find(int $id) :Utilisateur
    {
        $statement = "SELECT * FROM utilisateur WHERE id = $id";
        return $this->db->query($statement, $this->className, true);
    }

    public function create(array $data)
    {
        $statement = "INSERT INTO utilisateur (identifiant,motdepasse,role) 
            VALUES (:identifiant,:motdepasse,:role)";
        return $this->db->prepare($statement, $data);
    }

    public function update(array $data)
    {
        $statement = "UPDATE utilisateur SET
                        identifiant = :identifiant,
                        motdepasse = :motdepasse,
                        role = :role
                        ";
        
        return $this->db->prepare($statement, $data);
    }

    public function delete(int $id)
    {
        $statement = "DELETE FROM utilisateur WHERE id = $id";

        return $this->db->prepare($statement, array());
    }
}