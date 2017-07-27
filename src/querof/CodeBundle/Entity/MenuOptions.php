<?php

namespace querof\CodeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MenuOptions
 *
 * @ORM\Table(name="menu_options", indexes={@ORM\Index(name="IDX_58EEE739CCD7E912", columns={"menu_id"})})
 * @ORM\Entity
 */
class MenuOptions
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="menu_options_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="route", type="string", length=255, nullable=false)
     */
    private $route;

    /**
     * @var integer
     *
     * @ORM\Column(name="ord", type="integer", nullable=false)
     */
    private $ord;

    /**
     * @var \querof\CodeBundle\Entity\Menu
     *
     * @ORM\ManyToOne(targetEntity="querof\CodeBundle\Entity\Menu")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="menu_id", referencedColumnName="id")
     * })
     */
    private $menu;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return MenuOptions
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set route
     *
     * @param string $route
     *
     * @return MenuOptions
     */
    public function setRoute($route)
    {
        $this->route = $route;

        return $this;
    }

    /**
     * Get route
     *
     * @return string
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * Set ord
     *
     * @param integer $ord
     *
     * @return MenuOptions
     */
    public function setOrd($ord)
    {
        $this->ord = $ord;

        return $this;
    }

    /**
     * Get ord
     *
     * @return integer
     */
    public function getOrd()
    {
        return $this->ord;
    }

    /**
     * Set menu
     *
     * @param \querof\CodeBundle\Entity\Menu $menu
     *
     * @return MenuOptions
     */
    public function setMenu(\querof\CodeBundle\Entity\Menu $menu = null)
    {
        $this->menu = $menu;

        return $this;
    }

    /**
     * Get menu
     *
     * @return \querof\CodeBundle\Entity\Menu
     */
    public function getMenu()
    {
        return $this->menu;
    }

    public function __toString()
    {
        return  $this->getName();
    }
}
