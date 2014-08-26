<?php

namespace Letim\CalenderBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Letim\CalenderBundle\Entity\Tunel;
use Letim\CalenderBundle\Entity\ClientTunel;
use Letim\CalenderBundle\Entity\User;
use Sonata\AdminBundle\Controller\CoreController;
class AdminController extends CoreController
{
    public function bronirovanieAction(Request $request)
    {
        return $this->render('LetimCalenderBundle:Admin:index.html.twig', array(
            'base_template'   => $this->getBaseTemplate(),
            'admin_pool'      => $this->container->get('sonata.admin.pool'),
            'blocks'          => $this->container->getParameter('sonata.admin.configuration.dashboard_blocks')
        ));
    }
}
