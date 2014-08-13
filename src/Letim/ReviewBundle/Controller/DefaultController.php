<?php

namespace Letim\ReviewBundle\Controller;

use Letim\ReviewBundle\Entity\Review;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request, $state)
    {
        $review = new Review();
        $form = $this->createFormBuilder($review)
            ->add('author', 'text', array('label' => 'Ваше имя', 'required' => true))
            ->add('text', 'textarea', array('label' => 'Отзыв', 'required' => true))
            ->getForm();
        $success = '';
        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if ($form->isValid()) {
                $time = new \DateTime();
                $review->setCreatedAt($time);
                $review->setUpdatedAt($time);
                $review->setActive(0);
                $em = $this->getDoctrine()->getManager();
                $em->persist($review);
                $em->flush();
                $success = 'Ваш отзыв будет опубликован после премодерации. Спасибо';
                return $this->redirect($this->generateUrl('letim_review_page_success'));
            }
        }
        if ($state == 'success') {
            $success = 'Ваш отзыв очень важен для нас. Он будет добавлен к общему списку после прохождения премодерации. Спасибо.';
            return $this->render('LetimReviewBundle:Default:success.html.twig', array('success' => $success));
        } else {
            return $this->render('LetimReviewBundle:Default:index.html.twig', array('form' => $form->createView()));
        }
    }

    public function listAction($tpl, $limit)
    {
        $em = $this->getDoctrine()->getManager();
        $build = $em->createQueryBuilder();
        $build->select(array('r.text', 'r.author'));
        $build->from("LetimReviewBundle:Review", 'r');
        $build->where("r.active = 1");
        if ($limit) {
            $build->setFirstResult(0);
            $build->setMaxResults($limit);
        }
        $query = $build->getQuery();
        $result = $query->getScalarResult();
        return $this->render('LetimReviewBundle:Default:' . $tpl . '.html.twig', array('reviews' => $result));
    }
}
