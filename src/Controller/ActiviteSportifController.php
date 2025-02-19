<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\ActiviteSportif;
use App\Entity\PlanNutritionnels;
use App\Form\ActiviteSportifType;
use Doctrine\ORM\EntityManagerInterface;


class ActiviteSportifController extends AbstractController
{
    #[Route('/activite/sportif', name: 'app_activite_sportif')]
    public function index(): Response
    {
        return $this->render('activite_sportif/index.html.twig', [
            'controller_name' => 'ActiviteSportifController',
        ]);
    }
    #[Route('/add/{planId}', name: 'add_activite', methods: ['GET', 'POST'])]
    public function addActivite(Request $request, EntityManagerInterface $entityManager, int $planId): Response
    {
        $plan = $entityManager->getRepository(PlanNutritionnels::class)->find($planId);
        if (!$plan) {
            throw $this->createNotFoundException('Plan not found!');
        }

        $activite = new ActiviteSportif();
        $activite->setPlan($plan);

        $form = $this->createForm(ActiviteSportifType::class, $activite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($activite);
            $entityManager->flush();

            return $this->redirectToRoute('app_plan_list'); // Adjust to your list page
        }

        return $this->render('activite_sportif/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    #[Route('/activite/edit/{id}', name: 'edit_activite')]
    public function editActivite(int $id, Request $request, EntityManagerInterface $entityManager): Response
    {
        // Find the activity manually
        $activite = $entityManager->getRepository(ActiviteSportif::class)->find($id);

        if (!$activite) {
            throw $this->createNotFoundException('Activité non trouvée');
        }

        $form = $this->createForm(ActiviteSportifType::class, $activite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            return $this->redirectToRoute('plan_activities', ['id' => $activite->getPlan()->getIdPlan()]);
        }

        return $this->render('activite_sportif/edit.html.twig', [
            'form' => $form->createView(),
            'activite' => $activite,
        ]);
    }
#[Route('/activite/delete/{id}', name: 'delete_activite', methods: ['POST'])]
public function deleteActivite(int $id, EntityManagerInterface $entityManager): Response
{
    $activite = $entityManager->getRepository(ActiviteSportif::class)->find($id);

    if (!$activite) {
        throw $this->createNotFoundException('Activité non trouvée');
    }

    $planId = $activite->getPlan()->getIdPlan();

    $entityManager->remove($activite);
    $entityManager->flush();

    return $this->redirectToRoute('plan_activities', ['id' => $planId]);
}
}
