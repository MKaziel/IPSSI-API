<?php

namespace App\Entity;

/**
 * @OA\Schema(title="Utilisateur")
 */
class Utilisateur
{

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
    public $identifiant;

    /**
    *   @OA\Property(
    *   type="string",
    *   nullable=false,
    *   )
    *   @var string 
    */
    public $motdepasse;

    /**
    *   @OA\Property(
    *   type="string",
    *   nullable=false,
    *   )
    *   @var string 
    */
    public $email;

    /**
    *   @OA\Property(
    *   type="string",
    *   nullable=false,
    *   )
    *   @var string 
    */
    public $pseudo;

    /**
    *   @OA\Property(
    *   type="string",
    *   nullable=false,
    *   )
    *   @var string 
    */
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
     * Set the value of mot de passe
     */
    public function setPassword($motdepasse): self
    {
        $this->motdepasse = $motdepasse;

        return $this;
    }
    /**
     * Set the value of role
     */
    public function setRole($role): self
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get the value of pseudo
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set the value of pseudo
     */
    public function setPseudo($pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail($email): self
    {
        $this->email = $email;

        return $this;
    }
}
