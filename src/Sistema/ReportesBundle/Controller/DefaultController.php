<?php

namespace Sistema\ReportesBundle\Controller;
use Sistema\DocumentacionBundle\Entity;
use Sistema\DocumentacionBundle\Entity\Estado;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ReportesBundle:Default:index.html.twig', array('name' => $name));
    }   
   
      public function repProcDerogadosAction()
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
         return $this->render('ReportesBundle:Default:repProcDerogados.html.twig', array('resultado' => $resultado));

      }
        public function repProcedimientoAction()
          { 
           
            $em= $this->getDoctrine()->getManager();
            $entities = $em->getRepository('DocumentacionBundle:Estado')->findAll();            
             return $this->render('ReportesBundle:Default:repProcedimiento.html.twig',
                    array('entities'=>$entities) );
           
          }       
          
      public function repProcedimientoAllAction()
          { 
           $em = $this->getDoctrine()->getManager();
           $peticion=$this->getRequest();
           $id=$peticion->query->get('estado');
           
           $dql= 'SELECT p.id ,p.nombre ,p.codigo,p.anno, p.version
              FROM DocumentacionBundle:Procedimiento p
              JOIN p.estadoid e 
              WHERE e.id = :estado'          
           ;
           $consulta=$em->createQuery($dql);
           $consulta->setParameter('estado',$id);
            
           $result=$consulta->getResult();
                    
             return $this->render('ReportesBundle:Default:repProcedimientoAll.html.twig',
                    array('result'=>$result, 'id' => $id ,  ) );
           
          }
            public function repInstructivaAction()
          {            
            $em= $this->getDoctrine()->getManager();
            $entities = $em->getRepository('DocumentacionBundle:Estado')->findAll();            
             return $this->render('ReportesBundle:Default:repInstructiva.html.twig',
                    array('entities'=>$entities) );           
          }
          
          public function repInstructivaAllAction()
          {
             $em= $this->getDoctrine()->getManager();
             $peticion= $this->getRequest();
             $id=$peticion->query->get('estado');
              $dql= 'SELECT i.id ,i.nombre ,i.codigo
              FROM DocumentacionBundle:Instructiva i
              JOIN i.estadoid e 
              WHERE e.id = :estado'          
           ;
           $consulta=$em->createQuery($dql);
           $consulta->setParameter('estado',$id);            
           $result=$consulta->getResult();                    
             return $this->render('ReportesBundle:Default:repInstructivaAll.html.twig',
                    array('result'=>$result, 'id' => $id ,  ) );
           
          
          }
          
}