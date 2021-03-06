<?php

namespace Letim\NewsBundle\Entity;

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
     * @var \Letim\NewsBundle\Entity\Page
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
     * @param \Letim\NewsBundle\Entity\Page $page
     * @return PageNews
     */
    public function setPage(\Letim\NewsBundle\Entity\Page $page = null)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get page
     *
     * @return \Letim\NewsBundle\Entity\Page 
     */
    public function getPage()
    {
        return $this->page;
    }
    public function getPageUrl()
    {
        return $this->page->getUrl();
    }
}
