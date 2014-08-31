<?php

namespace Letim\ReviewBundle\Controller;

use Letim\ReviewBundle\Entity\Review;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request, $state)
    {
        $settings = array(
            'width' => 206,
            'height' => 57,
            'font_size' => 22,
            'length' => 7,
            'border_color' => "cccccc",
            'label' => ' ',
            'attr' => array('class' => 'pole'),
        );
        $review = new Review();
        $form = $this->createFormBuilder()
            ->add(
                'author',
                'text',
                array('label' => 'Ваше имя', 'required' => true, 'attr' => array('class' => 'pole'))
            )
            ->add('email', 'email', array('label' => 'Email', 'required' => true, 'attr' => array('class' => 'pole')))
            ->add('text', 'textarea', array('label' => 'Отзыв', 'required' => true, 'attr' => array('class' => 'poleArea')))
            ->add('securitycod', 'genemu_captcha', $settings)
            ->getForm();
        $success = '';
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            $param = $request->request->get('form');
            if ($form->isValid()) {
                $time = new \DateTime();
                $review->setCreatedAt($time);
                $review->setUpdatedAt($time);
                $review->setActive(0);
                $review->setAuthor($param['author']);
                $review->setEmail($param['email']);
                $review->setText($param['text']);
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
        $max = $em->createQuery('
            SELECT r.id as id FROM LetimReviewBundle:Review r
            WHERE r.active = 1')
            ->getArrayResult();
        foreach($max as $item) {
            $ids[] = $item['id'];
        }
        $random = array_rand($ids, 2);
        $build = $em->createQueryBuilder();
        $build->select(array('r.text', 'r.author'));
        $build->from("LetimReviewBundle:Review", 'r');
        $build->where("r.active = 1");
        $build->add('where', 'r.id IN (:rand)');
        $build->orderBy("r.createdAt", "DESC");
        if ($limit) {
            $build->setParameter('rand', array(0 =>$ids[$random[0]], 1 =>$ids[$random[1]]));
            $build->setFirstResult(0);
            $build->setMaxResults($limit);
        }
        $query = $build->getQuery();
        $result = $query->getScalarResult();

        return $this->render('LetimReviewBundle:Default:' . $tpl . '.html.twig', array('reviews' => $result));
    }
}
