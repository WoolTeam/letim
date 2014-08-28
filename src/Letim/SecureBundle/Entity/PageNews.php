<?php

namespace Letim\SecureBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PageNews
 */
class PageNews
{
    /**
     * @var integer
     */
    private $id;

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
     * Set page
     *
     * @param \Letim\SecureBundle\Entity\Page $page
     * @return PageNews
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
