<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 *
 * @ORM\Table(name="produit")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProduitRepository")
 */
class Produit
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
     * @ORM\ManyToMany(targetEntity="Symptome", inversedBy="produits")
     * @ORM\JoinTable(name="produit_symptome")
     */
    private $symptomes;
    
    /**
     * @ORM\OneToMany(targetEntity="Posologie", mappedBy="produit")
     */
    private $posologies;

    /**
     * @ORM\ManyToOne(targetEntity="Categorie", inversedBy="produits")
     * @ORM\JoinColumn(name="categorie_id")
     */
    private $categorie;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="restriction", type="text", nullable=true)
     */
    private $restriction;

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
     * Constructor
     */
    public function __construct()
    {
        $this->symptomes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->posologies = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Produit
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Produit
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
     * Set restriction
     *
     * @param string $restriction
     *
     * @return Produit
     */
    public function setRestriction($restriction)
    {
        $this->restriction = $restriction;

        return $this;
    }

    /**
     * Get restriction
     *
     * @return string
     */
    public function getRestriction()
    {
        return $this->restriction;
    }

    /**
     * Add symptome
     *
     * @param \AppBundle\Entity\Symptome $symptome
     *
     * @return Produit
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
     * @return Produit
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
     * Set categorie
     *
     * @param \AppBundle\Entity\Categorie $categorie
     *
     * @return Produit
     */
    public function setCategorie(\AppBundle\Entity\Categorie $categorie = null)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \AppBundle\Entity\Categorie
     */
    public function getCategorie()
    {
        return $this->categorie;
    }
    
    public function __toString()
    {
        return $this->nom;
    }
}
