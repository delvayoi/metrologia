<?php

namespace Sistema\DocumentacionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {        
        return $this->render('DocumentacionBundle:Default:index.html.twig');
    }
}
