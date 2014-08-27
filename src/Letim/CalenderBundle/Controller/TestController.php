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
class TestController extends CoreController
{
    public function testAction()
    {
        $em = $this->getDoctrine()->getManager();
        $tunel = $em->getRepository('LetimCalenderBundle:Tunel')->findOneById(15);
        $ct = new ClientTunel();
        $ct->setClient($em->getRepository('LetimCalenderBundle:User')->findOneById(16));
        $tunel->addClients($ct);
//        $ct = new ClientTunel();
//        $ct->setClient($em->getRepository('LetimCalenderBundle:User')->findOneById(16));
//        $ct->setTunel($em->getRepository('LetimCalenderBundle:Tunel')->findOneById(15));
        $em->persist($tunel);
        $em->flush();
        //$em->getRepository('LetimCalenderBundle:Tunel')->
//        return $this->render('LetimCalenderBundle:Admin:index.html.twig', array(
//            'base_template'   => $this->getBaseTemplate(),
//            'admin_pool'      => $this->container->get('sonata.admin.pool'),
//            'blocks'          => $this->container->getParameter('sonata.admin.configuration.dashboard_blocks')
//        ));
        return new Response();
    }
}
