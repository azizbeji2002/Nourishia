<?php

namespace App\Controller;

use App\Entity\Consultation;
use App\Form\ConsultationType;
use App\Repository\ConsultationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Enum\StatutConsultation;

#[Route('/consultation')]
final class ConsultationController extends AbstractController
{

    #[Route(name: 'app_consultation_index', methods: ['GET'])]
    public function index(Request $request, ConsultationRepository $consultationRepository): Response
    {
        // Get sorting and filtering parameters from the request 
    
        $searchTerm = $request->query->get('search', '');
        $statut = $request->query->get('statut', '');
        $conseils = $request->query->get('conseils', '');
        $poids = $request->query->get('poids', '');
        $tension = $request->query->get('tension', '');
 
        $sortField = $request->query->get('sortField', 'date_consultation');
        $sortOrder = $request->query->get('sortOrder', 'ASC');

        // Build the query based on the filters
       
        $qb = $consultationRepository->createQueryBuilder('c')
            ->leftJoin('c.patient_id', 'p')
            ->leftJoin('c.docteur_id', 'd')
            ->where('1=1');

        // Apply search term to the filters
        if ($searchTerm) {
            $qb->andWhere('c.statut LIKE :searchTerm OR c.conseils LIKE :searchTerm OR c.poids LIKE :searchTerm OR c.tension LIKE :searchTerm')
               ->setParameter('searchTerm', '%' . $searchTerm . '%');
        }

        // Apply statut filter
        if ($statut) {
            $qb->andWhere('c.statut = :statut')
               ->setParameter('statut', $statut);
        }

        // Apply conseils filter
        if ($conseils) {
            $qb->andWhere('c.conseils LIKE :conseils')
               ->setParameter('conseils', '%' . $conseils . '%');
        }

        // Apply poids filter
        if ($poids) {
            $qb->andWhere('c.poids = :poids')
               ->setParameter('poids', $poids);
        }

        // Apply tension filter
        if ($tension) {
            $qb->andWhere('c.tension = :tension')
               ->setParameter('tension', $tension);
        }

        // Apply sorting
        $qb->orderBy('c.' . $sortField, $sortOrder);

        // Execute the query
        $consultations = $qb->getQuery()->getResult();

        // Render the template
        return $this->render('consultation/index.html.twig', [
            'consultations' => $consultations,
            'searchTerm' => $searchTerm,
            'statut' => $statut,
            'conseils' => $conseils,
            'poids' => $poids,
            'tension' => $tension,
            'sortField' => $sortField,
            'sortOrder' => $sortOrder,
        ]);
    }

    #[Route('/Front', name: 'app_consultation_frontConsultation', methods: ['GET'])]
public function front(Request $request, ConsultationRepository $consultationRepository): Response
{
    $searchTerm = $request->query->get('search', '');
    $statut = $request->query->get('statut', '');

    // Build the query with filtering based on search and statut
    $qb = $consultationRepository->createQueryBuilder('c')
        ->leftJoin('c.patient_id', 'p')
        ->leftJoin('c.docteur_id', 'd')
        ->where('1=1');

    if ($searchTerm) {
        $qb->andWhere('c.statut LIKE :searchTerm OR c.conseils LIKE :searchTerm OR c.poids LIKE :searchTerm OR c.tension LIKE :searchTerm')
            ->setParameter('searchTerm', '%' . $searchTerm . '%');
    }

    if ($statut) {
        $qb->andWhere('c.statut = :statut')
            ->setParameter('statut', $statut);
    }

    $consultations = $qb->getQuery()->getResult();

    return $this->render('consultation/frontConsultation.html.twig', [
        'consultations' => $consultations,
        'searchTerm' => $searchTerm,
        'statut' => $statut,
    ]);
}


    #[Route('/new', name: 'app_consultation_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $consultation = new Consultation();
        
        // Définir le statut directement comme ''
        $consultation->setStatut(StatutConsultation::PLANIFIEE);
    
        // Création du formulaire sans le champ 'statut'
        $form = $this->createForm(ConsultationType::class, $consultation);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($consultation);
            $entityManager->flush();
    
            return $this->redirectToRoute('app_consultation_index', [], Response::HTTP_SEE_OTHER);
        }
    
        return $this->render('consultation/new.html.twig', [
            'consultation' => $consultation,
            'form' => $form,
        ]);
    }


    #[Route('/newFront', name: 'app_consultation_newFront', methods: ['GET', 'POST'])]
    public function newFront(Request $request, EntityManagerInterface $entityManager): Response
    {
        $consultation = new Consultation();
        
        // Définir le statut directement comme ''
        $consultation->setStatut(StatutConsultation::PLANIFIEE);

        // Création du formulaire sans le champ 'statut'
        $form = $this->createForm(ConsultationType::class, $consultation);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($consultation);
            $entityManager->flush();
    
            return $this->redirectToRoute('app_consultation_frontConsultation', [], Response::HTTP_SEE_OTHER);
        }
    
        return $this->render('consultation/newFront.html.twig', [
            'consultation' => $consultation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_consultation_show', methods: ['GET'])]
    public function show(Consultation $consultation): Response
    {
        return $this->render('consultation/show.html.twig', [
            'consultation' => $consultation,
        ]);
    }

    #[Route('/{id}/affC', name: 'app_consultation_affConsul', methods: ['GET'])]
    public function affiCo(Consultation $consultation): Response
    {
        return $this->render('consultation/affConsul.html.twig', [
            'consultation' => $consultation,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_consultation_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Consultation $consultation, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ConsultationType::class, $consultation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_consultation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('consultation/edit.html.twig', [
            'consultation' => $consultation,
            'form' => $form,
        ]);
    }


    #[Route('/{id}/update', name: 'app_consultation_updateCons', methods: ['GET', 'POST'])]
    public function editCons(Request $request, Consultation $consultation, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ConsultationType::class, $consultation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_consultation_frontConsultation', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('consultation/editCons.html.twig', [
            'consultation' => $consultation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_consultation_delete', methods: ['POST'])]
    public function delete(Request $request, Consultation $consultation, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$consultation->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($consultation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_consultation_index', [], Response::HTTP_SEE_OTHER);
    }
}
