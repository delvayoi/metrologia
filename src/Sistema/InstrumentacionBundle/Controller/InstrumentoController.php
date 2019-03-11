<?php
namespace Sistema\InstrumentacionBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sistema\InstrumentacionBundle\Entity\Instrumento;
use Sistema\InstrumentacionBundle\Form\InstrumentoType;

/**
 * Instrumento controller.
 *
 */
class InstrumentoController extends Controller
{
    /**
     * Lists all Instrumento entities.
     *
     */
    public function indexAction()
    {//buscar los instrumento que sean de situacion activo
    $em = $this->getDoctrine()->getManager();
 ///$entities = $em->getRepository('InstrumentacionBundle:Instrumento')->findAll();
  // $entities = $em->getRepository('InstrumentacionBundle:Instrumento')->findBy(array('situacionid' => 'activo'));      

    
      $em= $this->getDoctrine()->getManager();
        $dql ='SELECT 
           i.id ,
           i.nombre,
           i.codigo,          
           i.rango,
           i.modelo ,  
           s.situaciones,
           m.magnitudes,
           a.area,
           e.exactitudes,
           q.equipos
        
          FROM InstrumentacionBundle:Instrumento i         
           JOIN i.situacionid s
           JOIN i.magnitudid m
           JOIN i.areaid a
           JOIN i.exactitudid e
           JOIN i.equipoid q
       
        
           WHERE s.situaciones = :situacion
            ';
         $consulta = $em->createQuery($dql);
         $consulta->setParameter('situacion','activo');
         $entities = $consulta->getResult();


       $paginator  = $this->get('knp_paginator');
       $pagination = $paginator->paginate($entities, $this->get('request')->query->get('page', 1)/*page number*/,300 /*limit per page*/);        
        return $this->render('InstrumentacionBundle:Instrumento:index.html.twig', array(
          'entities' => $entities,
            'pagination' => $pagination,
            

        ));
         
        
    }
  /**
     * Find all Instrumento entities.
     *
     */
    public function buscadorAction()
    {
        $peticion = $this->getRequest();

        $id = $peticion->query->get('buscador');
        $em=$this->getDoctrine()->getManager();
        $entity = $em->getRepository('InstrumentacionBundle:Instrumento')->find($id);

        return $this->redirect($this->generateUrl('instrumento_show', 
        array('id' => $entity->getId())));  
    }

    /**
     * Creates a new Instrumento entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Instrumento();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('instrumento_show', array('id' => $entity->getId())));
        }

        return $this->render('InstrumentacionBundle:Instrumento:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Instrumento entity.
    *
    * @param Instrumento $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Instrumento $entity)
    {
        $form = $this->createForm(new InstrumentoType(), $entity, array(
            'action' => $this->generateUrl('instrumento_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear','attr'=>array('class'=>'btn btn-sm btn-primary')));

        return $form;
    }

    /**
     * Displays a form to create a new Instrumento entity.
     *
     */
    public function newAction()
    {
        $entity = new Instrumento();
        $form   = $this->createCreateForm($entity);

        return $this->render('InstrumentacionBundle:Instrumento:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Instrumento entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InstrumentacionBundle:Instrumento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Instrumento entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('InstrumentacionBundle:Instrumento:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Instrumento entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InstrumentacionBundle:Instrumento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Instrumento entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('InstrumentacionBundle:Instrumento:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Instrumento entity.
    *
    * @param Instrumento $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Instrumento $entity)
    {
        $form = $this->createForm(new InstrumentoType(), $entity, array(
            'action' => $this->generateUrl('instrumento_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modificar','attr'=>array('class'=>'btn btn-sm btn-primary')));

        return $form;
    }
    /**
     * Edits an existing Instrumento entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InstrumentacionBundle:Instrumento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Instrumento entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('instrumento_edit', array('id' => $id)));
        }

        return $this->render('InstrumentacionBundle:Instrumento:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Instrumento entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('InstrumentacionBundle:Instrumento')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Instrumento entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('instrumento'));
    }

    /**
     * Creates a form to delete a Instrumento entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('instrumento_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar','attr'=>array('class'=>'btn btn-sm btn-danger byn-delete')))
            ->getForm()
        ;
    }
    
     public function BuscarBajasInstrumentoAction()
    {//hecho por MIIII   
          
      $em= $this->getDoctrine()->getManager();
        $dql ='SELECT 
           i.id ,
           i.nombre,
           i.codigo,          
           i.rango,
           i.modelo ,  
           s.situaciones,
           m.magnitudes,
           a.area,
           e.exactitudes,
           q.equipo
        
          FROM InstrumentacionBundle:Instrumento i         
           JOIN i.situacionid s
           JOIN i.magnitudid m
           JOIN i.areaid a
           JOIN i.exactitudid e
           JOIN i.equipoid q
       
        
           WHERE s.situaciones = :situacion
            ';
         $consulta = $em->createQuery($dql);
         $consulta->setParameter('situacion','baja');
         $resultado = $consulta->getResult();
         return $this->render('InstrumentacionBundle:Instrumento:InstrumentoBaja.html.twig',array ('resultado' => $resultado));
           }       

}
