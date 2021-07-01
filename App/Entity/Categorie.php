<?php
namespace App\Entity;


/**
 * @OA\Schema(title="Catégorie")
 */
class Categorie {

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
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of name
     */
    public function setNom($nom): self
    {
        $this->nom = $nom;

        return $this;
    }
}