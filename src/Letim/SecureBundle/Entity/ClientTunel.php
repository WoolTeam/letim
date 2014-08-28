<?php

namespace Letim\SecureBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ClientTunel
 */
class ClientTunel
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $tunelId;

    /**
     * @var integer
     */
    private $clientId;


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
     * Set tunelId
     *
     * @param integer $tunelId
     * @return ClientTunel
     */
    public function setTunelId($tunelId)
    {
        $this->tunelId = $tunelId;

        return $this;
    }

    /**
     * Get tunelId
     *
     * @return integer 
     */
    public function getTunelId()
    {
        return $this->tunelId;
    }

    /**
     * Set clientId
     *
     * @param integer $clientId
     * @return ClientTunel
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * Get clientId
     *
     * @return integer 
     */
    public function getClientId()
    {
        return $this->clientId;
    }
}
