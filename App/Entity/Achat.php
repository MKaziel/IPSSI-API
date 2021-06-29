<?php

namespace App\Entity;

class Achat
{

    public $id;

    public $id_utilisateur;

    public $id_produit;

    public $montatnt;

    public $quantite;


    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of id_utilisateur
     */
    public function getIdUtilisateur()
    {
        return $this->id_utilisateur;
    }

    /**
     * Set the value of id_utilisateur
     */
    public function setIdUtilisateur($id_utilisateur): self
    {
        $this->id_utilisateur = $id_utilisateur;

        return $this;
    }

    /**
     * Get the value of id_produit
     */
    public function getIdProduit()
    {
        return $this->id_produit;
    }

        /**
     * Set the value of id_produit
     */
     public function setIdProduit($id_produit): self
     {
         $this->id_produit = $id_produit;
 
         return $this;
     }

    /**
     * Get the value of montant
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set the value of montant
     */
    public function setMontant($montatnt): self
    {
        $this->montatnt = $montatnt;

        return $this;
    }

    /**
     * Get the value of quantite
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

        /**
     * Set the value of quantite
     */
     public function setQuantite($quantite): self
     {
         $this->quantite = $quantite;
 
         return $this;
     }
}
