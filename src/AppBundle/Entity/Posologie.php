<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Posologie
 *
 * @ORM\Table(name="posologie")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PosologieRepository")
 */
class Posologie
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
     * @ORM\ManyToOne(targetEntity="Produit", inversedBy="posologies")
     * @ORM\JoinColumn(name="produit_id")
     */
    private $produit;
    
     /**
     * @ORM\ManyToOne(targetEntity="Recette", inversedBy="posologies")
     * @ORM\JoinColumn(name="recette_id")
     */
    private $recette;

    /**
     * @var string
     *
     * @ORM\Column(name="posologie", type="string", length=255)
     */
    private $posologie;


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
     * Set posologie
     *
     * @param string $posologie
     *
     * @return Posologie
     */
    public function setPosologie($posologie)
    {
        $this->posologie = $posologie;

        return $this;
    }

    /**
     * Get posologie
     *
     * @return string
     */
    public function getPosologie()
    {
        return $this->posologie;
    }

    /**
     * Set produit
     *
     * @param \AppBundle\Entity\Produit $produit
     *
     * @return Posologie
     */
    public function setProduit(\AppBundle\Entity\Produit $produit = null)
    {
        $this->produit = $produit;

        return $this;
    }

    /**
     * Get produit
     *
     * @return \AppBundle\Entity\Produit
     */
    public function getProduit()
    {
        return $this->produit;
    }

    /**
     * Set recette
     *
     * @param \AppBundle\Entity\Recette $recette
     *
     * @return Posologie
     */
    public function setRecette(\AppBundle\Entity\Recette $recette = null)
    {
        $this->recette = $recette;

        return $this;
    }

    /**
     * Get recette
     *
     * @return \AppBundle\Entity\Recette
     */
    public function getRecette()
    {
        return $this->recette;
    }
    
    public function __toString()
    {
        return $this->posologie;
    }
}
