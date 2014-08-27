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
class ClientTunelAdmin extends Admin {
//    protected $datagridValues = array(
//        '_sort_order' => 'DESC',
//        '_sort_by' => 'startedAt'
//    );

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            //->add('tunel.id', null, array())
            ->add('client',null, array());
        ;
    }


    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('client', null,array());
//            );
            //->add('clients', null, array('label' => 'Клиент'))
            //$datagridMapper->add('startedAt', 'doctrine_orm_datetime_range', array('attr' => array('class' => 'datepicker')));
        //$datagridMapper->add('startedAt', 'doctrine_orm_datetime_range', array('label'=>'Диапозон дат'), null, array('widget' => 'single_text', 'required' => false,  'attr' => array('class' => 'datepicker_a')));
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            //->addIdentifier('tunel.id',null,array())
            ->addIdentifier('client.name', null, array())
//            ->addIdentifier('planType', null, array())
//            ->addIdentifier('clients', null, array())
        ;

    }
} 