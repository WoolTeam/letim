<?php

namespace Letim\FaqBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PageFaq
 */
class PageFaq
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
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
     * @param integer $page
     * @return PageFaq
     */
    public function setPage($page)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get page
     *
     * @return integer 
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
