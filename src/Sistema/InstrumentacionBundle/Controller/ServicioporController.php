<?php

namespace Sistema\InstrumentacionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sistema\InstrumentacionBundle\Entity\Serviciopor;
use Sistema\InstrumentacionBundle\Form\ServicioporType;

/**
 * Serviciopor controller.
 *
 */
class ServicioporController extends Controller
{

    /**
     * Lists all Serviciopor entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('InstrumentacionBundle:Serviciopor')->findAll();

        return $this->render('InstrumentacionBundle:Serviciopor:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Serviciopor entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Serviciopor();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('serviciopor_show', array('id' => $entity->getId())));
        }

        return $this->render('InstrumentacionBundle:Serviciopor:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Serviciopor entity.
     *
     * @param Serviciopor $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Serviciopor $entity)
    {
        $form = $this->createForm(new ServicioporType(), $entity, array(
            'action' => $this->generateUrl('serviciopor_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Serviciopor entity.
     *
     */
    public function newAction()
    {
        $entity = new Serviciopor();
        $form   = $this->createCreateForm($entity);

        return $this->render('InstrumentacionBundle:Serviciopor:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Serviciopor entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InstrumentacionBundle:Serviciopor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Serviciopor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('InstrumentacionBundle:Serviciopor:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Serviciopor entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InstrumentacionBundle:Serviciopor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Serviciopor entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('InstrumentacionBundle:Serviciopor:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Serviciopor entity.
    *
    * @param Serviciopor $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Serviciopor $entity)
    {
        $form = $this->createForm(new ServicioporType(), $entity, array(
            'action' => $this->generateUrl('serviciopor_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Serviciopor entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InstrumentacionBundle:Serviciopor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Serviciopor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('serviciopor_edit', array('id' => $id)));
        }

        return $this->render('InstrumentacionBundle:Serviciopor:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Serviciopor entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('InstrumentacionBundle:Serviciopor')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Serviciopor entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('serviciopor'));
    }

    /**
     * Creates a form to delete a Serviciopor entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('serviciopor_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
