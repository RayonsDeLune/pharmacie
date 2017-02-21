<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class PharmacieController extends Controller
{

    /**
     * @Route("/detailRecette/{id}" , name="detailRecette")
     */
    public function detailRecetteAction($id)
    {
        $qb = new \Doctrine\ORM\QueryBuilder($this->getDoctrine()->getManager());
        $qb->select("r")->from("AppBundle:Recette", "r")
                ->where("r.id=:id")
                ->setParameter("id", $id);

        $res = $qb->getQuery();
        $recette = $res->getSingleResult();

        return $this->render('AppBundle:Pharmacie:detailRecette.html.twig', array(
                    "recette" => $recette
        ));
    }

    /**
     * @Route("/detailProduit/{id}" , name="detailProduit")
     */
    public function detailProduitAction($id)
    {
        $qb = new \Doctrine\ORM\QueryBuilder($this->getDoctrine()->getManager());
        $qb->select("p")->from("AppBundle:Produit", "p")
                ->where("p.id=:id")
                ->setParameter("id", $id);

        $res = $qb->getQuery();
        $produit = $res->getSingleResult();

        return $this->render('AppBundle:Pharmacie:detailProduit.html.twig', array(
                    "produit" => $produit
        ));
    }

    /**
     * @Route("/rechercheRecetteParSymptomeProduit", name="rechercheRecetteParSymptomeProduit")
     */
    public function rechercheRecetteParSymptomeProduitAction(\Symfony\Component\HttpFoundation\Request $req)
    {
        $dto = new \AppBundle\DTO\recettesParSymptomeProduitDTO(); // crée DTO
        $form = $this->createForm(\AppBundle\Form\recettesParSymptomeProduitType::class, $dto); //crée formulaire
        $form->handleRequest($req); // applique form binding

        $qb = new \Doctrine\ORM\QueryBuilder($this->getDoctrine()->getManager());
        $qb->select("r")->from("AppBundle:Recette", "r");

        if ($form->isSubmitted() && $form->isValid())
        {
            //si formulaire a été envoyé et validé
            $produits = $dto->getProduits();
            $symptomes = $dto->getSymptomes();
            if (sizeof($produits) > 0)
            {
                $qb->join("r.produits", "p");
                $qb->andWhere("p IN (:produits)")->setParameter("produits", $produits);
            }

            if (sizeof($symptomes) > 0)
            {
                $qb->join("r.symptomes", "s");
                $qb->andWhere("s IN (:symptomes)")->setParameter("symptomes", $symptomes);
            }
        }
        $res = $qb->getQuery();
        $recette = $res->getResult();
        return $this->render("AppBundle:Pharmacie:recherche_recette_par_symptome_produit.html.twig", array("monForm" => $form->createView(),
                    "mesRecettes" => $recette
        ));
    }

    /**
     * @Route("/rechercheProduitParSymptomeCategorie", name="rechercheProduitParSymptomeCategorie")
     */
    public function rechercheProduitParSymptomeCategorieAction(\Symfony\Component\HttpFoundation\Request $req)
    {
        $dto = new \AppBundle\DTO\produitsParSymptomeCategorieDTO(); // crée DTO
        $form = $this->createForm(\AppBundle\Form\produitsParSymptomeCategorieType::class, $dto); //crée formulaire
        $form->handleRequest($req); // applique form binding

        $categories = $dto->getCategories();
        $symptomes = $dto->getSymptomes();

        $qb = new \Doctrine\ORM\QueryBuilder($this->getDoctrine()->getManager());
        $qb->select("p")->from("AppBundle:Produit", "p");

        if ($form->isSubmitted() && $form->isValid())
        {//si formulaire a été envoyé et validé
            if (sizeof($categories) > 0)
            {
                $qb->join("p.categories", "c");
                $qb->andWhere("c IN (:categories)")->setParameter("categories", $categories);
            }

            if (sizeof($symptomes) > 0)
            {
                $qb->join("p.symptomes", "s");
                $qb->andWhere("s IN (:symptomes)")->setParameter("symptomes", $symptomes);
            }
        }
        $res = $qb->getQuery();
        $recette = $res->getResult();
        return $this->render("AppBundle:Pharmacie:recherche_produit_par_symptome_categorie.html.twig", array("monForm" => $form->createView(),
                    "mesProduits" => $recette
        ));
    }

    /**
     * @Route("/rechercheSymptomeParProduit", name="rechercheSymptomeParProduit")
     */
    public function rechercheSymptomeParProduitAction(\Symfony\Component\HttpFoundation\Request $req)
    {
        $dto = new \AppBundle\DTO\rechercheSymptomeParProduitDTO(); // crée DTO
        $form = $this->createForm(\AppBundle\Form\rechercheSymptomeParProduitType::class, $dto); //crée formulaire
        $form->handleRequest($req); // applique form binding

        $produits = $dto->getProduits();

        $qb = new \Doctrine\ORM\QueryBuilder($this->getDoctrine()->getManager());
        $qb->select("s")->from("AppBundle:Symptome", "s");

        if ($form->isSubmitted() && $form->isValid())
        {//si formulaire a été envoyé et validé
            if (sizeof($produits) > 0)
            {
                $qb->join("s.produits", "p");
                $qb->andWhere("p IN (:produits)")->setParameter("produits", $produits);
            }
        }
        $res = $qb->getQuery();
        $recette = $res->getResult();
        return $this->render("AppBundle:Pharmacie:recherche_symptome_par_produit.html.twig", array("monForm" => $form->createView(),
                    "mesSymptomes" => $recette
        ));
    }

    /**
     * -----------------  AVEC PAGINATION  (peut-etre ?? )
     * @Route("/listeDernieresRecettes/{page}", name="listeDernieresRecettes")
     */
    public function listeDernieresRecettesAction($page=0)
    {
        $nbRes = 2 ; // nb de résultats par page
        // récup les recettes en bdd
        $em = $this->getDoctrine()->getManager();
        $req = "SELECT r"
                . " FROM AppBundle:Recette r "
                . " LEFT JOIN r.posologies pos "
                . " JOIN pos.produit p "
                . " LEFT JOIN r.symptomes s ";
//                . " WHERE r.valide=1 "
//                . " ORDER BY r.titre ";
        $res = $em->createQuery($req);
        $recettes = $res->getResult();
        //  calcule le nb de pages
        $nbPages = (int)(sizeof($recettes) / $nbRes);
        
        // Envoie la var 'recettes' 
        return $this->render("AppBundle:Pharmacie:liste_dernieres_recettes.html.twig", 
                array('mesRecettes' => $recettes, 
                    'titre' => 'Liste des recettes',
                    "nbPages"=>$nbPages,
                    "pageAct"=>$page));
    }

    /**
     * @Route("/listeDerniersProduits", name="listeDerniersProduits")
     */
    public function listeDerniersProduitsAction()
    {

        // récup les recettes en bdd
        $em = $this->getDoctrine()->getManager();
        $req = "SELECT p "
                . " FROM AppBundle:Produit p ";

//                . " WHERE r.valide=1 "
//                . " ORDER BY r.titre ";
        $res = $em->createQuery($req);
        $produits = $res->getResult();
//        var_dump ($recettes);
        // Envoie la var 'recettes' 
        return $this->render("AppBundle:Pharmacie:liste_derniers_produits.html.twig", array('mesProduits' => $produits, 'titre' => 'Liste des derniers produits'));
    }

}
