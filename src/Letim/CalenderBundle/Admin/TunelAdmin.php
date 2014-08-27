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
    protected $datagridValues = array(
        '_sort_order' => 'DESC',
        '_sort_by' => 'startedAt'
    );

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('startedAt', null, array('label' => 'Дата'))
            ->add('clients','sonata_type_collection',array(
                //'required' => false,
                'type_options' => array('delete' => true)
            ), array(
                'edit' => 'inline',
                'inline' => 'table',
                'sortable' => 'position',
            ));
            //->add('clients',null, array('class' => 'Letim\CalenderBundle\Entity\User'));
            //->add('clients','sonata_type_model', array('by_reference' => false)
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
//        $datagridMapper
//            ->add('startedAt', null
//            );
            //->add('clients', null, array('label' => 'Клиент'))
            //$datagridMapper->add('startedAt', 'doctrine_orm_datetime_range', array('attr' => array('class' => 'datepicker')));
        $datagridMapper->add('startedAt', 'doctrine_orm_datetime_range', array('label'=>'Диапозон дат'), null, array('widget' => 'single_text', 'required' => false,  'attr' => array('class' => 'datepicker_a')));
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('startedAt',null,array('format' => 'H:i d.M','locale' => 'ru'))
            ->addIdentifier('planName', null, array('label' => 'Тариф'))
            ->addIdentifier('planType', null, array('label' => 'Тип тарифа'))
            ->addIdentifier('clients', null, array('label' => 'Клиент'))
        ;

    }
    public function prePersist($tunel)
    {
        return $this->preUpdate($tunel);
    }

    public function preUpdate($tunel)
    {
        //var_dump($tunel->getClients()->first);
        $tunel->setClients($tunel->getClients());
    }
} 