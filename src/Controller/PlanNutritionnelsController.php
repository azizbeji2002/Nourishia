<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\PlanNutritionnels;

use App\Form\PlanNutritionnelsType;
use Symfony\Component\HttpFoundation\Request;



class PlanNutritionnelsController extends AbstractController
{ 
    
    #[Route('/plan/new', name: 'app_plan_new')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $plan = new PlanNutritionnels();
        $form = $this->createForm(PlanNutritionnelsType::class, $plan);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($plan);
            $entityManager->flush();

            return $this->redirectToRoute('app_plan_list'); // Redirect to a list page
        }

        return $this->render('plan_nutritionnels/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/plant/display', name: 'app_plan_list')]
    public function list(EntityManagerInterface $entityManager): Response
    {
        // Fetch all PlanNutritionnels from the database
        $plans = $entityManager->getRepository(PlanNutritionnels::class)->findAll();

        return $this->render('plan_nutritionnels/display.html.twig', [
            'plans' => $plans,
        ]);
    }
    
    #[Route('/plan/edit/{id}', name: 'plan_edit', methods: ['GET', 'POST'])]
    public function edit(int $id, Request $request, EntityManagerInterface $entityManager): Response
    {
        // Fetch the plan using the repository
        $plan = $entityManager->getRepository(PlanNutritionnels::class)->find($id);

        // Handle case where the entity is not found
        if (!$plan) {
            throw $this->createNotFoundException('Plan not found');
        }

        // Create form
        $form = $this->createForm(PlanNutritionnelsType::class, $plan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush(); // Save changes
            $this->addFlash('success', 'Plan modifié avec succès !');
            return $this->redirectToRoute('app_plan_list');
        }

        return $this->render('plan_nutritionnels/edit.html.twig', [
            'form' => $form->createView(),
            'plan' => $plan,
        ]);
    }
    #[Route('/plan/delete/{id}', name: 'delete_plan', methods: ['POST'])]
    public function deletePlan(int $id, EntityManagerInterface $entityManager): Response
    {
        // Manually fetch the plan from the database
        $plan = $entityManager->getRepository(PlanNutritionnels::class)->find($id);

        // If the plan does not exist, throw a 404 error
        if (!$plan) {
            throw $this->createNotFoundException('Plan not found.');
        }

        // Remove the plan
        $entityManager->remove($plan);
        $entityManager->flush();

        // Redirect back to the plan list
        return $this->redirectToRoute('app_plan_list'); // Ensure this route exists
    }
    #[Route('/plan/{id}/activities', name: 'plan_activities')]
    public function showActivities(int $id, EntityManagerInterface $entityManager): Response
    {
        // Find the plan by ID
        $plan = $entityManager->getRepository(PlanNutritionnels::class)->find($id);

        if (!$plan) {
            throw $this->createNotFoundException("Plan not found!");
        }

        // Fetch activities related to this plan
        $activities = $plan->getActivites();

        return $this->render('activite_sportif/display.html.twig', [
            'plan' => $plan,
            'activities' => $activities,
        ]);
    }

}
    
    


  

