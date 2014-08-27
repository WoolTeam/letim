<?php

namespace Letim\CalenderBundle\Entity;
use Letim\CalenderBundle\Entity\Tunel;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Tunel
 *
 * @ORM\Table(name="tunel", indexes={@ORM\Index(name="tunel_to_plan", columns={"plan_id"})})
 * @ORM\Entity
 */
class TunelUsers extends Tunel
{

    private $users;

    public function __construct() {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getUsers() {
        return $this->users;
    }

    public function setUsers($users) {
        $this->users = $users;
    }

    public function addUser($user) {
        $this->users[]= $user;
    }

    public function removePrice($user) {
        $this->users->removeElement($user);
    }
}
