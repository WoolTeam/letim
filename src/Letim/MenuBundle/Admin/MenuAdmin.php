<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Колюха
 * Date: 10.08.14
 * Time: 11:09
 * To change this template use File | Settings | File Templates.
 */

namespace Letim\MenuBundle\Admin;


use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class MenuAdmin extends Admin{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', null, array())
//            ->add('route', null, array())
//            ->add('alias', null, array())
//            ->add('static', null, array('required' => false))
//            ->add('menuTypeId', 'sonata_type_model', array(
//                    'class'=>'MenuBundle:MenuItem',
//                    'property'=>'title',
//                    'required' => false
//                )
//            )
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            //->add('title', null, array())
            ->add('id', null, array())
            ->add('name', null, array())
        ;
    }

    public function configureShowField(ShowMapper $showMapper){
        $showMapper
            ->add('name', null, array())
            ->add('id', null, array())
            //->add('route', null, array())
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name', null, array())
//            ->add('route', null, array())
//            ->add('id', null, array())
//            ->add('menuTypeId', 'entity', array(
//                    'class'=>'MenuBundle:MenuItem',
//                    'property'=>'title'
//                )
//            )
        ;
    }
}