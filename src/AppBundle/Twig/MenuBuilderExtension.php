<?php

namespace AppBundle\Twig;

class MenuBuilderExtension extends \Twig_Extension
{
    protected $em;

    public function __construct($em)
    {
        $this->em = $em;
    }

    public function getFunctions()
    {
        return array(

			new \Twig_SimpleFunction('getMenu', [$this, 'getMenu'])
        );
    }

    public function getMenu() {

        $menus= array();
        $options = array();

        $menus = $this->em->getRepository('querofCodeBundle:Menu')->findBy(array(), array('ord' => 'ASC'));


    		$i = 0;


    		foreach($menus as $menu)
    		{

    			$options[$i]['name']= $menu->getName();
    			$options[$i]['class']= $menu->getClass();

    			$bdOptions = $this->em->getRepository('querofCodeBundle:MenuOptions')
    							  ->findBy(array('menu'=>$menu->getId()), array('ord'=>'asc'));

    			$opt = array();
    			$j = 0;

    			foreach($bdOptions as $option)
    			{

    				$opt[$j]['name']= $option->getName();
    				$opt[$j]['route']= $option->getRoute();
    				$j++;
    			}

    			$options[$i]['options'] = $opt;

    			$i++;
    		}


        return $options;
    }



    public function getName()
    {
        return 'm_enu_builder_extension';
    }

}
