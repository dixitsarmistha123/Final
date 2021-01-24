<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Annotation\Request;

class DashboardController extends AbstractController
{
    /**
     * @Route("/user/dashboard", name="front_dashboard")
     */
    public function index(ProductRepository $productRepository): Response
    {
        $products = $productRepository->findBy([
            'product_status' => 'active'
        ]);

        return $this->render('user/dashboard.html.twig', [
            'products' => $products
        ]);
    }
  /**
     * @Route("/product/{id}", name="show_product")
     */
    public function show_product($id, HttpFoundationRequest $request, ProductRepository $ProductRepository): Response
    {
        $products = $ProductRepository->find($id);
        return $this->render('user/product.html.twig', [
            'products' => $products
        ]);
    }
    /**
     * @Route("/user/profile", name="front_profile")
     */
    public function profile(ProductRepository $productRepository): Response
    {
        $products = $productRepository->findBy([
            'product_status' => 'active'
        ]);
        return $this->render('user/dashboard.html.twig', [
            'products' => $products
        ]);
    }
}
