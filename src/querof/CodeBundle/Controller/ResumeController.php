<?php

namespace querof\CodeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ResumeController extends Controller
{
  public function indexAction()
    {
    	 

 		return $this->render('base.resume.html.twig', array(

        ));

    }
}
