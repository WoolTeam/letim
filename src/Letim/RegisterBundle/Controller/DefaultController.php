<?php

namespace Letim\RegisterBundle\Controller;

use Letim\SecureBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Letim\RegisterBundle\Form\Type;
use  Letim\RegisterBundle\Entity;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $user = new Entity\User();
        $form = $this->createForm(new Type\UserType(), $user, array(
            'action' => $this->generateUrl('new_user'),
        ));

        return $this->render('LetimRegisterBundle:Default:index.html.twig', array('form' => $form->createView()));
    }

    public function newUserAction(Request $request) {
        //print_r('324234234');
        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(new Type\UserType(), new Entity\User());

        $form->handleRequest($request);

        if ($form->isValid()) {
            $user = $form->getData();
            //$factory = $this->get('security.encoder_factory');
            //$encoder = $factory->getEncoder($user);
//            $ex = $em->getRepository('LetimRegisterBundle:User')->findBy(array(
//                ''
//            ));
            $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);
            $role = $em->getRepository('LetimRegisterBundle:Roles')->findOneById(2);
            $user->setSalt(md5(time()));
            $user->setPass($encoder->encodePassword($user->getPass(), $user->getSalt()));
            $user->setUserroles($role);
            $em->persist($user);
            $em->flush();
            return $this->redirect('/');
        }
        return $this->render(
            'LetimRegisterBundle:Default:register.html.twig',
            array('form' => $form->createView())
        );
    }

}
