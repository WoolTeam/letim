<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Колюха
 * Date: 10.08.14
 * Time: 18:07
 * To change this template use File | Settings | File Templates.
 */

namespace Letim\PhotoBundle\Admin;


use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;

class PhotoAdmin extends Admin
{
    protected function configureListFields(ListMapper $listMapper)
    {
        return $listMapper->addIdentifier('title')->add ('date');
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        return $formMapper->add('title')->add ('date')->add('photo', 'iphp_file');
    }
}