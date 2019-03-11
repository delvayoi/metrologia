<?php

namespace Sistema\DocumentacionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sistema\DocumentacionBundle\Entity\Registros;
use Sistema\DocumentacionBundle\Form\RegistrosType;

/**
 * Registros controller.
 *
 */
class RegistrosController extends Controller
{

    /**
     * Lists all Registros entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DocumentacionBundle:Registros')->findAll();

        return $this->render('DocumentacionBundle:Registros:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Registros entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Registros();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('registros_show', array('id' => $entity->getId())));
        }

        return $this->render('DocumentacionBundle:Registros:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Registros entity.
     *
     * @param Registros $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Registros $entity)
    {
        $form = $this->createForm(new RegistrosType(), $entity, array(
            'action' => $this->generateUrl('registros_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Registros entity.
     *
     */
    public function newAction()
    {
        $entity = new Registros();
        $form   = $this->createCreateForm($entity);

        return $this->render('DocumentacionBundle:Registros:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Registros entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DocumentacionBundle:Registros')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Registros entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DocumentacionBundle:Registros:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Registros entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DocumentacionBundle:Registros')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Registros entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DocumentacionBundle:Registros:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Registros entity.
    *
    * @param Registros $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Registros $entity)
    {
        $form = $this->createForm(new RegistrosType(), $entity, array(
            'action' => $this->generateUrl('registros_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Registros entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DocumentacionBundle:Registros')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Registros entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('registros_edit', array('id' => $id)));
        }

        return $this->render('DocumentacionBundle:Registros:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Registros entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DocumentacionBundle:Registros')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Registros entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('registros'));
    }

    /**
     * Creates a form to delete a Registros entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('registros_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
     public function buscarregistrosAction()
    {
         $peticion = $this->getRequest();
        $id=$peticion->query->get('registros');
        
        $em = $this->getDoctrine()->getManager();
        
        $registros=$em->getRepository('DocumentacionBundle:Registros')->find($id);
        
        return $this->redirect($this->generateUrl('registros_show', 
                array('id' => $registros->getId())));
        
 
    }
    
    
    
    
    public function new2Action($id)
    {
        $entity = new Registros();
        $form   = $this->createCreateForm($entity);        
        return $this->render('DocumentacionBundle:Registros:new2.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'id' => $id,
        ));
    }
    
    
    public function CrearRegistroAction(Request $request, $id)
    {
       
        $entity = new Registros();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            
            // BUSCAS EL PROCEDIMIENTO
            //SET 
             $procede = $em->getRepository('DocumentacionBundle:Procedimiento')->find($id);           
         
            //set
             $entity->setProcedimientoid($procede);
            
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('registros_show', array('id' => $entity->getId())));
        }

        return $this->render('DocumentacionBundle:Registros:new2.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
         
        
       }    
  
    
    
    
}
