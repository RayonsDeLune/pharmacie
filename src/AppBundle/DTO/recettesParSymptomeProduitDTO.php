<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\DTO;

/**
 * Description of recettesParSymptomeProduitDTO
 *
 * @author Hélène 
 */
class recettesParSymptomeProduitDTO
{
    private $symptomes;
    private $produits;
    
    function getSymptomes()
    {
        return $this->symptomes;
    }

    function getProduits()
    {
        return $this->produits;
    }

    function setSymptomes($symptomes)
    {
        $this->symptomes = $symptomes;
    }

    function setProduits($produits)
    {
        $this->produits = $produits;
    }



}
