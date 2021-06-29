<?php
namespace App\Model;

use App\Entity\Achat;
use Core\Database;

class AchatModel {

    private $className = "App\Entity\Achat";

    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * 
     */
    public function model(){
        $model = array(
            "id_utilisateur" => "id_utilisateur",
            "id_produit" => "id_produit",
            "montant" => "montant",
            "quantite" => "quantite"
        );
        return $model;
    }

    /**
     * return list of Achats
     *
     * @return Achat[]
     */
    public function findAll() :array
    {
        $statement = "SELECT * FROM Achat";
        return $this->db->query($statement, $this->className);
    }

    /**
     * Return a Cateogie
     *
     * @param int $id
     * @return Achat
     */
    public function find(int $id) :Achat
    {
        $statement = "SELECT * FROM Achat WHERE id = $id";
        return $this->db->query($statement, $this->className, true);
    }

    public function create(array $data)
    {
        $statement = "INSERT INTO Achat (id_utilisateur,id_produit,montant, quantite) 
            VALUES (:id_utilisateur,:id_produit,:montant,:quantite)";
        return $this->db->prepare($statement, $data);
    }

    public function update(array $data)
    {
        $statement = "UPDATE Achat SET
                    id_utilisateur = :id_utilisateur,
                    id_produit = :id_produit,
                    montant = :montant,
                    quantite = :quantite";
        
        return $this->db->prepare($statement, $data);
    }

    public function delete(int $id)
    {
        $statement = "DELETE FROM Achat WHERE id = $id";

        return $this->db->prepare($statement, array());
    }
}