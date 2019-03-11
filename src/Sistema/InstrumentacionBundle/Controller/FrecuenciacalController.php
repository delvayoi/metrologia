<?php

namespace Sistema\InstrumentacionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sistema\InstrumentacionBundle\Entity\Frecuenciacal;
use Sistema\InstrumentacionBundle\Form\FrecuenciacalType;

/**
 * Frecuenciacal controller.
 *
 */
class FrecuenciacalController extends Controller
{

    /**
     * Lists all Frecuenciacal entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('InstrumentacionBundle:Frecuenciacal')->findAll();

        return $this->render('InstrumentacionBundle:Frecuenciacal:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Frecuenciacal entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Frecuenciacal();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('frecuenciacal_show', array('id' => $entity->getId())));
        }

        return $this->render('InstrumentacionBundle:Frecuenciacal:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Frecuenciacal entity.
     *
     * @param Frecuenciacal $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Frecuenciacal $entity)
    {
        $form = $this->createForm(new FrecuenciacalType(), $entity, array(
            'action' => $this->generateUrl('frecuenciacal_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Frecuenciacal entity.
     *
     */
    public function newAction()
    {
        $entity = new Frecuenciacal();
        $form   = $this->createCreateForm($entity);

        return $this->render('InstrumentacionBundle:Frecuenciacal:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Frecuenciacal entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InstrumentacionBundle:Frecuenciacal')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Frecuenciacal entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('InstrumentacionBundle:Frecuenciacal:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Frecuenciacal entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InstrumentacionBundle:Frecuenciacal')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Frecuenciacal entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('InstrumentacionBundle:Frecuenciacal:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Frecuenciacal entity.
    *
    * @param Frecuenciacal $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Frecuenciacal $entity)
    {
        $form = $this->createForm(new FrecuenciacalType(), $entity, array(
            'action' => $this->generateUrl('frecuenciacal_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Frecuenciacal entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InstrumentacionBundle:Frecuenciacal')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Frecuenciacal entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('frecuenciacal_edit', array('id' => $id)));
        }

        return $this->render('InstrumentacionBundle:Frecuenciacal:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Frecuenciacal entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('InstrumentacionBundle:Frecuenciacal')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Frecuenciacal entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('frecuenciacal'));
    }

    /**
     * Creates a form to delete a Frecuenciacal entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('frecuenciacal_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
