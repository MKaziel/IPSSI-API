<?php
namespace App\Model;

use App\Entity\Article;
use Core\Database;

class ArticleModel {

    private $className = "App\Entity\Article";

    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * 
     */
    public function model(){
        $model = array(
            "titre" => "titre",
            "contenue" => "contenue",
            "categorie_id" => "categorie_id",
            "id_utilisateur" => "id_utilisateur",
            "user_id" => "user_id",
            "illustration" => "illustration"
        );
        return $model;
    }


    /**
     * return list of Articles
     *
     * @return Article[]
     */
    public function findAll() :array
    {
        $statement = "SELECT * FROM article";
        return $this->db->query($statement, $this->className);
    }
    


    /**
     * Return an Article
     *
     * @param int $id
     * @return Article
     */
    public function find(int $id) :Article
    {
        $statement = "SELECT * FROM article WHERE id = $id";
        return $this->db->query($statement, $this->className, true);
    }

    public function create(array $data)
    {
        $statement = "INSERT INTO article (titre,contenue,categorie_id,user_id) 
            VALUES (:titre, :contenue, :categorie_id, :user_id)";
        return $this->db->prepare($statement, $data);
    }

    public function update(array $data)
    {
        if(!isset($data['illusatration'])){
            $data['illustration'] = null;
        }
        $statement = "UPDATE article SET
                        titre = :titre,
                        contenue = :contenue,
                        categorie_id = :categorie_id,
                        user_id = :user_id,
                        illustration = :illustration
                        ";
        
        return $this->db->prepare($statement, $data);
    }

    public function delete(int $id)
    {
        $statement = "DELETE FROM article WHERE id = $id";

        return $this->db->prepare($statement, array());
    }
}