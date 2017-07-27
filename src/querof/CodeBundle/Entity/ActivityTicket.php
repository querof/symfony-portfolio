<?php

namespace querof\CodeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActivityTicket
 *
 * @ORM\Table(name="activity_ticket", indexes={@ORM\Index(name="IDX_C5D64DA381C06096", columns={"activity_id"}), @ORM\Index(name="IDX_C5D64DA3700047D2", columns={"ticket_id"}), @ORM\Index(name="IDX_C5D64DA3F65B3645", columns={"analyst_id"})})
 * @ORM\Entity
 */
class ActivityTicket
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="activity_ticket_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="begindate", type="date", nullable=false)
     */
    private $begindate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="enddate", type="date", nullable=true)
     */
    private $enddate;

    /**
     * @var \querof\CodeBundle\Entity\Activity
     *
     * @ORM\ManyToOne(targetEntity="querof\CodeBundle\Entity\Activity")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="activity_id", referencedColumnName="id")
     * })
     */
    private $activity;

    /**
     * @var \querof\CodeBundle\Entity\Ticket
     *
     * @ORM\ManyToOne(targetEntity="querof\CodeBundle\Entity\Ticket")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ticket_id", referencedColumnName="id")
     * })
     */
    private $ticket;

    /**
     * @var \querof\CodeBundle\Entity\Analyst
     *
     * @ORM\ManyToOne(targetEntity="querof\CodeBundle\Entity\Analyst")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="analyst_id", referencedColumnName="id")
     * })
     */
    private $analyst;



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
     * Set begindate
     *
     * @param \DateTime $begindate
     *
     * @return ActivityTicket
     */
    public function setBegindate($begindate)
    {
        $this->begindate = $begindate;

        return $this;
    }

    /**
     * Get begindate
     *
     * @return \DateTime
     */
    public function getBegindate()
    {
        return $this->begindate;
    }

    /**
     * Set enddate
     *
     * @param \DateTime $enddate
     *
     * @return ActivityTicket
     */
    public function setEnddate($enddate)
    {
        $this->enddate = $enddate;

        return $this;
    }

    /**
     * Get enddate
     *
     * @return \DateTime
     */
    public function getEnddate()
    {
        return $this->enddate;
    }

    /**
     * Set activity
     *
     * @param \querof\CodeBundle\Entity\Activity $activity
     *
     * @return ActivityTicket
     */
    public function setActivity(\querof\CodeBundle\Entity\Activity $activity = null)
    {
        $this->activity = $activity;

        return $this;
    }

    /**
     * Get activity
     *
     * @return \querof\CodeBundle\Entity\Activity
     */
    public function getActivity()
    {
        return $this->activity;
    }

    /**
     * Set ticket
     *
     * @param \querof\CodeBundle\Entity\Ticket $ticket
     *
     * @return ActivityTicket
     */
    public function setTicket(\querof\CodeBundle\Entity\Ticket $ticket = null)
    {
        $this->ticket = $ticket;

        return $this;
    }

    /**
     * Get ticket
     *
     * @return \querof\CodeBundle\Entity\Ticket
     */
    public function getTicket()
    {
        return $this->ticket;
    }

    /**
     * Set analyst
     *
     * @param \querof\CodeBundle\Entity\Analyst $analyst
     *
     * @return ActivityTicket
     */
    public function setAnalyst(\querof\CodeBundle\Entity\Analyst $analyst = null)
    {
        $this->analyst = $analyst;

        return $this;
    }

    /**
     * Get analyst
     *
     * @return \querof\CodeBundle\Entity\Analyst
     */
    public function getAnalyst()
    {
        return $this->analyst;
    }
}
