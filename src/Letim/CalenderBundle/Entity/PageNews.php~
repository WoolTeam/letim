<?php

namespace Letim\CalenderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PageNews
 *
 * @ORM\Table(name="page_news", indexes={@ORM\Index(name="news_page", columns={"page"})})
 * @ORM\Entity
 */
class PageNews
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
     * @var \Page
     *
     * @ORM\ManyToOne(targetEntity="Page")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="page", referencedColumnName="id")
     * })
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
     * @param \Letim\CalenderBundle\Entity\Page $page
     * @return PageNews
     */
    public function setPage(\Letim\CalenderBundle\Entity\Page $page = null)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get page
     *
     * @return \Letim\CalenderBundle\Entity\Page 
     */
    public function getPage()
    {
        return $this->page;
    }
}
