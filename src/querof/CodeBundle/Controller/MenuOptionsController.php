<?php

namespace querof\CodeBundle\Controller;

use querof\CodeBundle\Entity\MenuOptions;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Menuoption controller.
 *
 */
class MenuOptionsController extends Controller
{
    /**
     * Lists all menuOption entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $menuOptions = $em->getRepository('querofCodeBundle:MenuOptions')->findAll();

        return $this->render('menuoptions/index.html.twig', array(
            'menuOptions' => $menuOptions,
        ));
    }

    /**
     * Creates a new menuOption entity.
     *
     */
    public function newAction(Request $request)
    {
        $menuOption = new Menuoptions();
        $form = $this->createForm('querof\CodeBundle\Form\MenuOptionsType', $menuOption);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($menuOption);
            $em->flush();

            return $this->redirectToRoute('menuoptions_show', array('id' => $menuOption->getId()));
        }

        return $this->render('menuoptions/new.html.twig', array(
            'menuOption' => $menuOption,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a menuOption entity.
     *
     */
    public function showAction(MenuOptions $menuOption)
    {
        $deleteForm = $this->createDeleteForm($menuOption);

        return $this->render('menuoptions/show.html.twig', array(
            'menuOption' => $menuOption,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing menuOption entity.
     *
     */
    public function editAction(Request $request, MenuOptions $menuOption)
    {
        $deleteForm = $this->createDeleteForm($menuOption);
        $editForm = $this->createForm('querof\CodeBundle\Form\MenuOptionsType', $menuOption);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('menuoptions_edit', array('id' => $menuOption->getId()));
        }

        return $this->render('menuoptions/edit.html.twig', array(
            'menuOption' => $menuOption,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a menuOption entity.
     *
     */
    public function deleteAction(Request $request, MenuOptions $menuOption)
    {
        $form = $this->createDeleteForm($menuOption);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($menuOption);
            $em->flush();
        }

        return $this->redirectToRoute('menuoptions_index');
    }

    /**
     * Creates a form to delete a menuOption entity.
     *
     * @param MenuOptions $menuOption The menuOption entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MenuOptions $menuOption)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('menuoptions_delete', array('id' => $menuOption->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
