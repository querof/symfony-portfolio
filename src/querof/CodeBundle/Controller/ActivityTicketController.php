<?php

namespace querof\CodeBundle\Controller;

use querof\CodeBundle\Entity\ActivityTicket;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Activityticket controller.
 *
 */
class ActivityTicketController extends Controller
{
    /**
     * Lists all activityTicket entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $activityTickets = $em->getRepository('querofCodeBundle:ActivityTicket')->findAll();

        return $this->render('activityticket/index.html.twig', array(
            'activityTicket' => $activityTickets,
        ));
    }

    /**
     * Creates a new activityTicket entity.
     *
     */
    public function newAction(Request $request)
    {
        $activityTicket = new Activityticket();
        $form = $this->createForm('querof\CodeBundle\Form\ActivityTicketType', $activityTicket);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($activityTicket);
            $em->flush();

            return $this->redirectToRoute('activityticket_show', array('id' => $activityTicket->getId()));
        }

        return $this->render('activityticket/new.html.twig', array(
            'activityTicket' => $activityTicket,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a activityTicket entity.
     *
     */
    public function showAction(ActivityTicket $activityTicket)
    {
        $deleteForm = $this->createDeleteForm($activityTicket);

        return $this->render('activityticket/show.html.twig', array(
            'activityTicket' => $activityTicket,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing activityTicket entity.
     *
     */
    public function editAction(Request $request, ActivityTicket $activityTicket)
    {
        $deleteForm = $this->createDeleteForm($activityTicket);
        $editForm = $this->createForm('querof\CodeBundle\Form\ActivityTicketType', $activityTicket);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('activityticket_edit', array('id' => $activityTicket->getId()));
        }

        return $this->render('activityticket/edit.html.twig', array(
            'activityTicket' => $activityTicket,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a activityTicket entity.
     *
     */
    public function deleteAction(Request $request, ActivityTicket $activityTicket)
    {
        $form = $this->createDeleteForm($activityTicket);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($activityTicket);
            $em->flush();
        }

        return $this->redirectToRoute('activityticket_index');
    }

    /**
     * Creates a form to delete a activityTicket entity.
     *
     * @param ActivityTicket $activityTicket The activityTicket entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ActivityTicket $activityTicket)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('activityticket_delete', array('id' => $activityTicket->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
