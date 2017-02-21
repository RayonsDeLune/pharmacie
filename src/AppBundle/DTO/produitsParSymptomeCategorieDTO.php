<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\DTO;

/**
 * Description of produitsParSymptomeCategorieDTO
 *
 * @author Hélène 
 */
class produitsParSymptomeCategorieDTO
{
    private $symptomes;
    private $categories;
    
    function getSymptomes()
    {
        return $this->symptomes;
    }

    function getCategories()
    {
        return $this->categories;
    }

    function setSymptomes($symptomes)
    {
        $this->symptomes = $symptomes;
    }

    function setCategories($categories)
    {
        $this->categories = $categories;
    }


}
