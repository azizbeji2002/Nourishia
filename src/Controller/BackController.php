<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Product; // Import the Product entity
use App\Form\ProductType; // Import the ProductType form
use App\Repository\ProductRepository; // Import the ProductRepository
use Doctrine\Persistence\ManagerRegistry; // Import ManagerRegistry
use Symfony\Component\Filesystem\Filesystem;


final class BackController extends AbstractController
{
    private $productRepository; // Ensure the property name matches the parameter name
    private $entityManager;

    public function __construct(ProductRepository $productRepository, ManagerRegistry $doctrine)
    {
        $this->productRepository = $productRepository;
        $this->entityManager = $doctrine->getManager();
    }

    #[Route('/back', name: 'app_back')]
    public function index(): Response
    {
        return $this->render('back/index.html.twig', [
            'controller_name' => 'BackController',
        ]);
    }
   

    #[Route('/produit', name: 'app_produit')]
    public function store(Request $request): Response
    {
        $product = new Product(); // Create a new Product entity
        $form = $this->createForm(ProductType::class, $product); // Create the form
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $product = $form->getData();
            if ($request->files->get('product')['image']) {
                $image = $request->files->get('product')['image'];
                $image_name = time() . '_' . $image->getClientOriginalName();
                $image->move($this->getParameter('image_directory'), $image_name);
                $product->setImage($image_name);
            }
            $this->entityManager->persist($product);
            $this->entityManager->flush();
            $this->addFlash(
                'success',
                'Your product was saved'
            );
            return $this->redirectToRoute('app_produit');
        }
        // Fetch all products from the repository
    $products = $this->productRepository->findAll();

        // Pass the products variable to the template
    return $this->render('back/produit.html.twig', [
        'form' => $form->createView(),
        'products' => $products, // Pass the products variable
        ]);
    }
    
    #[Route('/produit/details/{id}', name: 'produit_show')]
public function show(Product $product): Response
{
    return $this->render('back/show.html.twig', [
        'product' => $product,
    ]);
}

#[Route('/produit/{id}/edit', name: 'produit_edit')]
public function edit(int $id, ProductRepository $productRepository, Request $request): Response
{
    // Fetch the product by ID
    $product = $productRepository->find($id);

    if (!$product) {
        throw $this->createNotFoundException('Product not found');
    }

    // Store the old image path for deletion
    $oldImage = $product->getImage();

    // Create the edit form
    $form = $this->createForm(ProductType::class, $product);
    $form->handleRequest($request);

    // Handle form submission
    if ($form->isSubmitted() && $form->isValid()) {
        // Handle image upload
        $uploadedFile = $form->get('image')->getData();

        if ($uploadedFile) {
            // Generate a unique name for the file
            $newFilename = time() . '_' . $uploadedFile->getClientOriginalName();

            // Move the file to the directory where images are stored
            $uploadedFile->move(
                $this->getParameter('image_directory'),
                $newFilename
            );

            // Delete the old image if it exists
            if ($oldImage) {
                $filesystem = new Filesystem();
                $oldImagePath = $this->getParameter('image_directory') . '/' . $oldImage;
                if ($filesystem->exists($oldImagePath)) {
                    $filesystem->remove($oldImagePath);
                }
            }

            // Update the product's image property
            $product->setImage($newFilename);
        }

        // Save the updated product
        $this->entityManager->flush();

        // Add a flash message
        $this->addFlash('success', 'Product updated successfully');

        // Redirect to the product list
        return $this->redirectToRoute('app_produit');
    }

    // Render the edit template
    return $this->render('back/edit.html.twig', [
        'form' => $form->createView(),
        'product' => $product,
    ]);
}

#[Route('/produit/delete/{id}', name: 'produit_delete')]
public function delete(Product $product): Response
{
    $filesystem = new Filesystem();
    $imagePath = './uploads/' . $product->getImage();
    if ($filesystem->exists($imagePath)) {
        $filesystem->remove($imagePath);
    }

    $this->entityManager->remove($product);
    $this->entityManager->flush();
    $this->addFlash(
        'success',
        'Your product was removed'
    );

    return $this->redirectToRoute('app_produit');
}}
