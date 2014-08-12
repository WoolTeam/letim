<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Колюха
 * Date: 09.08.14
 * Time: 13:49
 * To change this template use File | Settings | File Templates.
 */

namespace Letim\PageBundle\Model;


class PageManager {
    protected $em;
    protected $securityContext;
    public function __construct(EntityManager $em, SecurityContext $securityContext) {
        $this->em = $em;
        $this->securityContext = $securityContext;
    }

    private function getEm() {
        if($this->em) {
            return $this->em;
        }
        return null;
    }

    public  function clearHomePage() {
        if(null === $em = $this->getEm()) {
            return null;
        }
        $homePage = $em->getRepository('LetimPageBundle:Page')->findBy(array(
            'homePage' =>  true
        ));
        foreach($homePage as $page) {
            $page->setHomePage(false);
        }
        $em->flush();
    }
}