<?php
/**
 * Created by PhpStorm.
 * User: abaddon
 * Date: 15.08.14
 * Time: 10:57
 */

namespace Letim\CalenderBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class PlanAdmin extends Admin
{

    protected $datagridValues = array(
        '_sort_order' => 'DESC',
        '_sort_by' => 'id'
    );


    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('type', null, array(
                'class' => 'LetimCalenderBundle:PlanType',
                'property' => 'name',
                'label' => "Тип тарифного плана"
            ))
            ->add('name', 'text', array('label' => 'Имя тарифного плана'))
            ->add('duration', null, array('label' => 'Продолжительность'))
            ->add('cost', null, array('label' => 'Стоимость'))
            ->add('maxPeople', null, array('label' => 'Кол-во людей'))
            ->add('createdAt', null, array('label' => 'Время создания'))
            ->add('updatedAt', null, array('label' => 'Время обновления'));
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name', null, array('label' => 'Имя тарифного плана'))
            ->add('duration', null, array('label' => 'Продолжительность'))
            ->add('cost', null, array('label' => 'Стоимость'))
            ->add('maxPeople', null, array('label' => 'Кол-во людей'));
    }

    public function preUpdate($object)
    {
        $updateTime = new \DateTime();
        $object->setUpdatedAt($updateTime);
    }

    public function prePersist($object)
    {
        $createTime = new \DateTime();
        $object->setCreatedAt($createTime);
        $object->setUpdatedAt($createTime);
    }

    public function getNewInstance()
    {
        $instance = parent::getNewInstance();
        $newdar = new \DateTime();
        $instance->setCreatedAt($newdar);
        $instance->setUpdatedAt($newdar);
        return $instance;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('duration')
            ->add('cost')
            ->add('maxPeople')
            ->add('typeplan',null, array('label' => 'План'));

    }
} 