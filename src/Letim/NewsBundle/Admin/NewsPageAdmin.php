<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Колюха
 * Date: 10.08.14
 * Time: 16:09
 * To change this template use File | Settings | File Templates.
 */

namespace Letim\NewsBundle\Admin;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class NewsPageAdmin extends Admin{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('Page', 'sonata_type_model', array(
                    'class'=>'LetimNewsBundle:Page',
                    'property'=>'title',
                    'required' => false
                )
            )
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            //->add('title', null, array())
            ->add('id', null, array())
            //->add('title', null, array())
        ;
    }

//    public function getNewInstance()
//    {
//        $instance = parent::getNewInstance();
//        $newdar = new \DateTime();
//        $instance->setCreatedAt($newdar);
//        return $instance;
//    }

    public function configureShowField(ShowMapper $showMapper){
        $showMapper
            //->add('title', null, array())
            ->add('id', null, array())
            //->add('route', null, array())
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('pageUrl', null, array('label' => 'url'))
//            ->add('Page', 'null', array(
//                    'class'=>'LetimMenuBundle:Page',
//                    'property'=>'title',
//                    'required' => false
//                )
//            )
            //->add('ImageUrl', null,array('template' => 'LetimNewsBundle:Admin:list_image.html.twig'))
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