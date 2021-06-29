<?php
namespace App\Entity;

class Don {

    public $id;
    
    public $montant;

    public $data;
    
    public $id_utilisateur;

    public $anonyme;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of don
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Get the value of don
     */
     public function getData()
     {
         return $this->montant;
     }

     /**
     * Get the value of don
     */
    public function getId_user()
    {
        return $this->id_utilisateur;
    }
    
    /**
     * Get the value of don
     */
     public function getAnonyme()
     {
         return $this->anonyme;
     }
    /**
     * Set the value of don
     */
    public function setMontant($montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Set the value of don
     */
     public function setData($data): self
     {
         $this->data = $data;
 
         return $this;
     }

     /**
     * Set the value of don
     */
    public function setId_user($id_utilisateur): self
    {
        $this->id_utilisateur = $id_utilisateur;

        return $this;
    }

    /**
     * Set the value of don
     */
     public function setAnonyme($anonyme): self
     {
         $this->anonyme = $anonyme;
 
         return $this;
     }
}