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
 * Description of LoginDTO
 *
 * @author Hélène 
 */
class LoginDTO
{
    /**
     *
     * @NotBlank(message="Le client ne peut être vide.")
     */
    private $login;

    /**
     * @Length(min=3, max=15, minMessage="La longueur doit être de plus de 3 caractères.", maxMessage="La longueur doit être de moins de 15 caractères.")
     * @NotBlank(message="Le client ne peut être vide.")
     */
    private $password;
    
    function getLogin()
    {
        return $this->login;
    }

    function getPassword()
    {
        return $this->password;
    }

    function setLogin($login)
    {
        $this->login = $login;
    }

    function setPassword($password)
    {
        $this->password = $password;
    }


}
