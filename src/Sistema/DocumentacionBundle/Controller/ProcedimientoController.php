<?php

namespace Sistema\DocumentacionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sistema\DocumentacionBundle\Entity\Procedimiento;
use Sistema\DocumentacionBundle\Form\ProcedimientoType;

/**
 * Procedimiento controller.
 *
 */
class ProcedimientoController extends Controller
{

    /**
     * Lists all Procedimiento entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DocumentacionBundle:Procedimiento')->findAll();   
        
        $cantreg=array();//cantidad de registros
        foreach ($entities as $value)
        {
           $cantreg[]= $em->getRepository('DocumentacionBundle:Procedimiento')->regixproc($value->getId());
        }
        return $this->render('DocumentacionBundle:Procedimiento:index.html.twig', array(
            'entities' => $entities,'cantreg'=>$cantreg
        ));
    }
    /**
     * Creates a new Procedimiento entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Procedimiento();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('procedimiento_show', array('id' => $entity->getId())));
        }

        return $this->render('DocumentacionBundle:Procedimiento:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Procedimiento entity.
     *
     * @param Procedimiento $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Procedimiento $entity)
    {
        $form = $this->createForm(new ProcedimientoType(), $entity, array(
            'action' => $this->generateUrl('procedimiento_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Procedimiento entity.
     *
     */
    public function newAction()
    {
        $entity = new Procedimiento();
        $form   = $this->createCreateForm($entity);

        return $this->render('DocumentacionBundle:Procedimiento:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Procedimiento entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DocumentacionBundle:Procedimiento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Procedimiento entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DocumentacionBundle:Procedimiento:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Procedimiento entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DocumentacionBundle:Procedimiento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Procedimiento entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DocumentacionBundle:Procedimiento:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Procedimiento entity.
    *
    * @param Procedimiento $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Procedimiento $entity)
    {
        $form = $this->createForm(new ProcedimientoType(), $entity, array(
            'action' => $this->generateUrl('procedimiento_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Procedimiento entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DocumentacionBundle:Procedimiento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Procedimiento entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('procedimiento_edit', array('id' => $id)));
        }

        return $this->render('DocumentacionBundle:Procedimiento:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Procedimiento entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DocumentacionBundle:Procedimiento')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Procedimiento entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('procedimiento'));
    }

    /**
     * Creates a form to delete a Procedimiento entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('procedimiento_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
 //Funciones mías     
    public function buscarprocedimientoAction()
    {
         $peticion = $this->getRequest();
        $id=$peticion->query->get('procedimiento');
        
        $em = $this->getDoctrine()->getManager();
        
        $procedimiento=$em->getRepository('DocumentacionBundle:Procedimiento')->find($id);
        
        return $this->redirect($this->generateUrl('procedimiento_show', 
                array('id' => $procedimiento->getId())));        
 
    }
    
 
    public function ListRegistroAction($id)
    { //Me hace falta el nombre del procedimiento         
       $em = $this->getDoctrine()->getManager();
        
        $form= $em->getRepository('DocumentacionBundle:Registros')->findRegistro($id);
   
        if(! $form)
        {
         $this->get('session')->getFlashBag()->set('success',
             array(
                'title' => 'Error!!!',
                 'message' => 'No existe ningún registro en esta tabla.'
                   ));
                        //  throw $this->createNotFoundException('esta vacio');


                return $this->render('DocumentacionBundle:Procedimiento:ListRegistro.html.twig', array(
            'form' =>$form , 'id' =>$id ));
         }
         
        
            
            return $this->render('DocumentacionBundle:Procedimiento:ListRegistro.html.twig', array(
            'form' =>$form,   'id' => $id  ));     
    }
    
    public function ListPNODerogadosAction()
    {
         $em= $this->getDoctrine()->getManager();
         $dql ='SELECT  p.id,
               p.nombre,
               p.codigo,
               p.anno,
               p.version,
              
               e.estado               
              FROM DocumentacionBundle:Procedimiento p 
               JOIN p.estadoid e 
              WHERE e.estado = :derogado';
         $consulta = $em->createQuery($dql);
         $consulta->setParameter('derogado','derogado');
         $resultado = $consulta->getResult();        

       return $this->render('DocumentacionBundle:Procedimiento:ListPNODerogados.html.twig',array ('resultado' => $resultado));
       
    }
    
}
