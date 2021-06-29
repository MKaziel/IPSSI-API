<?php
namespace App\Model;

use App\Entity\Don;
use Core\Database;

class DonModel {

    private $className = "App\Entity\Don";

    public function __construct()
    {
        $this->db = new Database;
    }

    public function model(){
        $model = array(
            "montant" => "montant",
            "data" => "data",
            "id_utilisateur" => "montant",
            "anonyme" => "quantite"
        );
        return $model;
    }

    /**
     * return list of Dons
     *
     * @return Don[]
     */
    public function findAll() :array
    {
        $statement = "SELECT * FROM don";
        return $this->db->query($statement, $this->className);
    }

    /**
     * Return a Cateogie
     *
     * @param int $id
     * @return Don
     */
    public function find(int $id) :Don
    {
        $statement = "SELECT * FROM don WHERE id = $id";
        return $this->db->query($statement, $this->className, true);
    }

    public function create(array $data)
    {
        $statement = "INSERT INTO don (montant,data,id_utilisateur,anonyme) 
            VALUES (:montant,:data,:id_utilisateur,:anonyme)";
        return $this->db->prepare($statement, $data);
    }

    public function update(array $data)
    {
        $statement = "UPDATE don SET
                        montant = :montant,
                        data = :data,
                        id_utilisateur = :id_utilisateur,
                        anonyme = :anonyme
                        ";
        
        return $this->db->prepare($statement, $data);
    }

    public function delete(int $id)
    {
        $statement = "DELETE FROM don WHERE id = $id";

        return $this->db->prepare($statement, array());
    }
}