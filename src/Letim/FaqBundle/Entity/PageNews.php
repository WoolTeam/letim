<?php

namespace Letim\FaqBundle\Entity;

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
     * @var \Letim\FaqBundle\Entity\Page
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
     * @param \Letim\FaqBundle\Entity\Page $page
     * @return PageNews
     */
    public function setPage(\Letim\FaqBundle\Entity\Page $page = null)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get page
     *
     * @return \Letim\FaqBundle\Entity\Page 
     */
    public function getPage()
    {
        return $this->page;
    }
}
