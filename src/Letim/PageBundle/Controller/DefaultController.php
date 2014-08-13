<?php

namespace Letim\PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction($url)
    {
        if (null === $page = $this->getDoctrine()->getRepository('LetimPageBundle:Page')->findOneBy(array(
                'url' => $url,
                'active' => true
            ))
        ) {
        }
        return $this->render('LetimPageBundle:Default:basePage.html.twig', array('page' => $page));
    }

    public function homePageAction()
    {
        if (null === $page = $this->getDoctrine()->getRepository('LetimPageBundle:Page')->findOneBy(array(
                'homePage' => true,
                'active' => true
            ))
        ) {
            //404
        }
        return $this->render('LetimPageBundle:Default:index.html.twig', array('page' => $page));
    }

    public function mailsendAction(Request $request)
    {
        $result['errors'] = array();
        $result['success'] = '';
        $name = $request->get('name');
        $email = $request->get('email');
        $phone = $request->get('phone');
        $error = array();
        if ($name == 'Ваше имя' || !$name) {
            $error['name'] = 'Вы не заполнили поле Ваше имя';
        }
        if ($email == 'Ваш email' || !$email || !preg_match('/^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/', $email)) {
            $error['email'] = 'Вы не заполнили поле Email';
        }
        if ($phone == 'Ваш телефон' || !$phone) {
            $error['phone'] = 'Вы не заполнили поле Телефон';
        }

        if (count($error)) {
            $result['errors'] = $error;
        } else {
            $message = \Swift_Message::newInstance()
                ->setSubject('Hello Email')
                ->setFrom('send@example.com')
                ->setTo('feedback@letim.pro')
                ->setBody(
                    $this->renderView(
                        'LetimPageBundle:Default:email.html.twig',
                        array('name' => $name, 'email' => $email, 'phone' => $phone), 'text/html'
                    )
                );
            $this->get('mailer')->send($message);
            $result['success'] = 'Ваша заявка отправлена! В ближайшее время наши менеджеры свяжутся с вами.';
        }
        return new Response(json_encode($result));
    }
}
