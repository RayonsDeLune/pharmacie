<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class RecettePosologieController extends Controller
{

    /**
     * @Route("/recettePosologie", name="recettePosologie")
     */
    public function recettePosologieAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        $dto = new \AppBundle\DTO\RecettePosologieDTO();
//        $dto->setDateCreation(new \DateTime());
        $form = $this->createForm(\AppBundle\Form\RecettePosologieType::class, $dto);
        $form->handleRequest($request); // applique le form binding

        if ($form->isSubmitted() && $form->isValid())
        {
            $titre = $dto->getTitre();
            $description = $dto->getDescription();

            $em = $this->getDoctrine()->getManager();

            // construit les différentes entités correspondantes
            // construction et enregistrement de la recette
            $recette = new \AppBundle\Entity\Recette();
            $recette->setTitre($titre);
            $recette->setDescription($description);
            $recette->setValide(False);
            foreach ($dto->getSymptomes() as $symptome)
            {
                $recette->addSymptome($symptome);
            }
            // -------------- ATTENTION ici je dois récupérer la session pour mettre à jour l'auteur
            // bug : ça veut me créer un nouvel utilisateur ...  POURQUOI ????
            $user = $request->getSession()->get("user");
            $user = $em->find("AppBundle:Utilisateur", $user->getId());
//            var_dump($user);
            $recette->setUtilisateur($user);
            // on doit l'ajouter des 2 côtés de la relation
            $user->addRecette($recette);

            $em->persist($recette);

            // construction et enregistrement des posologies
            if ($dto->getPosologie1() != null)
            {
                $posologie1 = new \AppBundle\Entity\Posologie();
                $posologie1->setPosologie($dto->getPosologie1());
                $posologie1->setProduit($dto->getProduit1());
                $posologie1->setRecette($recette);

                $em->persist($posologie1);
            }

            if ($dto->getPosologie2() != null)
            {
                $posologie2 = new \AppBundle\Entity\Posologie();
                $posologie2->setPosologie($dto->getPosologie2());
                $posologie2->setProduit($dto->getProduit2());
                $posologie2->setRecette($recette);

                $em->persist($posologie2);
            }

            if ($dto->getPosologie3() != null)
            {
                $posologie3 = new \AppBundle\Entity\Posologie();
                $posologie3->setPosologie($dto->getPosologie3());
                $posologie3->setProduit($dto->getProduit3());
                $posologie3->setRecette($recette);

                $em->persist($posologie3);
            }

            if ($dto->getPosologie4() != null)
            {
                $posologie4 = new \AppBundle\Entity\Posologie();
                $posologie4->setPosologie($dto->getPosologie4());
                $posologie4->setProduit($dto->getProduit4());
                $posologie4->setRecette($recette);

                $em->persist($posologie4);
            }

            if ($dto->getPosologie5() != null)
            {
                $posologie5 = new \AppBundle\Entity\Posologie();
                $posologie5->setPosologie($dto->getPosologie5());
                $posologie5->setProduit($dto->getProduit5());
                $posologie5->setRecette($recette);

                $em->persist($posologie5);
            }
            if ($dto->getPosologie6() != null)
            {
                $posologie1 = new \AppBundle\Entity\Posologie();
                $posologie1->setPosologie($dto->getPosologie1());
                $posologie1->setProduit($dto->getProduit1());
                $posologie1->setRecette($recette);

                $em->persist($posologie1);
            }

            if ($dto->getPosologie7() != null)
            {
                $posologie1 = new \AppBundle\Entity\Posologie();
                $posologie1->setPosologie($dto->getPosologie1());
                $posologie1->setProduit($dto->getProduit1());
                $posologie1->setRecette($recette);

                $em->persist($posologie1);
            }

            if ($dto->getPosologie8() != null)
            {
                $posologie1 = new \AppBundle\Entity\Posologie();
                $posologie1->setPosologie($dto->getPosologie1());
                $posologie1->setProduit($dto->getProduit1());
                $posologie1->setRecette($recette);

                $em->persist($posologie1);
            }

            if ($dto->getPosologie9() != null)
            {
                $posologie1 = new \AppBundle\Entity\Posologie();
                $posologie1->setPosologie($dto->getPosologie1());
                $posologie1->setProduit($dto->getProduit1());
                $posologie1->setRecette($recette);

                $em->persist($posologie1);
            }

            if ($dto->getPosologie10() != null)
            {
                $posologie1 = new \AppBundle\Entity\Posologie();
                $posologie1->setPosologie($dto->getPosologie1());
                $posologie1->setProduit($dto->getProduit1());
                $posologie1->setRecette($recette);

                $em->persist($posologie1);
            }
            
            $em->flush();
            
            return $this->redirectToRoute('recette_index');
        }
        
        // affichage du formulaire
        return $this->render('AppBundle:RecettePosologie:recette_posologie.html.twig', array(
                    "monFormulaire" => $form->createView()
        ));
    }

}
