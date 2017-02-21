<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorie
 *
 * @ORM\Table(name="categorie")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CategorieRepository")
 */
class Categorie
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\OneToMany(targetEntity="Produit", mappedBy="categorie")
     */
    private $produits;
    
    /**
     * @ORM\OneToMany(targetEntity="Categorie", mappedBy="mere")
     */
    private $filles;
    
    /**
     * @ORM\ManyToOne(targetEntity="Categorie", inversedBy="filles")
     * @ORM\JoinColumn(name="categorie_id")
     */
    private $mere;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Categorie
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->produits = new \Doctrine\Common\Collections\ArrayCollection();
        $this->filles = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add produit
     *
     * @param \AppBundle\Entity\Produit $produit
     *
     * @return Categorie
     */
    public function addProduit(\AppBundle\Entity\Produit $produit)
    {
        $this->produits[] = $produit;

        return $this;
    }

    /**
     * Remove produit
     *
     * @param \AppBundle\Entity\Produit $produit
     */
    public function removeProduit(\AppBundle\Entity\Produit $produit)
    {
        $this->produits->removeElement($produit);
    }

    /**
     * Get produits
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProduits()
    {
        return $this->produits;
    }

    /**
     * Add fille
     *
     * @param \AppBundle\Entity\Categorie $fille
     *
     * @return Categorie
     */
    public function addFille(\AppBundle\Entity\Categorie $fille)
    {
        $this->filles[] = $fille;

        return $this;
    }

    /**
     * Remove fille
     *
     * @param \AppBundle\Entity\Categorie $fille
     */
    public function removeFille(\AppBundle\Entity\Categorie $fille)
    {
        $this->filles->removeElement($fille);
    }

    /**
     * Get filles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFilles()
    {
        return $this->filles;
    }

    /**
     * Set mere
     *
     * @param \AppBundle\Entity\Categorie $mere
     *
     * @return Categorie
     */
    public function setMere(\AppBundle\Entity\Categorie $mere = null)
    {
        $this->mere = $mere;

        return $this;
    }

    /**
     * Get mere
     *
     * @return \AppBundle\Entity\Categorie
     */
    public function getMere()
    {
        return $this->mere;
    }
    
    public function __toString()
    {
        return $this->titre;
    }
}
