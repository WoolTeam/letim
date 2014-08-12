<?php

namespace Letim\MenuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('LetimMenuBundle:Default:index.html.twig', array('name' => $name));
    }
}
