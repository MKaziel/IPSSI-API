<?php
namespace App\Entity;

/**
 * @OA\Schema(title="Article")
 */
class Article {

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
    public $titre;
    
    /**
    *   @OA\Property(
    *   type="string",
    *   nullable=false,
    *   )
    *   @var string 
    */
    public $contenue;

    /**
    *   @OA\Property(
    *   type="integer",
    *   nullable=false,
    *   )
    *   @var int 
    */
    public $categorie_id;

    /**
    *   @OA\Property(
    *   type="integer",
    *   nullable=false,
    *   )
    *   @var int 
    */
    public $user_id;

    /**
    *   @OA\Property(
    *   type="integer",
    *   nullable=true,
    *   )
    *   @var int 
    */
    public $illustration;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of title
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of title
     */
    public function setTitre($titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of contenue
     */
    public function getContenue()
    {
        return $this->contenue;
    }

    /**
     * Set the value of contenue
     */
    public function setContenue($contenue): self
    {
        $this->contenue = $contenue;

        return $this;
    }

    /**
     * Get the value of categorie_id
     */
    public function getCategorieId()
    {
        return $this->categorie_id;
    }

    /**
     * Set the value of categorie_id
     */
    public function setCategorieId($categorie_id): self
    {
        $this->categorie_id = $categorie_id;

        return $this;
    }

    /**
     * Get the value of user_id
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     */
    public function setUserId($user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Get the value of illustration
     */
    public function getIllustration()
    {
        return $this->illustration;
    }

    /**
     * Set the value of illustration
     */
    public function setIllustration($illustration): self
    {
        $this->illustration = $illustration;

        return $this;
    }
}