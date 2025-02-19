<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ProductRepository; // Import the ProductRepository
use Doctrine\Persistence\ManagerRegistry; // Import ManagerRegistry
use App\Repository\CategorieRepository; // Add this line
Use App\Entity\Categorie; // Import the Product entity
use App\Form\ProductType; // Import the ProductType form
use App\Entity\Product; // Import the Product entity
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Filesystem\Filesystem;


final class FrontController extends AbstractController
{
    private $productRepository; // Ensure the property name matches the parameter name
    private $categorieRepository; // Ensure the property name matches the parameter name
    private $entityManager;

    public function __construct(ProductRepository $productRepository,CategorieRepository $categorieRepository, ManagerRegistry $doctrine)
    {
        $this->productRepository = $productRepository;
        $this->categorieRepository = $categorieRepository;
        $this->entityManager = $doctrine->getManager();
    }
    #[Route('/front', name: 'app_front')]
    public function index(): Response
    {
        return $this->render('front/index.html.twig', [
            'controller_name' => 'FrontController',
        ]);
    }
    #[Route('/produitss', name: 'app_produitss')]
    public function produitss(): Response
    {
        $products = $this->productRepository->findAll();
        $categories = $this->categorieRepository->findAll();
        return $this->render('front/produitss.html.twig', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }
    #[Route('/produit/{categorie}', name: 'produit_categorie')]
    public function categorieProduct(Categorie $categorie): Response
    {
        $products = $categorie->getProducts(); // Use the correct variable name
        $categories = $this->categorieRepository->findAll();
        
        return $this->render('front/produitss.html.twig', [
            'products' => $products, // Use 'products' instead of 'product'
            'categories' => $categories,
        ]);
    }
    #[Route('/produitss/search', name: 'produit_searchkk')]
public function searchProduct(Request $request): Response
{
    $searchTerm = $request->query->get('q'); // Get the search term from the query string

    if ($searchTerm) {
        // Search for products by name
        $products = $this->productRepository->findByName($searchTerm);
    } else {
        // If no search term is provided, show all products
        $products = $this->productRepository->findAll();
    }

    // Fetch all categories
    $categories = $this->categorieRepository->findAll();

    // Render the template with the search results and categories
    return $this->render('front/produitss.html.twig', [
        'products' => $products,
        'categories' => $categories, // Pass the categories variable
        'searchTerm' => $searchTerm,
    ]);
}

}
