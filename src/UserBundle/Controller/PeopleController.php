<?php

namespace UserBundle\Controller;

use UserBundle\Entity\People;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Person controller.
 *
 */
class PeopleController extends Controller
{
    /**
     * Lists all person entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $people = $em->getRepository('UserBundle:People')->findAll();

        return $this->render('people/index.html.twig', array(
            'people' => $people,
        ));
    }

    /**
     * Creates a new person entity.
     *
     */
    public function newAction(Request $request)
    {
        $person = new People();
        $form = $this->createForm('UserBundle\Form\PeopleType', $person);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($person);
            $em->flush($person);

            return $this->redirectToRoute('personas_show', array('id' => $person->getId()));
        }

        return $this->render('people/new.html.twig', array(
            'person' => $person,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a person entity.
     *
     */
    public function showAction(People $person)
    {
        $deleteForm = $this->createDeleteForm($person);

        return $this->render('people/show.html.twig', array(
            'person' => $person,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing person entity.
     *
     */
    public function editAction(Request $request, People $person)
    {
        $deleteForm = $this->createDeleteForm($person);
        $editForm = $this->createForm('UserBundle\Form\PeopleType', $person);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('personas_edit', array('id' => $person->getId()));
        }

        return $this->render('people/edit.html.twig', array(
            'person' => $person,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a person entity.
     *
     */
    public function deleteAction(Request $request, People $person)
    {
        $form = $this->createDeleteForm($person);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($person);
            $em->flush($person);
        }

        return $this->redirectToRoute('personas_index');
    }

    /**
     * Creates a form to delete a person entity.
     *
     * @param People $person The person entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(People $person)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('personas_delete', array('id' => $person->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
