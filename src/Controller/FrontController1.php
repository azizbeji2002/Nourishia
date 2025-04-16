<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

final class FrontController1 extends AbstractController
{
    #[Route('/front', name: 'app_front')]
    public function index(): Response
    {
        return $this->render('front/index.html.twig', [
            'controller_name' => 'FrontController1',
        ]);
    }

    #[Route("/profile_user", name: 'app_profile')]
    public function getUserProfile(UserRepository $repo): Response {
        $user = $this->getUser(); // Récupérer l'utilisateur connecté
    
        if (!$user) {
            throw $this->createNotFoundException("Utilisateur non trouvé !");
        }
    
        return $this->render('front.html.twig', [
            'user' => $user, // Passer directement l'utilisateur connecté
        ]);
    }
    
    
}
