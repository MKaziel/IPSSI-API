<?php
namespace App\Entity;

/**
 * @OA\Schema(title="Produit")
 */
class Produit {

    /**
    *   @OA\Property(
    *   type="integer",
    *   nullable=false,
    *   )
    *   @var int 
    */
    public $id;
    
    /**
    *   @OA\Property(
    *   type="string",
    *   nullable=false,
    *   )
    *   @var string 
    */
    public $nom;

    /**
    *   @OA\Property(
    *   type="float",
    *   nullable=false,
    *   )
    *   @var float 
    */
    public $prix;
    
    /**
    *   @OA\Property(
    *   type="string",
    *   nullable=false,
    *   )
    *   @var string 
    */
    public $type_animal;

    /**
    *   @OA\Property(
    *   type="integer",
    *   nullable=false,
    *   )
    *   @var int 
    */
    public $quantite;
    
    /**
    *   @OA\Property(
    *   type="string",
    *   nullable=true,
    *   )
    *   @var string 
    */
    public $description;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of nom
     */
    public function getNom()
    {
        return $this->nom;
    }

     /**
     * Get the value of prix
     */
     public function getPrix()
     {
         return $this->prix;
     }
      
     /**
     * Get the type of animal
     */
    public function getType()
    {
        return $this->type_animal;
    }
     /**
     * Get the value of quantite
     */
     public function getQuantite()
     {
         return $this->quantite;
     }
     
     /**
     * Get the descrption
     */
     public function getDescription()
     {
         return $this->description;
     }

    /**
     * Set the value of name
     */
    public function setNom($nom): self
    {
        $this->nom = $nom;

        return $this;
    }
    /**
     * Set the value of prix
     */
     public function setPrix($prix): self
     {
         $this->prix = $prix;
 
         return $this;
     }
     /**
     * Set the type of animal
     */
    public function setType($type_animal): self
    {
        $this->type_animal = $type_animal;

        return $this;
    }
    /**
     * Set the value of quantite
     */
     public function setQuantite($quantite): self
     {
         $this->quantite = $quantite;
 
         return $this;
     }
     /**
     * Set the value of description
     */
    public function setDescription($description): self
    {
        $this->description = $description;

        return $this;
    }
}