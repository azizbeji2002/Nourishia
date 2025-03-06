<?php

namespace App\Controller;

use App\Entity\DossiersMedicaux;
use App\Entity\User;
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
    public function index(Request $request, DossiersMedicauxRepository $dossiersMedicauxRepository): Response
    {
        $searchTerm = $request->query->get('search', '');
        $sexeBebe = $request->query->get('sexeBebe', '');
        $sortField = $request->query->get('sortField', 'date_creation');
        $sortOrder = $request->query->get('sortOrder', 'ASC');

        $qb = $dossiersMedicauxRepository->createQueryBuilder('d')
            ->where('1=1');

        if ($searchTerm) {
            $qb->andWhere('d.diagnostic LIKE :searchTerm OR d.traitement LIKE :searchTerm OR d.allergie LIKE :searchTerm')
               ->setParameter('searchTerm', '%' . $searchTerm . '%');
        }

        if ($sexeBebe) {
            $qb->andWhere('d.sexeBebe = :sexeBebe')
               ->setParameter('sexeBebe', $sexeBebe);
        }

        if ($sortField) {
            $qb->orderBy('d.' . $sortField, $sortOrder);
        }

        $dossiersMedicaux = $qb->getQuery()->getResult();


        $showArchived = $request->query->getBoolean('showArchived', false);
if (!$showArchived) {
    $qb->andWhere('d.isArchived = false');
}


        return $this->render('dossiers_medicaux/index.html.twig', [
            'dossiers_medicauxes' => $dossiersMedicaux,
            'search' => $searchTerm,
            'sexeBebe' => $sexeBebe,
            'sortField' => $sortField,
            'sortOrder' => $sortOrder,
        ]);
    }
 

    #[Route('/front', name: 'app_dossiers_medicaux_Front', methods: ['GET'])]
    public function indexFront(Request $request, DossiersMedicauxRepository $dossiersMedicauxRepository): Response
    {
        $searchTerm = $request->query->get('search', '');
        $showArchived = $request->query->getBoolean('showArchived', false);
    
        $qb = $dossiersMedicauxRepository->createQueryBuilder('d')
            ->leftJoin('d.patient_id', 'p')  // Jointure avec l'entité Patient
            ->where('1=1'); // Start with a base condition
    
        if ($searchTerm) {
            $qb->andWhere('d.diagnostic LIKE :searchTerm 
                   OR d.traitement LIKE :searchTerm 
                   OR d.allergie LIKE :searchTerm 
                   OR p.nom LIKE :searchTerm')  // Recherche par nom du patient
       ->setParameter('searchTerm', '%' . $searchTerm . '%');
        }
    
        if ($showArchived !== null) {
            $qb->andWhere('d.isArchived = :showArchived')
               ->setParameter('showArchived', $showArchived);
        }
    
        $dossiersMedicaux = $qb->getQuery()->getResult();
    
        return $this->render('dossiers_medicaux/indexFront.html.twig', [
            'dossiers_medicauxes' => $dossiersMedicaux,
            'search' => $searchTerm,
            'showArchived' => $showArchived,
        ]);
    }
    
    
#[Route('/ajoutFront', name: 'app_dossiers_medicaux_ajoutFrontt', methods: ['GET', 'POST'])]
public function ajoutFront(Request $request, EntityManagerInterface $entityManager): Response
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
        
            return $this->redirectToRoute('app_dossiers_medicaux_Front', [], Response::HTTP_SEE_OTHER);
        } else {
            $this->addFlash('error', 'Veuillez corriger les erreurs dans le formulaire.');
        }
    }

    return $this->render('dossiers_medicaux/newFront.html.twig', [
        'dossiers_medicaux' => $dossiersMedicaux,
        'form' => $form->createView(),
    ]);
}





    #[Route('/new', name: 'app_dossiers_medicaux_new', methods: ['GET', 'POST'])]
public function new(Request $request, EntityManagerInterface $entityManager): Response
{
    $dossiersMedicaux = new DossiersMedicaux();
    $form = $this->createForm(DossiersMedicauxType::class, $dossiersMedicaux);
    $form->handleRequest($request);

    $docteur_id = $this->getUser();
    if ($form->isSubmitted()) {
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
    #[Route('/{id}/afff', name: 'app_dossiers_medicaux_aff', methods: ['GET'])]
    public function affichage(DossiersMedicaux $dossiersMedicaux): Response
    {
        return $this->render('dossiers_medicaux/affichage.html.twig', [
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
                    $dossiersMedicaux->setFichier($fileName); 
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
    


    #[Route('/{id}/archive', name: 'app_dossiers_medicaux_archive')]
    public function archive(DossiersMedicaux $dossier, EntityManagerInterface $entityManager): Response
    {
        $dossier->archive();
        $entityManager->flush();
    
        return $this->redirectToRoute('app_dossiers_medicaux_Front');
    }
    


    #[Route('/{id}/updateFront', name: 'app_dossiers_medicaux_updateFront', methods: ['GET', 'POST'])]
    public function updateFront(Request $request, DossiersMedicaux $dossiersMedicaux, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DossiersMedicauxType::class, $dossiersMedicaux);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $file = $form->get('fichier')->getData();
            
            if ($file) {
                $fileName = uniqid().'.'.$file->guessExtension();
    
                try {
                    $file->move($this->getParameter('uploads_directory'), $fileName);
                    $dossiersMedicaux->setFichier($fileName); 
                } catch (\Exception $e) {
                    $this->addFlash('error', 'Une erreur est survenue lors du téléchargement du fichier.');
                }
            }
    
            $entityManager->flush();
    
            return $this->redirectToRoute('app_dossiers_medicaux_Front', [], Response::HTTP_SEE_OTHER);
        }
    
        return $this->render('dossiers_medicaux/updateFront.html.twig', [
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
