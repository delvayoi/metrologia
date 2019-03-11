<?php

namespace Sistema\DocumentacionBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Sistema\DocumentacionBundle\Entity\Procedimiento;

class ProcedimientoRepository extends EntityRepository
{
  public function listDerogados($stado)
  {
     $stado="derogado";
     $pno=$repository->find($stado);
      return $this->render('DocumentacionBundle:Procedimiento:ListPNODerogados.html.twig');
  }

public function buscarnombre($id)
{//mal
    $em= $this->getDoctrine()->getManager();
     $dql ='SELECT
         p.nombre
         FROM DocumentacionBundle:Procedimiento p         
         WHERE p.id = :id';            
      $res=$em->createQuery($dql);
      $mio=$res->getSingleResult();      
            return $mio;
     
}   
    public function repProcDerogados($stdo)
      {
         $stdo="derogado";
         $procedimiento= $repository->find($stdo);          
       return $this->render('ReportesBundle:Default:repProcDerogados.html.twig');
      }
   
   
    public function regixproc($proc)
      {
         $em = $this->getEntityManager();         
        $dql =        
    'SELECT     
      COUNT(r.id) as cant      
    FROM  DocumentacionBundle:Registros r    
    JOIN r.procedimientoid p           
    WHERE p.id = :proc    
    ';
         $consulta = $em->createQuery($dql);         
         $consulta->setParameter('proc',$proc);
         $cant =  $consulta->getSingleResult();         
         return $cant;  
      }     
}

?>
