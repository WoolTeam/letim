<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Колюха
 * Date: 10.08.14
 * Time: 11:23
 * To change this template use File | Settings | File Templates.
 */

namespace Letim\MenuBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class MenuItemAdmin extends Admin{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', null, array())
            ->add('Page', 'sonata_type_model', array(
                    'class'=>'LetimMenuBundle:Page',
                    'property'=>'title',
                    'required' => false
                )
            )
            ->add('menu', 'sonata_type_model', array(
                    'class'=>'LetimMenuBundle:Menu',
                    'property'=>'name',
                    'required' => false
                )
            )
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name', null, array())
            ->add('id', null, array())
        ;
    }

    public function configureShowField(ShowMapper $showMapper){
        $showMapper
            ->add('name', null, array())
//            ->add('menu', null, array())
            ->add('id', null, array())
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name', null, array())
            ->add('page', null, array('label' => 'url'))
            ->add('menu', null, array())
        ;
    }
}