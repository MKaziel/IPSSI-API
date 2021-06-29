<?php
namespace App\Entity;

class Produit {

    public $id;
    
    public $nom;

    public $prix;
    
    public $type_animal;

    public $quantite;
    
    public $description;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of produit
     */
    public function getNom()
    {
        return $this->nom;
    }

     /**
     * Get the value of produit
     */
     public function getPrix()
     {
         return $this->prix;
     }
      
     /**
     * Get the value of produit
     */
    public function getType()
    {
        return $this->type_animal;
    }
     /**
     * Get the value of produit
     */
     public function getQuantite()
     {
         return $this->quantite;
     }
     
     /**
     * Get the value of produit
     */
     public function getDescription()
     {
         return $this->description;
     }

    /**
     * Set the value of produit
     */
    public function setNom($nom): self
    {
        $this->nom = $nom;

        return $this;
    }
    /**
     * Set the value of produit
     */
     public function setPrix($prix): self
     {
         $this->prix = $prix;
 
         return $this;
     }
     /**
     * Set the value of produit
     */
    public function setType($type_animal): self
    {
        $this->type_animal = $type_animal;

        return $this;
    }
    /**
     * Set the value of produit
     */
     public function setQuantite($quantite): self
     {
         $this->quantite = $quantite;
 
         return $this;
     }
     /**
     * Set the value of produit
     */
    public function setDescription($description): self
    {
        $this->description = $description;

        return $this;
    }
}