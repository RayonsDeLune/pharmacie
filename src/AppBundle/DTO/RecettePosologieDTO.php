<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\DTO;

use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

/**
 * Description of RecettePosologieDTO
 *
 * @author Hélène 
 */
class RecettePosologieDTO
{

    /**
     * @Length(min=3, max=50, minMessage="La longueur doit être de plus de 3 caractères.", maxMessage="La longueur doit être de moins de 50 caractères.")
     * @NotBlank(message="Le titre ne peut être vide.")
     */
    private $titre;
    
    /**
     * @Length(min=3, minMessage="La longueur doit être de plus de 3 caractères.")
     * @NotBlank(message="La description ne peut être vide.")
     */
    private $description;
    
    private $symptomes;
    
    private $produit1;
    private $posologie1;
    private $produit2;
    private $posologie2;
    private $produit3;
    private $posologie3;
    private $produit4;
    private $posologie4;
    private $produit5;
    private $posologie5;
    private $produit6;
    private $posologie6;
    private $produit7;
    private $posologie7;
    private $produit8;
    private $posologie8;
    private $produit9;
    private $posologie9;
    private $produit10;
    private $posologie10;
    

    function getSymptomes()
    {
        return $this->symptomes;
    }

    function getProduit1()
    {
        return $this->produit1;
    }

    function getPosologie1()
    {
        return $this->posologie1;
    }

    function getProduit2()
    {
        return $this->produit2;
    }

    function getPosologie2()
    {
        return $this->posologie2;
    }

    function getProduit3()
    {
        return $this->produit3;
    }

    function getPosologie3()
    {
        return $this->posologie3;
    }

    function getProduit4()
    {
        return $this->produit4;
    }

    function getPosologie4()
    {
        return $this->posologie4;
    }

    function getProduit5()
    {
        return $this->produit5;
    }

    function getPosologie5()
    {
        return $this->posologie5;
    }

    function getProduit6()
    {
        return $this->produit6;
    }

    function getPosologie6()
    {
        return $this->posologie6;
    }

    function getProduit7()
    {
        return $this->produit7;
    }

    function getPosologie7()
    {
        return $this->posologie7;
    }

    function getProduit8()
    {
        return $this->produit8;
    }

    function getPosologie8()
    {
        return $this->posologie8;
    }

    function getProduit9()
    {
        return $this->produit9;
    }

    function getPosologie9()
    {
        return $this->posologie9;
    }

    function getProduit10()
    {
        return $this->produit10;
    }

    function getPosologie10()
    {
        return $this->posologie10;
    }

    function getTitre()
    {
        return $this->titre;
    }

    function getDescription()
    {
        return $this->description;
    }

    function setTitre($titre)
    {
        $this->titre = $titre;
    }

    function setDescription($description)
    {
        $this->description = $description;
    }

    function setSymptomes($symptomes)
    {
        $this->symptomes = $symptomes;
    }

    function setProduit1($produit1)
    {
        $this->produit1 = $produit1;
    }

    function setPosologie1($posologie1)
    {
        $this->posologie1 = $posologie1;
    }

    function setProduit2($produit2)
    {
        $this->produit2 = $produit2;
    }

    function setPosologie2($posologie2)
    {
        $this->posologie2 = $posologie2;
    }

    function setProduit3($produit3)
    {
        $this->produit3 = $produit3;
    }

    function setPosologie3($posologie3)
    {
        $this->posologie3 = $posologie3;
    }

    function setProduit4($produit4)
    {
        $this->produit4 = $produit4;
    }

    function setPosologie4($posologie4)
    {
        $this->posologie4 = $posologie4;
    }

    function setProduit5($produit5)
    {
        $this->produit5 = $produit5;
    }

    function setPosologie5($posologie5)
    {
        $this->posologie5 = $posologie5;
    }

    function setProduit6($produit6)
    {
        $this->produit6 = $produit6;
    }

    function setPosologie6($posologie6)
    {
        $this->posologie6 = $posologie6;
    }

    function setProduit7($produit7)
    {
        $this->produit7 = $produit7;
    }

    function setPosologie7($posologie7)
    {
        $this->posologie7 = $posologie7;
    }

    function setProduit8($produit8)
    {
        $this->produit8 = $produit8;
    }

    function setPosologie8($posologie8)
    {
        $this->posologie8 = $posologie8;
    }

    function setProduit9($produit9)
    {
        $this->produit9 = $produit9;
    }

    function setPosologie9($posologie9)
    {
        $this->posologie9 = $posologie9;
    }

    function setProduit10($produit10)
    {
        $this->produit10 = $produit10;
    }

    function setPosologie10($posologie10)
    {
        $this->posologie10 = $posologie10;
    }



}
