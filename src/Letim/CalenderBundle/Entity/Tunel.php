<?php

namespace Letim\CalenderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Tunel
 *
 * @ORM\Table(name="tunel", indexes={@ORM\Index(name="tunel_to_plan", columns={"plan_id"})})
 * @ORM\Entity
 */
class Tunel
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean", nullable=false)
     */
    private $active;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="started_at", type="datetime", nullable=false)
     */
    private $startedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=false)
     */
    private $updatedAt;

    /**
     * @var \Plan
     *
     * @ORM\ManyToOne(targetEntity="Plan")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="plan_id", referencedColumnName="id")
     * })
     */
    private $plan;
    
    /**
     * @var ArrayCollection
     * 
     * @ORM\OneToMany(targetEntity="ClientTunel", mappedBy="tunel")
     */
    private $clients;

    public function __construct() {
        $this->clients = new ArrayCollection();
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return Tunel
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set startedAt
     *
     * @param \DateTime $startedAt
     * @return Tunel
     */
    public function setStartedAt($startedAt)
    {
        $this->startedAt = $startedAt;

        return $this;
    }

    /**
     * Get startedAt
     *
     * @return \DateTime 
     */
    public function getStartedAt()
    {
        return $this->startedAt;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Tunel
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Tunel
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

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
     * Set plan
     *
     * @param \Letim\CalenderBundle\Entity\Plan $plan
     * @return Tunel
     */
    public function setPlan(\Letim\CalenderBundle\Entity\Plan $plan = null)
    {
        $this->plan = $plan;

        return $this;
    }
    public function getPlanName()
    {
        return $this->plan->getName();
    }
    public function getPlanType()
    {
        return $this->plan->getType()->getName();
    }

    /**
     * Get plan
     *
     * @return \Letim\CalenderBundle\Entity\Plan 
     */
    public function getPlan()
    {
        return $this->plan;
    }
    
    /*
     * Get clients
     * 
     * @return ArrayCollection
     */
    public function getClients()
    {
        return $this->clients;
    }

//    public function getUsers()
//    {
//        $this->clients;
//        return $this->clients;
//    }

    /**
     * Add clients
     *
     * @param \Letim\CalenderBundle\Entity\ClientTunel $clients
     * @return Tunel
     */
    public function addClient(\Letim\CalenderBundle\Entity\ClientTunel $clients)
    {
        $this->clients[] = $clients;

        return $this;
    }

    /**
     * Remove clients
     *
     * @param \Letim\CalenderBundle\Entity\ClientTunel $clients
     */
//    public function removeClient(\Letim\CalenderBundle\Entity\ClientTunel $clients)
//    {
//        $this->clients->removeElement($clients);
//    }
}
