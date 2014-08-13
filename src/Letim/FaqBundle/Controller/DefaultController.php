<?php

namespace Letim\FaqBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('LetimFaqBundle:Default:index.html.twig', array('name' => $name));
    }

    public function faqAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('
            SELECT faq FROM LetimFaqBundle:Faq faq
            INNER JOIN LetimFaqBundle:PageFaq pf WHEN pf.page = :page
            WHERE faq.active = true
        ');
        $localPage = $em->getRepository('LetimFaqBundle:Page')->findOneBy(array(
            'id' => $id
        ));
        $query->setParameter('page', $localPage);
        $result = $query->getResult();

        return $this->render('LetimFaqBundle:Default:faq.html.twig', array('questions' => $result));
    }
}
