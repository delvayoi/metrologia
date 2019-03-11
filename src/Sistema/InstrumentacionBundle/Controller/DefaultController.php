<?php

namespace Sistema\InstrumentacionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('InstrumentacionBundle:Default:index.html.twig', array('name' => $name));
    }
}
