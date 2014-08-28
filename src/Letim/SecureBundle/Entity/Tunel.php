<?php

namespace Letim\SecureBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tunel
 */
class Tunel
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $planId;

    /**
     * @var boolean
     */
    private $active;

    /**
     * @var \DateTime
     */
    private $startedAt;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;


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
     * Set planId
     *
     * @param integer $planId
     * @return Tunel
     */
    public function setPlanId($planId)
    {
        $this->planId = $planId;

        return $this;
    }

    /**
     * Get planId
     *
     * @return integer 
     */
    public function getPlanId()
    {
        return $this->planId;
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
}
