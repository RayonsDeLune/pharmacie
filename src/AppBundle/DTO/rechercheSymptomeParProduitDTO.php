<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\DTO;

/**
 * Description of rechercheSymptomeParProduitDTO
 *
 * @author Hélène 
 */
class rechercheSymptomeParProduitDTO
{
    private $produits;
    
   function getProduits()
    {
        return $this->produits;
    }

    function setProduits($produits)
    {
        $this->produits = $produits;
    }


}
