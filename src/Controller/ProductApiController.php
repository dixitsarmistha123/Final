<?php

namespace App\Controller;

use App\Repository\PostRepository;
use App\Repository\ProductRepository;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
    /**
     * @Route("/api", name="api.")
     */
class ProductApiController extends AbstractController
{
    /**
     * @Route("/list", name="product_api")
     */
    public function index(ProductRepository $productRepository): Response
    {
        $products = $productRepository->findAll();
        return new JsonResponse($products);
    }

    /**
     * @Route("/list/{id}", name="product_api_show")
     */
    public function show(ProductRepository $productRepository, $id): Response
    {
        $product = $productRepository->find($id);
        return new JsonResponse($product);
    }

}
