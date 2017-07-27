<?php
// src/AppBundle/Twig/AppExtension.php
namespace AppBundle\Twig;


use Symfony\Component\HttpFoundation\Request;

class AppExtension extends \Twig_Extension
{
	public function getFilters()
	{
	    return array(
	        new \Twig_SimpleFilter('md2html', array($this, 'markdownToHtml'), array('is_safe' => array('html'))),
	        new \Twig_SimpleFilter('price', array($this, 'priceFilter')),
	        new \Twig_SimpleFilter('cast_to_array', array($this, 'objectFilter')),
	        
	    );
	}
	
    

    public function objectFilter($stdClassObject) {
	    // Just typecast it to an array
	    $response = (array)$stdClassObject;
	
	    return $response;
	}
	
	
}