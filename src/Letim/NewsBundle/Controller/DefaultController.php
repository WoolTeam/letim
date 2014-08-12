<?php

namespace Letim\NewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('LetimNewsBundle:Default:index.html.twig', array('name' => $name));
    }

    public function newsAction($id) {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('
            SELECT news FROM LetimNewsBundle:News news
            INNER JOIN LetimNewsBundle:PageNews pn WHEN pn.page = :page
            WHERE news.active = true
        ');
        $page = $em->getRepository('LetimNewsBundle:Page')->findOneBy(array(
            'id' => $id
        ));
        $query->setParameter('page', $page);
        $news = $query->getResult();
        return $this->render('LetimNewsBundle:Default:news.html.twig', array('articles' => $news));
    }

    public function articleAction($id) {
        $pageNews = $this->getDoctrine()->getRepository('LetimNewsBundle:News')->findOneBy(array(
            'id' => $id,
            'active' => true
        ));
        if (!$pageNews) {
            throw $this->createNotFoundException('Такой статьи не существует!');
        }
        return $this->render('LetimNewsBundle:Default:article.html.twig', array('page' => $pageNews));
    }

    public function lastNewsAction($limit = 3) {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('
            SELECT news FROM LetimNewsBundle:News news
            WHERE news.active = true ORDER BY news.id
        ');
        $query->setMaxResults($limit);
        $news = $query->getResult();
        return $this->render('LetimNewsBundle:Default:lastNews.html.twig', array('articles' => $news));
    }
}
