<?php

namespace UserBundle\Controller;

use UserBundle\Entity\Address;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Address controller.
 *
 */
class AddressController extends Controller
{
    /**
     * Lists all address entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $addresses = $em->getRepository('UserBundle:Address')->findAll();

        return $this->render('address/index.html.twig', array(
            'addresses' => $addresses,
        ));
    }

    /**
     * Creates a new address entity.
     *
     */
    public function newAction(Request $request)
    {
        $address = new Address();
        $form = $this->createForm('UserBundle\Form\AddressType', $address);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($address);
            $em->flush($address);

            return $this->redirectToRoute('direccion_show', array('id' => $address->getId()));
        }

        return $this->render('address/new.html.twig', array(
            'address' => $address,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a address entity.
     *
     */
    public function showAction(Address $address)
    {
        $deleteForm = $this->createDeleteForm($address);

        return $this->render('address/show.html.twig', array(
            'address' => $address,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing address entity.
     *
     */
    public function editAction(Request $request, Address $address)
    {
        $deleteForm = $this->createDeleteForm($address);
        $editForm = $this->createForm('UserBundle\Form\AddressType', $address);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('direccion_edit', array('id' => $address->getId()));
        }

        return $this->render('address/edit.html.twig', array(
            'address' => $address,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a address entity.
     *
     */
    public function deleteAction(Request $request, Address $address)
    {
        $form = $this->createDeleteForm($address);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($address);
            $em->flush($address);
        }

        return $this->redirectToRoute('direccion_index');
    }

    /**
     * Creates a form to delete a address entity.
     *
     * @param Address $address The address entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Address $address)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('direccion_delete', array('id' => $address->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
