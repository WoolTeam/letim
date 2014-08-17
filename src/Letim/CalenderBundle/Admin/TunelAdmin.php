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
        $formMapper
            ->add('startedAt', null, array('label' => 'Дата'))
            ->add('clients',null, array());
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


    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('startedAt', null, array('label' => 'Тип тарифного плана'));
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('startedAt','datetime',array('format' => 'H:i d M'))
            ->addIdentifier('planName')
            ->addIdentifier('clients')
            ->addIdentifier('planType')
        ;

    }
} 