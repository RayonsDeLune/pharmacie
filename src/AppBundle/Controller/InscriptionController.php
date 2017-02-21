<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/*
 * Controlleur qui gère l'inscription, la connexion et la déconnexion
 */
class InscriptionController extends Controller
{

    /**
     * @Route("/inscription", name="inscription")
     */
    public function inscriptionAction(\Symfony\Component\HttpFoundation\Request $req)
    {
        $dto = new \AppBundle\DTO\InscriptionDTO(); // crée un DTO
        $form = $this->createForm(\AppBundle\Form\InscriptionType::class, $dto); // crée le formulaire
        $form->handleRequest($req); // applique le form binding

        if ($form->isSubmitted() && $form->isValid())
        {
            // ajout de l'utilisateur en BDD
            $user = new \AppBundle\Entity\Utilisateur();
            $user->setLogin($dto->getLogin());
            $user->setPassword($dto->getPassword1());
            $user->setAdmin(false);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user); // requete d'insertion sql
            $em->flush();

            return $this->render("::message.html.twig", array("message" => "inscription réussie"));
        }

        // ici le formulaire n'a pas été posté ou est invalide
        return $this->render("AppBundle:Inscription:inscription.html.twig", array("monForm" => $form->createView()));
    }

    /**
     * @Route("/login", name="login")
     */
    public function loginAction(\Symfony\Component\HttpFoundation\Request $req)
    {
        $dto = new \AppBundle\DTO\LoginDTO(); // crée un DTO de type Login
        $form = $this->createForm(\AppBundle\Form\LoginType::class, $dto); // crée le formulaire
        $form->handleRequest($req); // applique le form binding
        $message = "";
        if ($form->isSubmitted() && $form->isValid())
        {
            // le formulaire est valide
            // il faut vérifier que le login / mot de passe existe bien dans la base
            $em = $this->getDoctrine()->getManager();
            $requete = "SELECT u FROM AppBundle:Utilisateur u "
                    . "WHERE u.login = :login "
                    . "AND u.password = :password ";
            $res = $em->createQuery($requete);
            $res->setParameter("login", $dto->getLogin());
            $res->setParameter("password", $dto->getPassword());
            $user = $res->getOneOrNullResult();
            
            // façon plus courte et plus directe : 
            //$user = $res->findOneBy(array("login"=>$dto->getLogin(), "password"=>$dto->getPassword()));

            if ($user == NULL)
            {
                // ici on n'a pas retrouvé l'utilisateur
                $message = "Login / mot de passe invalide.";
            } 
            else
            {
                // ici on a trouvé l'utilisateur
                // puis mettre l'id et le login de l'utilisateur en session
                $req->getSession()->set("user", $user);
                // et aussi s'il est admin 
                if ($user->getAdmin())
                {
                    $req->getSession()->set("admin", true);
                }
                // affiche la liste des recettes 
                return  $this->redirectToRoute('listeDernieresRecettes');
            }
        }

        // ici le formulaire n'a pas été posté ou est invalide, ou utilisateur non trouvé
        return $this->render("AppBundle:Inscription:login.html.twig", array("monForm" => $form->createView(), "message" => $message));
    }
    
    /**
     * @Route("/deconnexion", name="deconnexion")
     */
    public function deconnexionAction(\Symfony\Component\HttpFoundation\Request $req)
    {
        // pas de formulaire
        // on vide juste les sessions
        $req->getSession()->clear();
        // page de redirection 
        return  $this->redirectToRoute('listeDernieresRecettes');
    }

}
