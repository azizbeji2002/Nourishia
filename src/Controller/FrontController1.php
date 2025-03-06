<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Notification;
use App\Repository\NotificationRepository;
final class FrontController1 extends AbstractController
{
    private NotificationRepository $notificationRepository;

    #[Route('/front', name: 'app_front')]
    public function index(  NotificationRepository $notificationRepository): Response
    {
        $notifications = $notificationRepository->findBy([], ['createdAt' => 'DESC']);

        $unreadNotificationsCount = $notificationRepository->count(['isRead' => false]);

        return $this->render('front/index.html.twig', [
            'controller_name' => 'FrontController1',
            'notifications' => $notifications,
            'unreadNotificationsCount' => $unreadNotificationsCount,
        ]);
    }


    #[Route('/notification/read/{id}', name: 'notification_read', methods: ['GET'])]
    public function markAsRead(int $id, NotificationRepository $notificationRepository, EntityManagerInterface $entityManager): Response
    {
        $notification = $notificationRepository->find($id);
        
        if (!$notification) {
            throw $this->createNotFoundException('Notification non trouvée.');
        }
    
        // Marquer la notification comme lue sans la supprimer
        $notification->setIsRead(true);
        $entityManager->persist($notification);
        $entityManager->flush();
    
        // Rediriger vers la réclamation
        return $this->redirectToRoute('app_rendez_vous_index');
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
