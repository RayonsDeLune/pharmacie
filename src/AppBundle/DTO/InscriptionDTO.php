<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\DTO;

use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Callback;
use Symfony\Component\Validator\Constraints\Length;

/**
 * Description of InscriptionDTO
 *
 * @author Hélène 
 */
class InscriptionDTO
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
    private $password1;

    /**
     * @Length(min=3, max=15, minMessage="La longueur doit être de plus de 3 caractères.", maxMessage="La longueur doit être de moins de 15 caractères.")
     * @NotBlank(message="Le client ne peut être vide.")
     */
    private $password2;

    function getLogin()
    {
        return $this->login;
    }

    function getPassword1()
    {
        return $this->password1;
    }

    function getPassword2()
    {
        return $this->password2;
    }

    function setLogin($login)
    {
        $this->login = $login;
    }

    function setPassword1($password1)
    {
        $this->password1 = $password1;
    }

    function setPassword2($password2)
    {
        $this->password2 = $password2;
    }

    /**
     * 
     * @Callback()
     */
    public function maCallBack(\Symfony\Component\Validator\Context\ExecutionContextInterface $context, $payload)
    {
        if ($this->password1 != $this->password2)
        {
            $context->buildViolation("Les 2 mots de passe doivent être identiques.")->addViolation();
        }
    }

}
