<?php

namespace Letim\CalenderBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Letim\CalenderBundle\Entity\Tunel;
use Letim\CalenderBundle\Entity\ClientTunel;
use Letim\CalenderBundle\Entity\User;
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
            $params['from'] = new \DateTime($params['from']);
        }
        if(!array_key_exists('offset', $params)) {
            $params['to'] = new \DateTime();
            $params['to']->add(new \DateInterval('P7D'));
        } else {
            $params['to'] = new \DateTime($params['to']);
        }
        //print_r($params['from']);
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
                        if(($res->getStartedAt()->getTimestamp() < $tot) && ($res->getStartedAt()->getTimestamp() >= $fromt) ) {
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

    public function calendarAction() {
        return $this->render('LetimCalenderBundle:Default:calendar.html.twig');
    }

    public function bronirovanieAction () {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT
            typ.name name,
            typ.id id
            FROM LetimCalenderBundle:Plan p
            LEFT JOIN p.type typ GROUP BY typ.id'
        );
        $result = $query->getArrayResult();
        return $this->render('LetimCalenderBundle:Default:bron.html.twig', array(
            'plan' => $result
        ));
    }

    public function bronirovanieAAction () {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT
            typ.name name,
            typ.id id
            FROM LetimCalenderBundle:Plan p
            LEFT JOIN p.type typ GROUP BY typ.id'
        );
        $result = $query->getArrayResult();
        return $this->render('LetimCalenderBundle:Default:bronA.html.twig', array(
            'plan' => $result
        ));
    }

    public function bronformAction (Request $request) {
        $param = $request->getContent();
        if ($param) {
            $params = json_decode($param, true);
        }
        //print_r($params);
        if($params['typeid'] !== null) {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT p
            FROM LetimCalenderBundle:Plan p
            LEFT JOIN p.type typ
            WHERE typ.id =:typeid AND p.maxPeople >= :maxpeople'
        );
        $query->setParameter('typeid', $params['typeid']);
        if($params['maxpeople']) {
            $query->setParameter('maxpeople', $params['maxpeople']);
        }
//        if($params['maxpeople']) {
//            $query->setParameter('maxpeople', $params['maxpeople']);
//        }
        $result = $query->getArrayResult();

        //print_r($result->getName());
//        foreach($result as $plan) {
//            $arr['name'] = $plan['typename'];
//            $arr['id'] = $plan['typeid'];
//        }
        }
        return new Response(json_encode($result));
    }

    public function newBronAction (Request $request) {
        $param = $request->getContent();
        if ($param) {
            $params = json_decode($param, true);
        }
        $em = $this->getDoctrine()->getManager();
        $tunel = new Tunel();
        $create = new \DateTime();
        $tunel->setPlan($em->getRepository('LetimCalenderBundle:Plan')->findOneBy(array(
            'id' =>  $params['plan_id']
        )));
        $start = new \DateTime($params['date']);
        $tunel->setStartedAt($start);
        $tunel->setCreatedAt($create);
        $tunel->setUpdatedAt($create);
        $tunel->setActive(true);

        foreach($params['client'] as $user) {
            $Ctoonel = new ClientTunel();
            if(array_key_exists('email', $user) && array_key_exists('name', $user) && array_key_exists('phone', $user)) {
                $u = $em->getRepository('LetimCalenderBundle:User')->findOneByEmail(array(
                    'email' =>$user['email']
                ));
                if(!$u) {
                    $u = new User();
                    $u->setName($user['name']);
                    if(array_key_exists('surname', $user)) {
                        $u->setSurname($user['surname']);
                    }
                    $u->setEmail($user['email']);
                    $u->setPhone($user['phone']);
                    $u->setPass($user['email']);
                    $u->setSalt($user['email']);
                }
                $Ctoonel->setTunel($tunel);
                $em->persist($u);
                $Ctoonel->setClient($u);
                $em->persist($Ctoonel);
            }

        }
        $em->persist($tunel);

        $em->flush();
        $message = \Swift_Message::newInstance()
            ->setSubject('Hello Email')
            ->setFrom('send@example.com')
            ->setTo('feedback@letim.pro')
            ->setBody(
                $this->renderView(
                    'LetimPageBundle:Default:email.html.twig',
                    array('name' => $u->getName(), 'email' => $u->getEmail(), 'phone' => $u->getPhone()), 'text/html'
                )
            );
        $this->get('mailer')->send($message);
        return new Response(json_encode(array('sucses' => true)));
//        $em->getRepository('LetimCalenderBundle')->
    }
}
