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

class NewsAdmin extends Admin{

    protected $datagridValues = array(
        '_sort_order' => 'DESC',
        '_sort_by' => 'createdAt'
    );


    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title', null, array())
            ->add('teaser', null, array())
            ->add('text', 'genemu_tinymce', array())
            ->add('active', null, array())
            ->add('createdAt', null, array())

            ->add('photo', 'iphp_file')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            //->add('title', null, array())
            ->add('id', null, array())
            ->add('title', null, array())
        ;
    }

    public function getNewInstance()
    {
        $instance = parent::getNewInstance();
        $newdar = new \DateTime();
        $instance->setCreatedAt($newdar);
        return $instance;
    }

//    public function configureShowField(ShowMapper $showMapper){
//        $showMapper
//            ->add('title', null, array())
//            ->add('id', null, array())
//            //->add('route', null, array())
//        ;
//    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title', null, array())
            ->add('ImageUrl', null,array('template' => 'LetimNewsBundle:Admin:list_image.html.twig'))
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