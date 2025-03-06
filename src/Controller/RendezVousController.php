<?php

namespace App\Controller;

use App\Entity\RendezVous;
use App\Form\RendezVousType;
use App\Repository\RendezVousRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Enum\StatutRendez;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use App\Entity\Notification;
use App\Repository\NotificationRepository;

#[Route('/rendez/vous')]
final class RendezVousController extends AbstractController
{
    private NotificationRepository $notificationRepository;

    #[Route(name: 'app_rendez_vous_index', methods: ['GET'])]
    public function index(RendezVousRepository $rendezVousRepository,NotificationRepository $notificationRepository): Response
    {
        $notifications = $notificationRepository->findBy([], ['createdAt' => 'DESC']);

        $unreadNotificationsCount = $notificationRepository->count(['isRead' => false]);
        return $this->render('rendez_vous/index.html.twig', [
            'rendez_vouses' => $rendezVousRepository->findAll(),
            'notifications' => $notifications,
            'unreadNotificationsCount' => $unreadNotificationsCount,
        ]);
    }


    


    #[Route('/new', name: 'app_rendez_vous_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $rendezVou = new RendezVous();
        $form = $this->createForm(RendezVousType::class, $rendezVou);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Mapper la valeur du champ 'statut' à l'énumération
            $statut = $form->get('statut')->getData();
            $rendezVou->setStatut(StatutRendez::from($statut));

            $entityManager->persist($rendezVou);
            $entityManager->flush();

            return $this->redirectToRoute('app_rendez_vous_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('rendez_vous/new.html.twig', [
            'rendez_vou' => $rendezVou,
            'form' => $form->createView(),
        ]);
    }
    #[Route('/newFront', name: 'app_rendez_vous_newFront', methods: ['GET', 'POST'])]
    public function newFront(Request $request, EntityManagerInterface $entityManager): Response
    {
        $rendezVou = new RendezVous();
        $form = $this->createForm(RendezVousType::class, $rendezVou, [
            'show_statut' => false,
        ]);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $rendezVou->setStatut(StatutRendez::En_Attente);
    
            $patient = $rendezVou->getPatient(); 

             // Création de la notification
             $notification = new Notification();
             $notification->setMessage("Demande de rendez-vous pour " . $patient->getNom());
             $notification->setCreatedAt(new \DateTime());
             $notification->setRendezvous($rendezVou);
              
             $entityManager->persist($notification);

            $entityManager->persist($rendezVou);
            $entityManager->flush();
    
            return $this->redirectToRoute('app_rendez_vous_newFront', [], Response::HTTP_SEE_OTHER);
        }
    
        return $this->render('rendez_vous/newFront.html.twig', [
            'rendez_vou' => $rendezVou,
            'form' => $form->createView(),
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
        return $this->redirectToRoute('app_rendez_vous_show', ['id' => $notification->getRendezvous()->getId()]);
    }

    #[Route('/notification/delete/{id}', name: 'notification_delete', methods: ['POST'])]
    public function deleteNotification(int $id, NotificationRepository $notificationRepository, EntityManagerInterface $entityManager): Response
    {
        $notification = $notificationRepository->find($id);
        
        if (!$notification) {
            throw $this->createNotFoundException('Notification non trouvée.');
        }
    
        $entityManager->remove($notification);
        $entityManager->flush();
    
        return $this->redirectToRoute('app_rendez_vous_index');
    }

    
    #[Route('/{id}', name: 'app_rendez_vous_show', methods: ['GET'])]
    public function show(RendezVous $rendezVou ,NotificationRepository $notificationRepository): Response
    {
        $notifications = $notificationRepository->findBy([], ['createdAt' => 'DESC']);

        $unreadNotificationsCount = $notificationRepository->count(['isRead' => false]);
        return $this->render('rendez_vous/show.html.twig', [
            'rendez_vou' => $rendezVou,
            'notifications' => $notifications,
            'unreadNotificationsCount' => $unreadNotificationsCount,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_rendez_vous_edit', methods: ['GET', 'POST'])]
public function edit(Request $request, RendezVous $rendezVou,NotificationRepository $notificationRepository ,EntityManagerInterface $entityManager, MailerInterface $mailer): Response
{
    $notifications = $notificationRepository->findBy([], ['createdAt' => 'DESC']);

    $unreadNotificationsCount = $notificationRepository->count(['isRead' => false]);
    $form = $this->createForm(RendezVousType::class, $rendezVou);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $ancienStatut = $rendezVou->getStatut();
        $statut = $form->get('statut')->getData();

        if ($statut) {
            $rendezVou->setStatut(StatutRendez::from($statut));
        }

        $entityManager->flush();

        if ($ancienStatut !== $rendezVou->getStatut()) {
            $patient = $rendezVou->getPatient(); 
            $emailPatient = $patient->getEmail();
            $dateRdv = $rendezVou->getDateRdv()->format('d/m/Y à H:i'); 

            $statusMessage = match ($rendezVou->getStatut()) {
                StatutRendez::CONFIMEE => [
                    'subject' => "Votre rendez-vous est confirmé",
                    'message' => "Nous vous confirmons votre rendez-vous prévu le <strong>{$dateRdv}</strong>."
                ],
                StatutRendez::ANNULEE => [
                    'subject' => "Votre rendez-vous a été annulé",
                    'message' => "Nous vous informons que votre rendez-vous prévu le <strong>{$dateRdv}</strong> a été annulé."
                ],
                default => [
                    'subject' => "Mise à jour de votre rendez-vous",
                    'message' => "Le statut de votre rendez-vous a été mis à jour."
                ]
            };

            $email = (new Email())
                ->from('monceftriki35@gmail.com')
                ->to($emailPatient)
                ->subject($statusMessage['subject'])
                ->html("
                    <p>Bonjour <strong>{$patient->getNom()}</strong>,</p>
                    <p>{$statusMessage['message']}</p>
                    <p>Si vous avez des questions, n'hésitez pas à nous contacter.</p>
                    <p>Cordialement,</p>
                    <p><strong>Votre Centre de Rendez-vous</strong></p>
                ");

            $mailer->send($email);
        }

        $this->addFlash('success', 'Statut mis à jour et email envoyé au patient.');

        return $this->redirectToRoute('app_rendez_vous_index', [], Response::HTTP_SEE_OTHER);
    }

    return $this->render('rendez_vous/edit.html.twig', [
        'rendez_vou' => $rendezVou,
        'form' => $form->createView(),
        'notifications' => $notifications,
        'unreadNotificationsCount' => $unreadNotificationsCount,
    ]);
}

    

    #[Route('/{id}', name: 'app_rendez_vous_delete', methods: ['POST'])]
    public function delete(Request $request, RendezVous $rendezVou, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$rendezVou->getId(), $request->get('_token'))) {
            $entityManager->remove($rendezVou);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_rendez_vous_index', [], Response::HTTP_SEE_OTHER);
    }
}
