<?php

namespace Letim\CalenderBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function getTunelsAction(Request $request)
    {
        $params = $request->getContent();
        if ($params) {
            $params = json_decode($request->getContent(), true);
        } else {
            $params = array();
        }
        
        if(!array_key_exists('from', $params)) {
            $params['from'] = new \DateTime();
            //$params['from'] = $params['from']->sub(new \DateInterval('P7D'));
        } else {
            $params['from'] = new \DateTime('from');
        }
        if(!array_key_exists('offset', $params)) {
            $params['to'] = new \DateTime();
        } else {
            $params['to'] = new \DateTime('to');
        }
        
        $week = 1;
        if($week == 1) {
            $params['from'] = $this->getWeek($params['from']);
            $params['to'] = clone $params['from'];
            $params['to']->add(new \DateInterval('P7D'));
        }      
        
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT t.id, t.startedAt
            FROM LetimCalenderBundle:Tunel t
            WHERE t.startedAt BETWEEN :from AND :to
            ORDER BY t.id ASC'
        )->setParameters(
            array(
                'from' => $params['from'],
                'to' => $params['to']
            )
        );
        $result = $query->getResult();
        
        $day = new \DateInterval('P1D');
        $half = new \DateInterval('PT30M');
        $begin = new \DateInterval('PT11H');
        $arr = array();
        for( $i = 0; $i <= 6; $i++ ) {
            $fromt = $params['from']->getTimestamp();
            $params['from']->add($day);
            $tot = $params['from']->getTimestamp();
            foreach($result as $res) {
                if(($res['startedAt']->getTimestamp() <= $tot) && ($res['startedAt']->getTimestamp() > $fromt) ) {
                    $arr[$i][] = $res;
                }
                var_dump($tot);
            }
        }
        var_dump($arr);
        return $this->render('LetimCalenderBundle:Default:index.html.twig', array('result' => $result));
    }
    
    private function getWeek(\DateTime $from) {
        $fromp = getdate($from->getTimestamp());
        $change = $fromp['wday'] - 1;
        if($change == -1) { $change = 6; }
        $from->sub(new \DateInterval('P'.$change.'D'));
        $fromp = getdate($from->getTimestamp());
        $realfrom = new \DateTime($fromp['year'].'-'.$fromp['mon'].'-'.$fromp['mday']);
        return $realfrom;
    }
}
