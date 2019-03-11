<?php


namespace MiSensio\Bundle\GeneratorBundle\Generator;


class BaseGenerator extends Generator
{

    public function generate($nonbreProyect, $nombre, $estilo)
    {
      
        $this->renderFile('bases/'.$estilo.'.html.twig.twig', __DIR__.'/../../../../../app/Resources/views/base.html.twig', array(
        'nonbreProyect' => $nonbreProyect, 'nombre' => $nombre, 'estilo' => $estilo ));
    }

}

