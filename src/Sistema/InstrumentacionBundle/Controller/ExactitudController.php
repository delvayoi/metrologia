<?php

namespace Sistema\InstrumentacionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sistema\InstrumentacionBundle\Entity\Exactitud;
use Sistema\InstrumentacionBundle\Form\ExactitudType;

/**
 * Exactitud controller.
 *
 */
class ExactitudController extends Controller
{

    /**
     * Lists all Exactitud entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('InstrumentacionBundle:Exactitud')->findAll();

        return $this->render('InstrumentacionBundle:Exactitud:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Exactitud entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Exactitud();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('exactitud_show', array('id' => $entity->getId())));
        }

        return $this->render('InstrumentacionBundle:Exactitud:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Exactitud entity.
     *
     * @param Exactitud $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Exactitud $entity)
    {
        $form = $this->createForm(new ExactitudType(), $entity, array(
            'action' => $this->generateUrl('exactitud_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Exactitud entity.
     *
     */
    public function newAction()
    {
        $entity = new Exactitud();
        $form   = $this->createCreateForm($entity);

        return $this->render('InstrumentacionBundle:Exactitud:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Exactitud entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InstrumentacionBundle:Exactitud')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Exactitud entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('InstrumentacionBundle:Exactitud:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Exactitud entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InstrumentacionBundle:Exactitud')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Exactitud entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('InstrumentacionBundle:Exactitud:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Exactitud entity.
    *
    * @param Exactitud $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Exactitud $entity)
    {
        $form = $this->createForm(new ExactitudType(), $entity, array(
            'action' => $this->generateUrl('exactitud_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Exactitud entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InstrumentacionBundle:Exactitud')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Exactitud entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('exactitud_edit', array('id' => $id)));
        }

        return $this->render('InstrumentacionBundle:Exactitud:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Exactitud entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('InstrumentacionBundle:Exactitud')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Exactitud entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('exactitud'));
    }

    /**
     * Creates a form to delete a Exactitud entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('exactitud_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
