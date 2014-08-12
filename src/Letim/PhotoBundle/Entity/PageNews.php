<?php

namespace Letim\PhotoBundle\Entity;

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
     * Set page
     *
     * @param \Letim\PhotoBundle\Entity\Page $page
     * @return PageNews
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
