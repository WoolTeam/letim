<?php
/**
 * Created by PhpStorm.
 * User: abaddon
 * Date: 15.08.14
 * Time: 12:22
 */

namespace Letim\CalenderBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
class TunelAdmin extends Admin {
    protected function configureFormFields(FormMapper $formMapper)
    {
        $em = $this->modelManager->getEntityManager('Letim\CalenderBundle\Entity\User');
        $query = $em->createQuery(
            'SELECT u
            FROM LetimCalenderBundle:User u'
        );
//        $q = $em->createQueryBuilder('u')
//            ->select('u')
//            ->from('CalenderBundle:User', 'u');
//
//        $query = $query->getArrayResult();
        //$b = $query->getArrayResult();
        $arrayType = $query->getResult();
        //$query = $q->getQuery();
        //print_r($arrayType);
        $formMapper
            ->add('startedAt', null, array('label' => 'Дата'))
            ->add('clients',null, array(
                //'required' => true,
                'class'=>'Letim\CalenderBundle\Entity\User',
                //'property'=> 'email',
                'expanded' => true ,
                'multiple' => true ,
                //'choices' => 'Letim\CalenderBundle\Entity\User'
            ));
//        $formMapper
//            ->add('startedAt', null, array('label' => 'Дата'))
//            ->add('clients',null, array('class' => 'Letim\DemoBundle\Entity\User'));
//             ->with('General')
//
//             ->add('clients', 'sonata_type_model', array('by_reference' => false))
             //->end()

            //->add('clients', null, array('label' => 'clients'))
        ;
    }

    public function preUpdate($tunel)
    {
        if($tunel) {
//            $em = $this->modelManager->getEntityManager('Letim\CalenderBundle\Entity\User');
//            //print_r($tunel->getClients()->first()->getClient()->getEmail());
//            $arr = $tunel->getClients()->toArray();
//            foreach($arr as $key) {
//
//            }
//             $em->persist($tunel->getClients());
        }
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('startedAt', null, array('label' => 'Тип тарифного плана'));
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('startedAt');
    }
} 