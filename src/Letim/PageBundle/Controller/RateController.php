<?php

namespace Letim\PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RateController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT
            p.id planid,
            p.name,
            p.duration,
            p.maxPeople,
            p.cost,
            typ.name typename,
            typ.id typeid
            FROM LetimCalenderBundle:Plan p
            LEFT JOIN p.type typ'
        );
        $result = $query->getArrayResult();
        //print_r($result->getName());
        foreach($result as $plan) {
//            $arr['name'] = $plan['typename'];
            //print_r($plan);
            $arr[$plan['typename']][] = array(
                'duration' => $plan['duration'],
                'name' => $plan['name'],
                'maxPeople' => $plan['maxPeople'],
                'cost' => $plan['cost'],
                'planid' => $plan['planid'],
                'typeid' => $plan['typeid'],
            );
        }
        return $this->render('LetimPageBundle:Rate:index.html.twig', array(
            'rate' => $arr
        ));
    }
}
