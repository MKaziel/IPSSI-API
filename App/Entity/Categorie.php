<?php
namespace App\Entity;

class Categorie {

    public $id;
    
    public $name;

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of article
     */
    public function setName($name): self
    {
        $this->title = $name;

        return $this;
    }
}