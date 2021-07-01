<?php
namespace App\Entity;

/**
 * @OA\Schema(title="Don")
 */
class Don {

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
    *   type="float",
    *   nullable=false,
    *   )
    *   @var float 
    */
    public $montant;

    /**
    *   @OA\Property(
    *   type="date",
    *   nullable=false,
    *   )
    *   @var date 
    */
    public $data;
    
    /**
    *   @OA\Property(
    *   type="integer",
    *   nullable=false,
    *   )
    *   @var int 
    */
    public $id_utilisateur;

    /**
    *   @OA\Property(
    *   type="bool",
    *   nullable=false,
    *   )
    *   @var bool 
    */
    public $anonyme;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of montant
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Get the date
     */
     public function getData()
     {
         return $this->montant;
     }

     /**
     * Get the id of user
     */
    public function getId_user()
    {
        return $this->id_utilisateur;
    }
    
    /**
     * Get the value anonyme 
     */
     public function getAnonyme()
     {
         return $this->anonyme;
     }
    /**
     * Set the value of montant
     */
    public function setMontant($montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Set the date
     */
     public function setData($data): self
     {
         $this->data = $data;
 
         return $this;
     }

     /**
     * Set the id of user
     */
    public function setId_user($id_utilisateur): self
    {
        $this->id_utilisateur = $id_utilisateur;

        return $this;
    }

    /**
     * Set the value of anonyme
     */
     public function setAnonyme($anonyme): self
     {
         $this->anonyme = $anonyme;
 
         return $this;
     }
}