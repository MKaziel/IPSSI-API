<?php

namespace App\Entity;

class Animal
{

    public $id;

    public $nom;

    public $type;

    public $race;

    public $poids;

    public $age;

    public $description;

    public $photo;

    public $proprietaire;


    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of animal
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of animal
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
