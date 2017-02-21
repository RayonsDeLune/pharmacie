<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Form;

/**
 * Description of RecettePosologieType
 *
 * @author Hélène 
 */
class RecettePosologieType extends \Symfony\Component\Form\AbstractType
{

    public function buildForm(\Symfony\Component\Form\FormBuilderInterface $builder, array $options)
    {
        $builder->add("titre")
                ->add("description", \Symfony\Component\Form\Extension\Core\Type\TextareaType::class)
//                ->add('produits', 'collection', array(
//                    'type' => new PosologieType(),
//                    'allow_add' => true,
//                    'allow_delete' => true))
                ->add("symptomes", \Symfony\Bridge\Doctrine\Form\Type\EntityType::class, array("class" => "AppBundle:Symptome", "required" => false, "multiple"=>true))
                ->add("produit1", \Symfony\Bridge\Doctrine\Form\Type\EntityType::class, array("class" => "AppBundle:Produit", "required" => false))
                ->add("posologie1")
                ->add("produit2", \Symfony\Bridge\Doctrine\Form\Type\EntityType::class, array("class" => "AppBundle:Produit", "required" => false))
                ->add("posologie2")
                ->add("produit3", \Symfony\Bridge\Doctrine\Form\Type\EntityType::class, array("class" => "AppBundle:Produit", "required" => false))
                ->add("posologie3")
                ->add("produit4", \Symfony\Bridge\Doctrine\Form\Type\EntityType::class, array("class" => "AppBundle:Produit", "required" => false))
                ->add("posologie4")
                ->add("produit5", \Symfony\Bridge\Doctrine\Form\Type\EntityType::class, array("class" => "AppBundle:Produit", "required" => false))
                ->add("posologie5")
                ->add("produit6", \Symfony\Bridge\Doctrine\Form\Type\EntityType::class, array("class" => "AppBundle:Produit", "required" => false))
                ->add("posologie6")
                ->add("produit7", \Symfony\Bridge\Doctrine\Form\Type\EntityType::class, array("class" => "AppBundle:Produit", "required" => false))
                ->add("posologie7")
                ->add("produit8", \Symfony\Bridge\Doctrine\Form\Type\EntityType::class, array("class" => "AppBundle:Produit", "required" => false))
                ->add("posologie8")
                ->add("produit9", \Symfony\Bridge\Doctrine\Form\Type\EntityType::class, array("class" => "AppBundle:Produit", "required" => false))
                ->add("posologie9")
                ->add("produit10", \Symfony\Bridge\Doctrine\Form\Type\EntityType::class, array("class" => "AppBundle:Produit", "required" => false))
                ->add("posologie10")
                ->add("submit", \Symfony\Component\Form\Extension\Core\Type\SubmitType::class);
    }

}
