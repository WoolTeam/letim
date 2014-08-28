<?php

namespace Letim\SecureBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class UserAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('username')
            ->add('email')
            ->add('pass')
            ->add('salt')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            //->add('id')
            //->add('username')
            ->add('email')
//            ->add('pass')
            ->add('userroles')
            ->add('_action', 'actions', array(
                'actions' => array(
                    //'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            //->add('id')
            ->add('username')
            ->add('email')
            //->add('name')
            ->add('surname')
            ->add('userroles')
//            ->add('pass')
//            ->add('salt')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
           // ->add('id')
            ->add('username')
            ->add('email')
            ->add('pass')
            ->add('salt')
        ;
    }
}
