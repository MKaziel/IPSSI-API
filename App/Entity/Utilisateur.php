<?php
namespace App\Entity;

class Utilisateur {

    public $id;
    
    public $identifiant;

    public $motdepasse;
    
    public $role;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the identifiant of user
     */
    public function getIdentifiant()
    {
        return $this->identifiant;
    }

    /**
     * Get the mot de passe
     */
     public function getPassword()
     {
         return $this->motdepasse;
     }

     /**
     * Get the role of user
     */
    public function getRole()
    {
        return $this->role;
    }


    /**
     * Set the value of categorie
     */
    public function setIdentifiant($identifiant): self
    {
        $this->identifiant = $identifiant;

        return $this;
    }

    /**
     * Set the value of categorie
     */
     public function setPassword($motdepasse): self
     {
         $this->motdepasse = $motdepasse;
 
         return $this;
     }
     /**
     * Set the value of categorie
     */
    public function setRole($role): self
    {
        $this->role = $role;

        return $this;
    }
    

}