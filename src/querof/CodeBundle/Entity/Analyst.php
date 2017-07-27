<?php

namespace querof\CodeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Analyst
 *
 * @ORM\Table(name="analyst", indexes={@ORM\Index(name="IDX_5FAB2C8C38C751C4", columns={"roles_id"})})
 * @ORM\Entity
 */
class Analyst
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="analyst_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=50, nullable=false)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=50, nullable=false)
     */
    private $lastname;

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
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Analyst
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Analyst
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set roles
     *
     * @param \querof\CodeBundle\Entity\Roles $roles
     *
     * @return Analyst
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
        return  $this->getFirstnametName().' '.$this->getLastname();
    }
}
