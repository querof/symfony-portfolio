<?php

namespace querof\CodeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Activity
 *
 * @ORM\Table(name="activity", indexes={@ORM\Index(name="IDX_AC74095AED5CA9E6", columns={"service_id"}), @ORM\Index(name="IDX_AC74095A12469DE2", columns={"category_id"}), @ORM\Index(name="IDX_AC74095A38C751C4", columns={"roles_id"})})
 * @ORM\Entity
 */
class Activity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="activity_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="duration", type="integer", nullable=false)
     */
    private $duration;

    /**
     * @var \querof\CodeBundle\Entity\Service
     *
     * @ORM\ManyToOne(targetEntity="querof\CodeBundle\Entity\Service")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="service_id", referencedColumnName="id")
     * })
     */
    private $service;

    /**
     * @var \querof\CodeBundle\Entity\Category
     *
     * @ORM\ManyToOne(targetEntity="querof\CodeBundle\Entity\Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     * })
     */
    private $category;

    /**
     * @var \querof\CodeBundle\Entity\Roles
     *
     * @ORM\ManyToOne(targetEntity="querof\CodeBundle\Entity\Roles")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="roles_id", referencedColumnName="id")
     * })
     */
    private $roles;



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
     * @return Activity
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
     * Set duration
     *
     * @param integer $duration
     *
     * @return Activity
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return integer
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set service
     *
     * @param \querof\CodeBundle\Entity\Service $service
     *
     * @return Activity
     */
    public function setService(\querof\CodeBundle\Entity\Service $service = null)
    {
        $this->service = $service;

        return $this;
    }

    /**
     * Get service
     *
     * @return \querof\CodeBundle\Entity\Service
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * Set category
     *
     * @param \querof\CodeBundle\Entity\Category $category
     *
     * @return Activity
     */
    public function setCategory(\querof\CodeBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \querof\CodeBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set roles
     *
     * @param \querof\CodeBundle\Entity\Roles $roles
     *
     * @return Activity
     */
    public function setRoles(\querof\CodeBundle\Entity\Roles $roles = null)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Get roles
     *
     * @return \querof\CodeBundle\Entity\Roles
     */
    public function getRoles()
    {
        return $this->roles;
    }

    public function __toString()
    {
        return  $this->getName();
    }
}
