<?php
namespace App\Entity;

class Article {

    public $id;
    
    public $titre;
    
    public $contenue;

    public $categorie_id;

    public $user_id;

    public $illustration;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of article
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of article
     */
    public function setTitre($titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of contenue
     */
    public function getContenue()
    {
        return $this->contenue;
    }

    /**
     * Set the value of contenue
     */
    public function setContenue($contenue): self
    {
        $this->contenue = $contenue;

        return $this;
    }

    /**
     * Get the value of categorie_id
     */
    public function getCategorieId()
    {
        return $this->categorie_id;
    }

    /**
     * Set the value of categorie_id
     */
    public function setCategorieId($categorie_id): self
    {
        $this->categorie_id = $categorie_id;

        return $this;
    }

    /**
     * Get the value of user_id
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     */
    public function setUserId($user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Get the value of illustration
     */
    public function getIllustration()
    {
        return $this->illustration;
    }

    /**
     * Set the value of illustration
     */
    public function setIllustration($illustration): self
    {
        $this->illustration = $illustration;

        return $this;
    }
}