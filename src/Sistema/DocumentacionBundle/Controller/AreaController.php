<?php

namespace Sistema\DocumentacionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sistema\DocumentacionBundle\Entity\Area;
use Sistema\DocumentacionBundle\Form\AreaType;











/**
 * Area controller.
 *
 */
class AreaController extends Controller
{

    /*public function casousogridAction(){
        //cojen los datos
        $casousoArray = array();
        $start = (isset($_POST['start']))?$_POST['start']:null;
        $limit = (isset($_POST['limit']))?$_POST['limit']:null;
        $em = $this->getDoctrine()->getManager();
        $casouso = $em->getRepository('DesymfonyBundle:TbCasouso')->casouso($start,$limit);
        $casousoTotal = $em->getRepository('DesymfonyBundle:TbCasouso')->casousoCant();
        foreach($casouso as $caso){
            array_push($casousoArray,array(
                'id' => $caso->getId(),
                'nombre' => $caso->getNombre(),
                'url' => $caso->getUrl(),
                'descripcion' => $caso->getDescripcion(),
                'orden' => $caso->getOrden()
            ));
        }
        $em->getRepository('DesymfonyBundle:TbTraza')->salvarTrazas($this->get('security.context')->getToken()->getUser(), 1, 7);
        return new Response(json_encode(array('success' => true,'data' => $casousoArray,'total' => $casousoTotal)));
   */ 
    
   /* public function indexAction()
    { //cojen los 
     $casousoArray = array();
     $start = (isset($_POST['start']))?$_POST['start']:null;
     $limit = (isset($_POST['limit']))?$_POST['limit']:null;
     $em = $this->getDoctrine()->getManager();        
        $casouso = $em->getRepository('DocumentacionBundle:Area')->casouso($start,$limit);
        $casousoTotal = $em->getRepository('DocumentacionBundle:Area')->casousoCant();        
        foreach($casouso as $caso){
            array_push($casousoArray,array(
                'id' => $caso->getId(),
                'area' => $caso->getArea()             
            ));
             }
        return new Response(json_encode(array('success' => true,'data' => $casousoArray,'total' => $casousoTotal)));
       
       
}   */     
    /**
     * Lists all Area entities.
     *
     */
   public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DocumentacionBundle:Area')->findAll();

        return $this->render('DocumentacionBundle:Area:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Area entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Area();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('area_show', array('id' => $entity->getId())));
        }

        return $this->render('DocumentacionBundle:Area:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Area entity.
     *
     * @param Area $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Area $entity)
    {
        $form = $this->createForm(new AreaType(), $entity, array(
            'action' => $this->generateUrl('area_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Area entity.
     *
     */
    public function newAction()
    {
        $entity = new Area();
        $form   = $this->createCreateForm($entity);

        return $this->render('DocumentacionBundle:Area:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Area entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DocumentacionBundle:Area')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Area entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DocumentacionBundle:Area:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Area entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DocumentacionBundle:Area')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Area entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DocumentacionBundle:Area:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Area entity.
    *
    * @param Area $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Area $entity)
    {
        $form = $this->createForm(new AreaType(), $entity, array(
            'action' => $this->generateUrl('area_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Area entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DocumentacionBundle:Area')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Area entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('area_edit', array('id' => $id)));
        }

        return $this->render('DocumentacionBundle:Area:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Area entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DocumentacionBundle:Area')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Area entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('area'));
    }

    /**
     * Creates a form to delete a Area entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('area_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
