<?php

namespace Letim\CalenderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ClientTunel
 *
 * @ORM\Table(name="client_tunel", indexes={@ORM\Index(name="client_tunel_to_tunel", columns={"tunel_id"}), @ORM\Index(name="client_tunel_to_user", columns={"client_id"})})
 * @ORM\Entity
 */
class ClientTunel
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
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     * })
     */
    private $client;

    /**
     * @var \Tunel
     *
     * @ORM\ManyToOne(targetEntity="Tunel", inversedBy="clients")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tunel_id", referencedColumnName="id")
     * })
     */
    private $tunel;



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
     * Set tunel
     *
     * @param \Letim\CalenderBundle\Entity\Tunel $tunel
     * @return ClientTunel
     */
    public function setTunel(\Letim\CalenderBundle\Entity\Tunel $tunel = null)
    {
        $this->tunel = $tunel;

        return $this;
    }

    /**
     * Get tunel
     *
     * @return \Letim\CalenderBundle\Entity\Tunel 
     */
    public function getTunel()
    {
        return $this->tunel;
    }

    /**
     * Set client
     *
     * @param \Letim\CalenderBundle\Entity\User $client
     * @return ClientTunel
     */
    public function setClient(\Letim\CalenderBundle\Entity\User $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Set client
     *
     * @param \Letim\CalenderBundle\Entity\User $client
     * @return ClientTunel
     */
    public function getUsers(\Letim\CalenderBundle\Entity\User $client = null)
    {
        $this->client = $client;

        return $this;
    }
    public function __toString()
    {
        return $this->client->getEmail();
    }
//    public function getEmail() {
//        return $this->client->getEmail();
//    }
//    public function setEmail(\Letim\CalenderBundle\Entity\User $client = null) {
//        $n = new ClientTunel();
//        $n->setTunel($this->getTunel());
//        $n->setClient($client);
//        return $this;
//    }
//    public function setEmail() {
//        return $this->client->getEmail();
//    }
//    public function getEmail() {
//        return $this->client->getEmail();
//    }

    /**
     * Get client
     *
     * @return \Letim\CalenderBundle\Entity\User 
     */
    public function getClient()
    {
        return $this->client;
    }
    public function addClient($client) {
        $this->client[]= $client;
    }

    public function removeClient($client) {
        $this->client->removeElement($client);
    }
    public  function  toString() {
        return $this->getClient();
    }
}
