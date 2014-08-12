<?php

namespace Letim\PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($url)
    {
        if(null === $page = $this->getDoctrine()->getRepository('LetimPageBundle:Page')->findOneBy(array(
                'url' => $url,
                'active' => true
            ))) {
        }
        return $this->render('LetimPageBundle:Default:basePage.html.twig', array('page' => $page));
    }

    public function homePageAction() {
        if(null === $page = $this->getDoctrine()->getRepository('LetimPageBundle:Page')->findOneBy(array(
                'homePage' => true,
                'active' => true
            ))) {
            //404
        }
        return $this->render('LetimPageBundle:Default:index.html.twig', array('page' => $page));
    }
}
