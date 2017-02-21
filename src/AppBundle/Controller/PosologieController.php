<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Posologie;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Posologie controller.
 *
 * @Route("posologie")
 */
class PosologieController extends Controller
{
    /**
     * Lists all posologie entities.
     *
     * @Route("/", name="posologie_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $posologies = $em->getRepository('AppBundle:Posologie')->findAll();

        return $this->render('posologie/index.html.twig', array(
            'posologies' => $posologies,
        ));
    }

    /**
     * Creates a new posologie entity.
     *
     * @Route("/new", name="posologie_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $posologie = new Posologie();
        $form = $this->createForm('AppBundle\Form\PosologieType', $posologie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($posologie);
            $em->flush($posologie);

            return $this->redirectToRoute('posologie_show', array('id' => $posologie->getId()));
        }

        return $this->render('posologie/new.html.twig', array(
            'posologie' => $posologie,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a posologie entity.
     *
     * @Route("/{id}", name="posologie_show")
     * @Method("GET")
     */
    public function showAction(Posologie $posologie)
    {
        $deleteForm = $this->createDeleteForm($posologie);

        return $this->render('posologie/show.html.twig', array(
            'posologie' => $posologie,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing posologie entity.
     *
     * @Route("/{id}/edit", name="posologie_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Posologie $posologie)
    {
        $deleteForm = $this->createDeleteForm($posologie);
        $editForm = $this->createForm('AppBundle\Form\PosologieType', $posologie);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('posologie_edit', array('id' => $posologie->getId()));
        }

        return $this->render('posologie/edit.html.twig', array(
            'posologie' => $posologie,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a posologie entity.
     *
     * @Route("/{id}", name="posologie_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Posologie $posologie)
    {
        $form = $this->createDeleteForm($posologie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($posologie);
            $em->flush($posologie);
        }

        return $this->redirectToRoute('posologie_index');
    }

    /**
     * Creates a form to delete a posologie entity.
     *
     * @param Posologie $posologie The posologie entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Posologie $posologie)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('posologie_delete', array('id' => $posologie->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
