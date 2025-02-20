<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\PlanNutritionnels;

use App\Form\PlanNutritionnelsType;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/plan', name: 'app_plan')]
    public function list(EntityManagerInterface $entityManager): Response
    {
        // Fetch all PlanNutritionnels from the database
        $plans = $entityManager->getRepository(PlanNutritionnels::class)->findAll();

        return $this->render('home/plan.html.twig', [
            'plans' => $plans,
        ]);
    }

    #[Route('/{id}/activities', name: 'show_activities')]
    public function showActivities(int $id, EntityManagerInterface $entityManager): Response
    {
        // Find the plan by ID
        $plan = $entityManager->getRepository(PlanNutritionnels::class)->find($id);

        if (!$plan) {
            throw $this->createNotFoundException("Plan not found!");
        }

        // Fetch activities related to this plan
        $activities = $plan->getActivites();

        return $this->render('home/activity.html.twig', [
            'plan' => $plan,
            'activities' => $activities,
        ]);
    }
}
