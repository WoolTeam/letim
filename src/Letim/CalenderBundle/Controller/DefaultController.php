<?php

namespace Letim\CalenderBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

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
        } else {
            $params['from'] = new \DateTime('from');
        }
        if(!array_key_exists('offset', $params)) {
            $params['to'] = new \DateTime();
            $params['to']->add(new \DateInterval('P7D'));
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
            'SELECT t
            FROM LetimCalenderBundle:Tunel t
            INNER JOIN t.plan p
            LEFT JOIN t.clients c
            WHERE t.startedAt BETWEEN :from AND :to
            ORDER BY t.id ASC'
        )->setParameters(
            array(
                'from' => $params['from'],
                'to' => $params['to']
            )
        );
        $result = $query->getResult();
        foreach ($result as $res) {
        //var_dump($res->getClients()->toArray());
        }
        
        if(count($result) > 0) {
            $day = new \DateInterval('P1D');
            $half = new \DateInterval('PT30M');
            $begin = new \DateInterval('PT11H');
            $arr = array();
            for( $i = 0; $i <= 6; $i++ ) {
                $curfrom = clone $params['from'];
                $curfrom->add($begin);            
                for( $j = 0; $j <= 23; $j++) {
                    $fromt = $curfrom->getTimestamp();
                    $curfrom->add($half);
                    $tot = $curfrom->getTimestamp();
                    foreach($result as $res) {
                        if(($res->getStartedAt()->getTimestamp() <= $tot) && ($res->getStartedAt()->getTimestamp() > $fromt) ) {
                            $clients = $res->getClients()->toArray();
                            foreach ($clients as $client) {
                                $cl[] = $client->getClient()->getId();
                            }
                            $curarr['id'] = $res->getId();
                            $curarr['clients'] = $cl;
                            $curarr['duration'] = $res->getPlan()->getDuration();
                            $arr[$i][$j][] = $curarr;
                            $curarr = null;
                            $cl = null;
                        }
                    }
                }
                $params['from']->add($day);            
            }
            $success = true;
            $messages = array('Всё в порядке');
        } else {
            $arr = null;
            $success = false;
            $messages = array('Данных нет');
        }  
        $data = $this->formatReturn($arr, $success, $messages);
        $response = new JsonResponse();
        $response->setData($data);
        return $response;
    }
    
    public function getSomeAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT p
            FROM LetimCalenderBundle:Plan p'
        );
        $result = $query->getResult();
        var_dump($result);      
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
    
    private function formatReturn($data = null, $success = true, $messages = null) {
        $output['success'] = $success;
        $output['messages'] = $messages;
        $output['data'] = $data;
        return $output;
    }
}
