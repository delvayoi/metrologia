<?php
namespace Sistema\InstrumentacionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sistema\InstrumentacionBundle\Entity\Calibracion;
use Sistema\InstrumentacionBundle\Form\CalibracionType;
use Sistema\DocumentacionBundle\Entity\Area;
/**
 * Calibracion controller.
 *
 */
class CalibracionController extends Controller
{

    /**
     * Lists all Calibracion entities.
     *
     */
    public function indexAction()
    {   
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('InstrumentacionBundle:Calibracion')->findAll();
        return $this->render('InstrumentacionBundle:Calibracion:index.html.twig', array(
            'entities' => $entities,
            ));
    }
    /**
     * Creates a new Calibracion entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Calibracion();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('calibracion_show', array('id' => $entity->getId())));
        }

        return $this->render('InstrumentacionBundle:Calibracion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Calibracion entity.
     *
     * @param Calibracion $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Calibracion $entity)
    {
        $form = $this->createForm(new CalibracionType(), $entity, array(
            'action' => $this->generateUrl('calibracion_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Calibracion entity.
     *
     */
    public function newAction()
    {
        $entity = new Calibracion();
        $form   = $this->createCreateForm($entity);

        return $this->render('InstrumentacionBundle:Calibracion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Calibracion entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InstrumentacionBundle:Calibracion')->find($id);
          
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Calibracion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('InstrumentacionBundle:Calibracion:show.html.twig', array(
            'entity'      => $entity,
            'en'=>$ent,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Calibracion entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InstrumentacionBundle:Calibracion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Calibracion entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);
        return $this->render('InstrumentacionBundle:Calibracion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Calibracion entity.
    *
    * @param Calibracion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Calibracion $entity)
    {
        $form = $this->createForm(new CalibracionType(), $entity, array(
            'action' => $this->generateUrl('calibracion_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Calibracion entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InstrumentacionBundle:Calibracion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Calibracion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('calibracion_edit', array('id' => $id)));
        }

        return $this->render('InstrumentacionBundle:Calibracion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Calibracion entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('InstrumentacionBundle:Calibracion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Calibracion entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('calibracion'));
    }

    /**
     * Creates a form to delete a Calibracion entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('calibracion_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
 //---------------------------------------------------------------------------------------------------   
    public function elaborarplanAction()
    {       
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('InstrumentacionBundle:Magnitud')->findAll();        
       return $this->render('InstrumentacionBundle:Calibracion:elaborarplan.html.twig', array('entities' => $entities ));
     }
    public function buscar_magnitudesAction()
      {//buscar los instrumentos asociados a esa magnitud
          $em = $this->getDoctrine()->getManager();
          $peticion=$this->getRequest();
          $id=$peticion->query->get('magnitud');           
          $dql='SELECT
               i.id ,
               i.nombre ,
               i.codigo,
               i.rango,
               i.modelo    
              



              FROM InstrumentacionBundle:Instrumento i          
              JOIN i.magnitudid m  
          
              WHERE m.id = :magnitud'      
           ;
           $consulta=$em->createQuery($dql);
           $consulta->setParameter('magnitud',$id);           
           $result=$consulta->getResult();
           
//           
//           $entity = new Calibracion();
//           $entity->getFechaproxima();
//           $entity->getFechareal();
//           $entity->getFechaultima();  
           
           
//            $form  = $this->createCreateForm($entity);        
             return $this->render('InstrumentacionBundle:Calibracion:Elaborado.html.twig',
                    array(
                        'result'=>$result, 'id' => $id ,                      
//                        'entity' => $entity,
//                        'form'   => $form->createView()                      
                        
                        ) );
             
        
        
/*    public function buscarcalibracionAction()
    {
          $peticion = $this->getRequest();
        $id=$peticion->query->get('procedimiento');
        
        $em = $this->getDoctrine()->getManager();
        
        $procedimiento=$em->getRepository('DocumentacionBundle:Procedimiento')->find($id);
        
        return $this->redirect($this->generateUrl('procedimiento_show', 
                array('id' => $procedimiento->getId())));        
 
    }
       */
       
    }
    
     public function nuevaAction( )
     {//Ya tengo los instrumentos es asignarle la fecha nueva     
         $peticion = $this->getRequest();      
         $id = $peticion->request->get('id');        
         $fp=$peticion->request->get('fechaproxima');
         $fr=$peticion->request->get('fechareal');
         $fu=$peticion->request->get('fechaultima');
          $em = $this->getDoctrine()->getManager();
          $entities= $em->getRepository('InstrumentacionBundle:Instrumento')->findBy(array ('magnitudid'=> $id ));     
        $magnitud=$em->getRepository('InstrumentacionBundle:Instrumento')->find($id);        
          $cont=0;     
            foreach ($entities as $value)
         {
         $instrumento = $em->getRepository('InstrumentacionBundle:Instrumento')->findBy(array( $value->getId()  )  );
//        $enti= new Calibracion();
//         $entities=$enti->setInstrumentoid($instrumento);
         //$entities=$enti->setFechaultima(new \DateTime ());
//         $entities=$enti->setFechaproxima(new \DateTime($fp));
//         $entities=$enti->setFechareal(new \DateTime($fr));
         $em->persist($entities); 
         $cont ++;
        }
         $em->flush();             
         $dql= 'SELECT 
             i.id ,
             i.nombre ,
             i.codigo, 
             i.rango ,
             i.modelo, 
             c.fechaultima,
             c.fechareal,
             c.fechaproxima               
              FROM InstrumentacionBundle:Instrumento i
              JOIN i.magnitudid m
              LEFT JOIN i.calibracion c             
              WHERE m.id = :magnitud              
              ORDER BY c.fechaproxima DESC '        
           ;
           $consulta=$em->createQuery($dql);
           $consulta->setParameter('magnitud',$id);
           $consulta->setMaxResults($cont);
           $result=$consulta->getResult();            
            $enti=new Calibracion();                  
            $entities=$enti->setFechaproxima(new \DateTime($fp));
           $entities=$enti->setFechareal(new \DateTime($fr));
           $entities=$enti->setFechaultima(new \DateTime($fu));
             return $this->render('InstrumentacionBundle:Calibracion:nueva.html.twig',
                    array(
                       'id'=> $id,
                     
                        'entities'=>$entities
                        ) );          
                      }  
     
}
