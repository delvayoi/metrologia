<?php

namespace Sistema\DocumentacionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sistema\DocumentacionBundle\Entity\Instructiva;
use Sistema\DocumentacionBundle\Form\InstructivaType;

/**
 * Instructiva controller.
 *
 */
class InstructivaController extends Controller
{

    /**
     * Lists all Instructiva entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DocumentacionBundle:Instructiva')->findAll();

        return $this->render('DocumentacionBundle:Instructiva:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Instructiva entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Instructiva();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('instructiva_show', array('id' => $entity->getId())));
        }

        return $this->render('DocumentacionBundle:Instructiva:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Instructiva entity.
     *
     * @param Instructiva $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Instructiva $entity)
    {
        $form = $this->createForm(new InstructivaType(), $entity, array(
            'action' => $this->generateUrl('instructiva_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Instructiva entity.
     *
     */
    public function newAction()
    {
        $entity = new Instructiva();
        $form   = $this->createCreateForm($entity);

        return $this->render('DocumentacionBundle:Instructiva:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Instructiva entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DocumentacionBundle:Instructiva')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Instructiva entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DocumentacionBundle:Instructiva:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Instructiva entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DocumentacionBundle:Instructiva')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Instructiva entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DocumentacionBundle:Instructiva:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Instructiva entity.
    *
    * @param Instructiva $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Instructiva $entity)
    {
        $form = $this->createForm(new InstructivaType(), $entity, array(
            'action' => $this->generateUrl('instructiva_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Instructiva entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DocumentacionBundle:Instructiva')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Instructiva entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('instructiva_edit', array('id' => $id)));
        }

        return $this->render('DocumentacionBundle:Instructiva:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Instructiva entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DocumentacionBundle:Instructiva')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Instructiva entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('instructiva'));
    }

    /**
     * Creates a form to delete a Instructiva entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('instructiva_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
    
   public function ListINSDerogadosAction()
    {//esto tengo que arreglarlo
         $em= $this->getDoctrine()->getManager();
         $dql ='SELECT  i.id,
               i.nombre,
               i.codigo,
               
               
             
               e.estado               
              FROM DocumentacionBundle:Instructiva i 
               JOIN i.estadoid e
              WHERE e.estado = :derogado';
         $consulta = $em->createQuery($dql);
         $consulta->setParameter('derogado','derogado');
         $resultado = $consulta->getResult();        

       return $this->render('DocumentacionBundle:Instructiva:ListINSDerogados.html.twig',array ('resultado' => $resultado));
       
}
}