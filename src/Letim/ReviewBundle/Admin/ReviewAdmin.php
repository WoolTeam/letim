<?php
/**
 * Created by PhpStorm.
 * User: abaddon
 * Date: 12.08.14
 * Time: 15:23
 */

namespace Letim\ReviewBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ReviewAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('text', 'genemu_tinymce', array('label' => 'Текст отзыва'))
            ->add('author',null, array('label' => 'Автор'))
            ->add('active', null, array('label' => 'Опубликовать', 'required' => false))
            ->add('createdAt', null, array('label' => 'Время создания'))
            ->add('updatedAt', null, array('label' => 'Время обновления'));
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('author', null, array('label' => 'Автор'))
            ->add('active', null, array('label' => 'Опубликованные'));
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
            ->addIdentifier('author')
            ->add('text');
    }
}