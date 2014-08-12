<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Колюха
 * Date: 10.08.14
 * Time: 12:15
 * To change this template use File | Settings | File Templates.
 */

namespace Letim\MenuBundle\Menu;


use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class MenuBuilder extends ContainerAware
{
//    function __call($name, $argument) {
//        return $this->getMenu($name, $argument[0], $argument[1]);
//    }

    public function getMenu(FactoryInterface $factory, array $options)
    {
        $name = $options['menu'];

        $em = $this->container->get('doctrine')->getManager();
        $query = $em->createQuery("SELECT
        Page.url url,
        Item.name name
        FROM LetimMenuBundle:MenuItem Item
        LEFT JOIN Item.menu Menu
        LEFT JOIN Item.page Page
        WHERE  Menu.name = :name")
            ->setParameter('name', $name);
        $menu = $query->getArrayResult();
        if(empty($menu)) {
            return null;
        }
        $request = $this->container->get('request');
        $routeParam = $request->attributes->get('_route_params');
        $newMenu = $factory->createItem($name);
        $newMenu->setChildrenAttributes(array('class' => 'top_menu'));
        foreach($menu as $m) {
                $param = array();
                $param['uri'] = '/'.$m['url'];
                if(!empty($routeParam['url'])) {
                    if($routeParam['url'] === $m['url']) {
                        $param['current'] = true;
                    }
                }
                $newMenu->addChild($m['name'], $param);
        }

        return $newMenu;
    }
}