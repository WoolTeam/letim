<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Колюха
 * Date: 10.08.14
 * Time: 16:09
 * To change this template use File | Settings | File Templates.
 */

namespace Letim\FaqBundle\Admin;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class FaqPagesAdmin extends Admin{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('Page', 'sonata_type_model', array(
                    'class'=>'LetimFaqBundle:Page',
                    'property'=>'title',
                    'required' => false,
                )
            )
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id', null, array())
        ;
    }

//    public function configureShowField(ShowMapper $showMapper){
//        $showMapper
//            ->add('id', null, array())
//        ;
//    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('pageUrl', null, array('label' => 'url'))
        ;
    }
}