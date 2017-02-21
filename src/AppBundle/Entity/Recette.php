<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Recette
 *
 * @ORM\Table(name="recette")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RecetteRepository")
 */
class Recette
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
     * @ORM\ManyToMany(targetEntity="Symptome", inversedBy="recettes")
     * @ORM\JoinTable(name="recette_symptome")
     */
    private $symptomes;
    
     /**
     * @ORM\OneToMany(targetEntity="Posologie", mappedBy="recette")
     */
    private $posologies;
    
    /**
     * , cascade={"persist"}
     * @ORM\ManyToOne(targetEntity="Utilisateur", inversedBy="recettes")
     * @ORM\JoinColumn(name="utilisateur_id")
     */
    private $utilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var bool
     *
     * @ORM\Column(name="valide", type="boolean")
     */
    private $valide;


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
     * @return Recette
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
     * Set description
     *
     * @param string $description
     *
     * @return Recette
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set valide
     *
     * @param boolean $valide
     *
     * @return Recette
     */
    public function setValide($valide)
    {
        $this->valide = $valide;

        return $this;
    }

    /**
     * Get valide
     *
     * @return bool
     */
    public function getValide()
    {
        return $this->valide;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->symptomes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->posologies = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add symptome
     *
     * @param \AppBundle\Entity\Symptome $symptome
     *
     * @return Recette
     */
    public function addSymptome(\AppBundle\Entity\Symptome $symptome)
    {
        $this->symptomes[] = $symptome;

        return $this;
    }

    /**
     * Remove symptome
     *
     * @param \AppBundle\Entity\Symptome $symptome
     */
    public function removeSymptome(\AppBundle\Entity\Symptome $symptome)
    {
        $this->symptomes->removeElement($symptome);
    }

    /**
     * Get symptomes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSymptomes()
    {
        return $this->symptomes;
    }

    /**
     * Add posology
     *
     * @param \AppBundle\Entity\Posologie $posology
     *
     * @return Recette
     */
    public function addPosology(\AppBundle\Entity\Posologie $posology)
    {
        $this->posologies[] = $posology;

        return $this;
    }

    /**
     * Remove posology
     *
     * @param \AppBundle\Entity\Posologie $posology
     */
    public function removePosology(\AppBundle\Entity\Posologie $posology)
    {
        $this->posologies->removeElement($posology);
    }

    /**
     * Get posologies
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPosologies()
    {
        return $this->posologies;
    }

    /**
     * Set utilisateur
     *
     * @param \AppBundle\Entity\Utilisateur $utilisateur
     *
     * @return Recette
     */
    public function setUtilisateur(\AppBundle\Entity\Utilisateur $utilisateur = null)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return \AppBundle\Entity\Utilisateur
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }
    
    public function __toString()
    {
        return $this->titre;
    }
}
