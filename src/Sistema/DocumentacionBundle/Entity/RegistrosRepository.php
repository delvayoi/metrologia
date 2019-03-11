<?php
namespace Sistema\DocumentacionBundle\Entity;
use Doctrine\ORM\EntityRepository;
use Sistema\DocumentacionBundle\Entity\Registros;

class RegistrosRepository extends EntityRepository
{
    
   
   public function findRegistro($id)
   {
      $em = $this->getEntityManager(); 
      $dql ='SELECT 
            r.codigo,
            r.nombre
            FROM  DocumentacionBundle:Registros r                
            WHERE r.procedimientoid = :id  ';
       $consulta = $em->createQuery($dql);                 
       $consulta->setParameter('id',$id);
   return  $consulta->getResult();
   }
   
   public function DeleteRegistros()
   {
      $em=  $this->getEntityManager();
      $dql= 'DELETE DocumentacionBundle:Registros r';
      $consulta=$em->createQuery($dql);
      $consulta->setParameter('consulta', $consulta);
   return $consulta->getResult();
   }
}
?>
