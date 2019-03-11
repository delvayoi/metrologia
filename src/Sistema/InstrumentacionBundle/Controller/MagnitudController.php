<?php

namespace Sistema\InstrumentacionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sistema\InstrumentacionBundle\Entity\Magnitud;
use Sistema\InstrumentacionBundle\Form\MagnitudType;

/**
 * Magnitud controller.
 *
 */
class MagnitudController extends Controller
{

    /**
     * Lists all Magnitud entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('InstrumentacionBundle:Magnitud')->findAll();

        return $this->render('InstrumentacionBundle:Magnitud:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Magnitud entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Magnitud();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('magnitud_show', array('id' => $entity->getId())));
        }

        return $this->render('InstrumentacionBundle:Magnitud:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Magnitud entity.
     *
     * @param Magnitud $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Magnitud $entity)
    {
        $form = $this->createForm(new MagnitudType(), $entity, array(
            'action' => $this->generateUrl('magnitud_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Magnitud entity.
     *
     */
    public function newAction()
    {
        $entity = new Magnitud();
        $form   = $this->createCreateForm($entity);

        return $this->render('InstrumentacionBundle:Magnitud:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Magnitud entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InstrumentacionBundle:Magnitud')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Magnitud entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('InstrumentacionBundle:Magnitud:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Magnitud entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InstrumentacionBundle:Magnitud')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Magnitud entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('InstrumentacionBundle:Magnitud:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Magnitud entity.
    *
    * @param Magnitud $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Magnitud $entity)
    {
        $form = $this->createForm(new MagnitudType(), $entity, array(
            'action' => $this->generateUrl('magnitud_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Magnitud entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InstrumentacionBundle:Magnitud')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Magnitud entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('magnitud_edit', array('id' => $id)));
        }

        return $this->render('InstrumentacionBundle:Magnitud:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Magnitud entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('InstrumentacionBundle:Magnitud')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Magnitud entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('magnitud'));
    }

    /**
     * Creates a form to delete a Magnitud entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('magnitud_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
