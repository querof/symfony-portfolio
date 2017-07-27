<?php

namespace querof\CodeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('querofCodeBundle:Default:index.html.twig');
    }
}
