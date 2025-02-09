<?php

namespace App\Controller;

use App\Entity\Produits; // Ensure this is correctly imported
use App\Form\ProduitsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\ProduitsRepository; // Add this line
use Doctrine\Persistence\ManagerRegistry; // Add this line
use Symfony\Component\HttpFoundation\Request; // Add this line for $request
use Symfony\Component\Routing\Attribute\Route;

final class PageController extends AbstractController
{
    private $produitsRepository;
    private $entityManager;

    public function __construct(produitsRepository $produitsRepository,ManagerRegistry $doctrine)
    {
        $this->produitsRepository = $produitsRepository;
        $this->entityManager = $doctrine->getManager();
        
    }


    #[Route('/page', name: 'app_homepage')]
    public function index(): Response
    {
        return $this->render('page/index.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }
    #[Route('/page-liste', name: 'app_page_liste')]
    public function listProduits(): Response
    {
        $produits = $this->produitsRepository->findAll();
        return $this->render('page/index.html.twig', [
            'page-liste' => $produits,
        ]);
    }

    #[Route('/produits', name: 'app_produits')]
    public function produits(Request $request): Response // Add Request $request
    {
        // Correct the class name to "Produits" (PascalCase)
        $produits = new Produits();
        $form = $this->createForm(ProduitsType::class, $produits);
        $form->handleRequest($request);

        if($form->isSubmitted()&& $form->isValid()){
            $produits = $form->getData();
            if($request->files->get('produits')['image']);{
                $image = $request->files->get('produits')['image'];
                $image_name = time().'_'.$image->getclientOriginalName();
                $image->move($this->getParameter('image_directory'),$image_name);
                $produits->setImage($image_name);
            }
            $this->entityManager->persist($produits);
            $this->entityManager->flush();
            $this->addFlash(
                'success',
                'your product was saved'
            );
            return $this->redirectToRoute('app_produits');

               
        }
        return $this->renderForm('page/produits.html.twig', [
            'form' => $form,
        ]);
    }
}