<?php

namespace querof\CodeBundle\Controller;

use querof\CodeBundle\Entity\Analyst;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Analyst controller.
 *
 */
class AnalystController extends Controller
{
    /**
     * Lists all analyst entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $analysts = $em->getRepository('querofCodeBundle:Analyst')->findAll();

        return $this->render('analyst/index.html.twig', array(
            'analyst' => $analysts,
        ));
    }

    /**
     * Creates a new analyst entity.
     *
     */
    public function newAction(Request $request)
    {
        $analyst = new Analyst();
        $form = $this->createForm('querof\CodeBundle\Form\AnalystType', $analyst);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($analyst);
            $em->flush();

            return $this->redirectToRoute('analyst_show', array('id' => $analyst->getId()));
        }

        return $this->render('analyst/new.html.twig', array(
            'analyst' => $analyst,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a analyst entity.
     *
     */
    public function showAction(Analyst $analyst)
    {
        $deleteForm = $this->createDeleteForm($analyst);

        return $this->render('analyst/show.html.twig', array(
            'analyst' => $analyst,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing analyst entity.
     *
     */
    public function editAction(Request $request, Analyst $analyst)
    {
        $deleteForm = $this->createDeleteForm($analyst);
        $editForm = $this->createForm('querof\CodeBundle\Form\AnalystType', $analyst);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('analyst_edit', array('id' => $analyst->getId()));
        }

        return $this->render('analyst/edit.html.twig', array(
            'analyst' => $analyst,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a analyst entity.
     *
     */
    public function deleteAction(Request $request, Analyst $analyst)
    {
        $form = $this->createDeleteForm($analyst);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($analyst);
            $em->flush();
        }

        return $this->redirectToRoute('analyst_index');
    }

    /**
     * Creates a form to delete a analyst entity.
     *
     * @param Analyst $analyst The analyst entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Analyst $analyst)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('analyst_delete', array('id' => $analyst->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
