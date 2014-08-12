<?php

namespace Letim\PhotoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('LetimPhotoBundle:Default:index.html.twig', array('name' => $name));
    }
}
