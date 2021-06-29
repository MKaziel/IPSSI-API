<?php
namespace App\Entity;

class Categorie {

    public $id;
    
    public $nom;

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
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of categorie
     */
    public function setNom($nom): self
    {
        $this->nom = $nom;

        return $this;
    }
}