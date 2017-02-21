<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Form;

/**
 * Description of produitsParSymptomeCategorieType
 *
 * @author Hélène 
 */
class produitsParSymptomeCategorieType extends  \Symfony\Component\Form\AbstractType
{
    public function buildForm(\Symfony\Component\Form\FormBuilderInterface $builder, array $options)
    {
        $builder->add("symptomes", \Symfony\Bridge\Doctrine\Form\Type\EntityType::class, array("class" => "AppBundle:Symptome", "required" => false, "multiple"=>true))
                ->add("categories", \Symfony\Bridge\Doctrine\Form\Type\EntityType::class, array("class" => "AppBundle:Categorie", "required" => false, "multiple"=>true))
                ->add("submit", \Symfony\Component\Form\Extension\Core\Type\SubmitType::class);
    }

}
