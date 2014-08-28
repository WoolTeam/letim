<?php

namespace Letim\SecureBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MenuItem
 */
class MenuItem
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \Letim\SecureBundle\Entity\Menu
     */
    private $menu;

    /**
     * @var \Letim\SecureBundle\Entity\Page
     */
    private $page;


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
     * @return MenuItem
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
     * Set menu
     *
     * @param \Letim\SecureBundle\Entity\Menu $menu
     * @return MenuItem
     */
    public function setMenu(\Letim\SecureBundle\Entity\Menu $menu = null)
    {
        $this->menu = $menu;

        return $this;
    }

    /**
     * Get menu
     *
     * @return \Letim\SecureBundle\Entity\Menu 
     */
    public function getMenu()
    {
        return $this->menu;
    }

    /**
     * Set page
     *
     * @param \Letim\SecureBundle\Entity\Page $page
     * @return MenuItem
     */
    public function setPage(\Letim\SecureBundle\Entity\Page $page = null)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get page
     *
     * @return \Letim\SecureBundle\Entity\Page 
     */
    public function getPage()
    {
        return $this->page;
    }
}
