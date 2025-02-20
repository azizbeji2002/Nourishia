<?php

namespace App\Controller;

use App\Entity\DossiersMedicaux;
use App\Form\DossiersMedicauxType;
use App\Repository\DossiersMedicauxRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/dossiers/medicaux')]
final class DossiersMedicauxController extends AbstractController
{
    #[Route(name: 'app_dossiers_medicaux_index', methods: ['GET'])]
    public function index(DossiersMedicauxRepository $dossiersMedicauxRepository): Response
    {
        return $this->render('dossiers_medicaux/index.html.twig', [
            'dossiers_medicauxes' => $dossiersMedicauxRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_dossiers_medicaux_new', methods: ['GET', 'POST'])]
public function new(Request $request, EntityManagerInterface $entityManager): Response
{
    $dossiersMedicaux = new DossiersMedicaux();
    $form = $this->createForm(DossiersMedicauxType::class, $dossiersMedicaux);
    $form->handleRequest($request);

    if ($form->isSubmitted()) {
        // Vérification des champs requis
        if (!$form->get('diagnostic')->getData() || !$form->get('traitement')->getData()) {
            $this->addFlash('error', 'Le diagnostic et le traitement sont obligatoires.');
        }

        $file = $form->get('fichier')->getData();
        if ($file) {
            if ($file->guessExtension() !== 'pdf') {
                $this->addFlash('error', 'Seuls les fichiers PDF sont autorisés.');
            } else {
                $fileName = uniqid() . '.' . $file->guessExtension();
                try {
                    $file->move($this->getParameter('uploads_directory'), $fileName);
                    $dossiersMedicaux->setFichier($fileName);
                } catch (\Exception $e) {
                    $this->addFlash('error', 'Une erreur est survenue lors du téléchargement du fichier.');
                }
            }
        }

        if ($form->isValid()) {
            $entityManager->persist($dossiersMedicaux);
            $entityManager->flush();
        
            return $this->redirectToRoute('app_dossiers_medicaux_index', [], Response::HTTP_SEE_OTHER);
        } else {
            $this->addFlash('error', 'Veuillez corriger les erreurs dans le formulaire.');
        }
    }

    return $this->render('dossiers_medicaux/new.html.twig', [
        'dossiers_medicaux' => $dossiersMedicaux,
        'form' => $form->createView(),
    ]);
}



    #[Route('/{id}', name: 'app_dossiers_medicaux_show', methods: ['GET'])]
    public function show(DossiersMedicaux $dossiersMedicaux): Response
    {
        return $this->render('dossiers_medicaux/show.html.twig', [
            'dossiers_medicaux' => $dossiersMedicaux,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_dossiers_medicaux_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, DossiersMedicaux $dossiersMedicaux, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DossiersMedicauxType::class, $dossiersMedicaux);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $file = $form->get('fichier')->getData();
            
            if ($file) {
                $fileName = uniqid().'.'.$file->guessExtension();
    
                try {
                    $file->move($this->getParameter('uploads_directory'), $fileName);
                    $dossiersMedicaux->setFichier($fileName); // Mise à jour de l'entité avec le nouveau fichier
                } catch (\Exception $e) {
                    $this->addFlash('error', 'Une erreur est survenue lors du téléchargement du fichier.');
                }
            }
    
            // Sauvegarde de l'entité
            $entityManager->flush();
    
            return $this->redirectToRoute('app_dossiers_medicaux_index', [], Response::HTTP_SEE_OTHER);
        }
    
        return $this->render('dossiers_medicaux/edit.html.twig', [
            'dossiers_medicaux' => $dossiersMedicaux,
            'form' => $form->createView(),
        ]);
    }
    
    #[Route('/{id}', name: 'app_dossiers_medicaux_delete', methods: ['POST'])]
    public function delete(Request $request, DossiersMedicaux $dossiersMedicaux, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$dossiersMedicaux->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($dossiersMedicaux);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_dossiers_medicaux_index', [], Response::HTTP_SEE_OTHER);
    }
}
