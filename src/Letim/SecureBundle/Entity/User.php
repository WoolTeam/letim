<?php

namespace Letim\SecureBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * User
 */
class User implements UserInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $pass;

    /**
     * @var string
     */
    private $salt;

    /**
     * @var \Letim\SecureBundle\Entity\Roles
     */
    private $userroles;


    /**
     * Set id
     *
     * @param integer $id
     * @return User
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set pass
     *
     * @param string $pass
     * @return User
     */
    public function setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }

    /**
     * Get pass
     *
     * @return string 
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set userroles
     *
     * @param \Letim\SecureBundle\Entity\Roles $userroles
     * @return User
     */
    public function setUserroles(\Letim\SecureBundle\Entity\Roles $userroles = null)
    {
        $this->userroles = $userroles;

        return $this;
    }

    /**
     * Get userroles
     *
     * @return \Letim\SecureBundle\Entity\Roles 
     */
    public function getUserroles()
    {
        return $this->userroles;
    }
    public function getRoles()
    {
        $roles[] = $this->getUserroles()->getName();
        return $roles;
    }
    public function getPassword()
    {
        return $this->pass;
    }
    public function eraseCredentials()
    {

    }
    public function equals(UserInterface $user)
    {
        return md5($this->getUsername()) == md5($user->getUsername());
    }
}
