<?php

namespace Letim\PhotoBundle\Entity;

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
     * @var \Letim\PhotoBundle\Entity\Menu
     */
    private $menu;

    /**
     * @var \Letim\PhotoBundle\Entity\Page
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
     * @param \Letim\PhotoBundle\Entity\Menu $menu
     * @return MenuItem
     */
    public function setMenu(\Letim\PhotoBundle\Entity\Menu $menu = null)
    {
        $this->menu = $menu;

        return $this;
    }

    /**
     * Get menu
     *
     * @return \Letim\PhotoBundle\Entity\Menu 
     */
    public function getMenu()
    {
        return $this->menu;
    }

    /**
     * Set page
     *
     * @param \Letim\PhotoBundle\Entity\Page $page
     * @return MenuItem
     */
    public function setPage(\Letim\PhotoBundle\Entity\Page $page = null)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get page
     *
     * @return \Letim\PhotoBundle\Entity\Page 
     */
    public function getPage()
    {
        return $this->page;
    }
}
