<?php

namespace App\Controller;

use App\Repository\PostCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(PostCategoryRepository $PostCategoryRepository): Response
    {
        // $this->getDoctrine()->getManager()->getConfiguration()->getMetadataDriverImpl()->getAllClassNames();
        $categories = $PostCategoryRepository->findBy([
            'status' => 'active'
        ]);
      
        return  $this->render('home/index.html.twig', [
            'categories' => $categories
        ]);
    }

    /**
     * @Route("/category/{id}", name="show_category")
     */
    public function show_category($id, Request $request, PostCategoryRepository $PostCategoryRepository): Response
    {
        $category = $PostCategoryRepository->find($id);
        return $this->render('home/index.html.twig', [
            'category' => $category
        ]);
    }

    /**
     * @Route("/terms-and-conditions", name="page_terms")
     */
    public function page_terms()
    {
        
    }
}
