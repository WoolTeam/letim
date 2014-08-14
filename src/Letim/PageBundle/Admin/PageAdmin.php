<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Колюха
 * Date: 08.08.14
 * Time: 13:39
 * To change this template use File | Settings | File Templates.
 */

namespace Letim\PageBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class PageAdmin extends Admin{
    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
            ->add('title', 'text', array('label' => 'Заголовок'))
            ->add('url', 'text', array('label' => 'URL'))
            ->add('active', null, array('label' => 'Опубликовать'))
            ->add('createdAt', null, array('label' => 'Дата создания'))
            //->add('updatedAt', null, array('label' => 'последнее обновление!'))
            //->add('author', 'entity', array('class' => 'Acme\DemoBundle\Entity\User'))
            ->add('homePage', null, array('label' => 'Использовать как страницу по умолчанию'))
            ->add('text','genemu_tinymce',array('label' => 'Текст статьи'))
            //->add('text',null,array('label' => 'Текст статьи'))
        ;
    }
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('url')
            ->add('text')
        ;
    }
    public function getNewInstance()
    {
        $instance = parent::getNewInstance();
        $newdar = new \DateTime();
        $instance->setCreatedAt($newdar);
        return $instance;
    }

    public function preUpdate($page)
    {
        if($page->getHomePage()) {
            $this->clearHomePage($page);
        }
    }

    public function prePersist($page)
    {
        if($page->getHomePage()) {
            $this->clearHomePage($page);
        }
    }

    private  function clearHomePage($object) {
        $em = $this->modelManager->getEntityManager($object);
        $homePage = $em->getRepository('LetimPageBundle:Page')->
        findBy(array(
            'homePage' =>  true
        ));
        foreach($homePage as $page) {
            $page->setHomePage(false);
        }
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title', null, array('label' => 'Заголовок'))
            ->add('url')
            //->add('author')
        ;
    }
}