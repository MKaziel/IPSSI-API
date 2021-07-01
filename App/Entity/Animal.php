<?php

namespace App\Entity;

/**
 * @OA\Schema(title="Animal")
 */
class Animal
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
    public $nom;

    /**
    *   @OA\Property(
    *   type="string",
    *   nullable=false,
    *   )
    *   @var string 
    */
    public $type;

    /**
    *   @OA\Property(
    *   type="string",
    *   nullable=false,
    *   )
    *   @var string 
    */
    public $race;

    /**
    *   @OA\Property(
    *   type="float",
    *   nullable=false,
    *   )
    *   @var float 
    */
    public $poids;

    /**
    *   @OA\Property(
    *   type="integer",
    *   nullable=false,
    *   )
    *   @var int 
    */
    public $age;

    /**
    *   @OA\Property(
    *   type="string",
    *   nullable=false,
    *   )
    *   @var string 
    */
    public $description;

    /**
    *   @OA\Property(
    *   type="string",
    *   nullable=false,
    *   )
    *   @var string 
    */
    public $photo;

    /**
    *   @OA\Property(
    *   type="string",
    *   nullable=true,
    *   )
    *   @var string 
    */
    public $proprietaire;

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

    /**
     * Get the value of type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     */
    public function setType($type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of race
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * Set the value of race
     */
    public function setRace($race): self
    {
        $this->race = $race;

        return $this;
    }

    /**
     * Get the value of poids
     */
    public function getPoids()
    {
        return $this->poids;
    }

    /**
     * Set the value of poids
     */
    public function setPoids($poids): self
    {
        $this->poids = $poids;

        return $this;
    }

    /**
     * Get the value of age
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set the value of poids
     */
    public function setAge($age): self
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     */
    public function setdescription($description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of photo
     */
    public function getphoto()
    {
        return $this->photo;
    }

    /**
     * Set the value of photo
     */
    public function setphoto($photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get the value of proprietaire
     */
    public function getproprietaire()
    {
        return $this->proprietaire;
    }

    /**
     * Set the value of proprietaire
     */
    public function setproprietaire($proprietaire): self
    {
        $this->proprietaire = $proprietaire; 

        return $this;
    }
}
