<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Documents;
use AppBundle\Entity\Menu;
use AppBundle\Form\MenuForm;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $user = $this->getUser();

        $links = $em->getRepository('AppBundle:Navigation')->findAll();

        $sliderPhotos = $em->getRepository('AppBundle:Slider')->findAll();

        $products = $em->getRepository('AppBundle:Menu')->findAll();

        return $this->render('user/user.html.twig', [
            'links' => $links,
            'sliderPhotos' => $sliderPhotos,
            'products' => $products,
            'user' => $user
        ]);

    }
    /**
     * @Route("/menu", name="menu")
     */
    public function menuAction()
    {
        $em = $this->getDoctrine()->getManager();

        $user = $this->getUser();

        $links = $em->getRepository('AppBundle:Navigation')->findAll();

        $products = $em->getRepository('AppBundle:Menu')->findAll();

        return $this->render('user/menu.html.twig', [
            'links' => $links,
            'products' => $products,
            'user' => $user
        ]);
    }
    /**
     * @Route("/portfolio", name="portfolio")
     */
    public function portfolioAction()
    {
        $em = $this->getDoctrine()->getManager();

        $user = $this->getUser();

        $links = $em->getRepository('AppBundle:Navigation')->findAll();

        $documents = $em->getRepository('AppBundle:Documents')->findAll();

        return $this->render('user/portfolio.html.twig', [
            'links' => $links,
            'user' => $user,
            'documents' => $documents
        ]);
    }
    /**
     * @Route("/news", name="news")
     */
    public function newsAction()
    {
        $em = $this->getDoctrine()->getManager();

        $user = $this->getUser();

        $links = $em->getRepository('AppBundle:Navigation')->findAll();

        return $this->render('user/news.html.twig', [
            'links' => $links,
            'user' => $user
        ]);
    }
    /**
     * @Route("/contacts", name="contacts")
     */
    public function contactsAction()
    {
        $em = $this->getDoctrine()->getManager();

        $user = $this->getUser();

        $links = $em->getRepository('AppBundle:Navigation')->findAll();

        return $this->render('user/contacts.html.twig', [
            'links' => $links,
            'user' => $user
        ]);
    }
    /**
     * @Route("/about_us", name="about_us")
     */
    public function aboutUsAction()
    {
        $em = $this->getDoctrine()->getManager();

        $user = $this->getUser();

        $chefs = $em->getRepository('AppBundle:Chef')->findAll();

        $links = $em->getRepository('AppBundle:Navigation')->findAll();

        return $this->render('user/about_us.html.twig', [
            'links' => $links,
            'chefs' => $chefs,
            'user' => $user
        ]);
    }


}
