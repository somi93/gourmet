<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Navigation;
use AppBundle\Entity\Documents;
use AppBundle\Entity\Menu;
use AppBundle\Entity\Chef;
use AppBundle\Form\ChefForm;
use AppBundle\Form\MenuForm;
use AppBundle\Form\GalleryForm;
use AppBundle\Form\NavigationForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    /**
     * @Route("/admin", name="admin")
     */
    public function adminAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $user = $this->getUser();

        $links = $em->getRepository('AppBundle:Navigation')->findAll();

        $navForm = $this->createForm(NavigationForm::class);

        $navForm->handleRequest($request);

        if ($navForm->isSubmitted() && $navForm->isValid()) {
            $navigationLink = $navForm->getData();
            $em->persist($navigationLink);
            $em->flush();
            $this->addFlash('success', 'Link created!');
            return $this->redirectToRoute('admin');
        }

        $chef = new Chef();
        $chefForm = $this->createForm(ChefForm::class, $chef);
        $chefForm->handleRequest($request);

        if($chefForm->isSubmitted() && $chefForm->isValid()) {

            $name = $chef->getName();
            $description = $chef->getDescription();
            $photo = $chef->getPhoto();
            $fileName = $photo->getClientOriginalName();

            $photo->move(
                $this->getParameter('brochures_directory'),
                $fileName
            );

            $fileName = "images/".$fileName;
            $chef->setName($name);
            $chef->setDescription($description);
            $chef->setPhoto($fileName);

            $em->persist($chef);

            $em->flush();

            $this->addFlash('success', 'Chef created!');

            return $this->redirectToRoute('admin');
        }


        $menu = new Menu();
        $menuForm = $this->createForm(MenuForm::class, $menu);
        $menuForm->handleRequest($request);

        if ($menuForm->isSubmitted() && $menuForm->isValid()) {

            $name = $menu->getName();
            $price = $menu->getPrice();
            $description = $menu->getDescription();
            $photo = $menu->getPhoto();
            $fileName = $photo->getClientOriginalName();

            $photo->move(
                $this->getParameter('brochures_directory'),
                $fileName
            );

            $fileName = "images/".$fileName;

            $menu->setName($name);
            $menu->setDescription($description);
            $menu->setPrice($price);
            $menu->setPhoto($fileName);

            $em->persist($menu);

            $em->flush();

            $this->addFlash('success', 'Menu created!');

            return $this->redirectToRoute('admin');
        }

        $document = new Documents();
        $galleryForm = $this->createForm(GalleryForm::class, $document);
        $galleryForm->handleRequest($request);

        if ($galleryForm->isSubmitted() && $galleryForm->isValid()) {

            $file = $document->getBrochure();
            $fileName = $file->getClientOriginalName();

            // Move the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('brochures_directory'),
                $fileName
            );

            $fileName = "images/".$fileName;
            // Update the 'brochure' property to store the PDF file name
            // instead of its contents

            $document->setBrochure($fileName);
            $em->persist($document);
            $em->flush();
            $this->addFlash('success', 'Document uploaded!');

            return $this->redirectToRoute('admin');

        }

        return $this->render('admin/admin.html.twig', [
            'navigationForm' => $navForm->createView(),
            'menuForm' => $menuForm->createView(),
            'galleryForm' => $galleryForm->createView(),
            'chefForm' => $chefForm->createView(),
            'links' => $links,
            'user' => $user
        ]);
    }

    /**
     * @Route("/admin/list", name="adminList")
     */
    public function adminList()
    {

        $em = $this->getDoctrine()->getManager();

        $user = $this->getUser();

        $links = $em->getRepository('AppBundle:Navigation')->findAll();
        $chefs = $em->getRepository('AppBundle:Chef')->findAll();
        $menu = $em->getRepository('AppBundle:Menu')->findAll();
        $gallery = $em->getRepository('AppBundle:Documents')->findAll();

        return $this->render('admin/adminList.html.twig', [
            'links' => $links,
            'chefs' => $chefs,
            'menu' => $menu,
            'gallery' => $gallery,
            'user' => $user
        ]);
    }

    /**
     * @Route("/navigation/delete", name="navigationDelete")
     */
    public function deleteNavigation()
    {

        $id = $_REQUEST['id'];

        $em = $this->getDoctrine()->getManager();

        $link = $em->getRepository('AppBundle:Navigation')->find($id);

        $em->remove($link);
        $em->flush();

        return $this->redirectToRoute('admin');
    }

    /**
     * @Route("/menu/delete", name="menuDelete")
     */
    public function deleteMenu()
    {

        $id = $_REQUEST['id'];

        $em = $this->getDoctrine()->getManager();

        $link = $em->getRepository('AppBundle:Menu')->find($id);

        $em->remove($link);
        $em->flush();

        return $this->redirectToRoute('admin');
    }

    /**
     * @Route("/chef/delete", name="chefDelete")
     */
    public function deleteChef()
    {

        $id = $_REQUEST['id'];

        $em = $this->getDoctrine()->getManager();

        $link = $em->getRepository('AppBundle:Chef')->find($id);

        $em->remove($link);
        $em->flush();

        return $this->redirectToRoute('admin');
    }

    /**
     * @Route("/document/delete", name="documentDelete")
     */
    public function deleteDocument()
    {

        $id = $_REQUEST['id'];

        $em = $this->getDoctrine()->getManager();

        $link = $em->getRepository('AppBundle:Documents')->find($id);

        $em->remove($link);
        $em->flush();

        return $this->redirectToRoute('admin');
    }

    /**
     * @Route("/navigation/new", name="navigation")
     */
    public function newNavigation()
    {
        $navigation = new Navigation();
        $link=$_REQUEST['link'];
        $linkText=$_REQUEST['linkText'];
        $navigation->setLink("$link");
        $navigation->setLinkText("$linkText");

        $em= $this->getDoctrine()->getManager();
        $em->persist($navigation);
        $em->flush();

        return new Response('Link created!');
    }
}
