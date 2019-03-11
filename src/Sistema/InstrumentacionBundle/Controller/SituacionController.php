<?php

namespace Sistema\InstrumentacionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sistema\InstrumentacionBundle\Entity\Situacion;
use Sistema\InstrumentacionBundle\Form\SituacionType;

/**
 * Situacion controller.
 *
 */
class SituacionController extends Controller
{

    /**
     * Lists all Situacion entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('InstrumentacionBundle:Situacion')->findAll();

        
        
        return $this->render('InstrumentacionBundle:Situacion:index.html.twig', array(
            'entities' => $entities,
            
        ));
        
    }
  /**
     * Find all Situacion entities.
     *
     */
    public function buscadorAction()
    {
        $peticion = $this->getRequest();

        $id = $peticion->query->get('buscador');
        $em=$this->getDoctrine()->getManager();
        $entity = $em->getRepository('InstrumentacionBundle:Situacion')->find($id);

        return $this->redirect($this->generateUrl('situacion_show', 
        array('id' => $entity->getId())));  
    }

    /**
     * Creates a new Situacion entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Situacion();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('situacion_show', array('id' => $entity->getId())));
        }

        return $this->render('InstrumentacionBundle:Situacion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Situacion entity.
    *
    * @param Situacion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Situacion $entity)
    {
        $form = $this->createForm(new SituacionType(), $entity, array(
            'action' => $this->generateUrl('situacion_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear','attr'=>array('class'=>'btn btn-sm btn-primary')));

        return $form;
    }

    /**
     * Displays a form to create a new Situacion entity.
     *
     */
    public function newAction()
    {
        $entity = new Situacion();
        $form   = $this->createCreateForm($entity);

        return $this->render('InstrumentacionBundle:Situacion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Situacion entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InstrumentacionBundle:Situacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Situacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('InstrumentacionBundle:Situacion:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Situacion entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InstrumentacionBundle:Situacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Situacion entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('InstrumentacionBundle:Situacion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Situacion entity.
    *
    * @param Situacion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Situacion $entity)
    {
        $form = $this->createForm(new SituacionType(), $entity, array(
            'action' => $this->generateUrl('situacion_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modificar','attr'=>array('class'=>'btn btn-sm btn-primary')));

        return $form;
    }
    /**
     * Edits an existing Situacion entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InstrumentacionBundle:Situacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Situacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('situacion_edit', array('id' => $id)));
        }

        return $this->render('InstrumentacionBundle:Situacion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Situacion entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('InstrumentacionBundle:Situacion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Situacion entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('situacion'));
    }

    /**
     * Creates a form to delete a Situacion entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('situacion_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar','attr'=>array('class'=>'btn btn-sm btn-danger byn-delete')))
            ->getForm()
        ;
    }
}
