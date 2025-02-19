<?php

namespace App\Controller;

use App\Entity\Events;
use App\Form\EventType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class EventController extends AbstractController
{

  #[Route('/event', name: 'app_event_list')]
  public function list(EntityManagerInterface $entityManager): Response
  {
    $events = $entityManager->getRepository(Events::class)->findAll();

    return $this->render('front office/event.html.twig', [
      'events' => $events,
    ]);
  }
  #[Route('/new', name: 'app_event_new')]
  public function addEvent(Request $request, EntityManagerInterface $entityManager): Response
  {
    $event = new Events();
    $form = $this->createForm(EventType::class, $event);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $imageFile = $form->get('imageFile')->getData();

      if ($imageFile) {
        $uploadsDirectory = $this->getParameter('kernel.project_dir') . '/public/uploads/images';
        $newFilename = uniqid() . '.' . $imageFile->guessExtension();

        try {
          $imageFile->move($uploadsDirectory, $newFilename);
          $event->setImage('uploads/images/' . $newFilename);
        } catch (FileException $e) {
          $this->addFlash('error', 'Erreur lors de l\'upload de l\'image.');
        }
      }

      $entityManager->persist($event);
      $entityManager->flush();

      $this->addFlash('success', 'Événement ajouté avec succès !');
      return $this->redirectToRoute('app_event_list'); // Change selon ta route d'affichage
    }

    return $this->render('front office/newEvent.html.twig', [
      'form' => $form->createView(),
    ]);
  }
  #[Route('/event/{id}/edit', name: 'app_event_edit')]
  public function edit(Events $event, Request $request, EntityManagerInterface $entityManager): Response
  {

    $form = $this->createForm(EventType::class, $event);
    $form->handleRequest($request);


    if ($form->isSubmitted() && $form->isValid()) {
      $imageFile = $form->get('imageFile')->getData();


      if ($imageFile) {
        $uploadsDirectory = $this->getParameter('kernel.project_dir') . '/public/uploads/images';
        $newFilename = uniqid() . '.' . $imageFile->guessExtension();

        try {
          $imageFile->move($uploadsDirectory, $newFilename);
          $event->setImage('uploads/images/' . $newFilename);
        } catch (FileException $e) {
          $this->addFlash('error', 'Erreur lors de l\'upload de l\'image.');
        }
      }


      $entityManager->flush();


      $this->addFlash('success', 'L\'événement a été mis à jour avec succès !');
      return $this->redirectToRoute('app_event_list');
    }


    return $this->render('front office/editEvent.html.twig', [
      'form' => $form->createView(),
      'event' => $event,
    ]);
  }
  #[Route('/event/{id}/delete', name: 'app_event_delete', methods: ['POST'])]
  public function deleteEvent(int $id, EntityManagerInterface $entityManager): RedirectResponse
  {
    $event = $entityManager->getRepository(Events::class)->find($id);

    if (!$event) {
      $this->addFlash('error', 'Événement introuvable.');
      return $this->redirectToRoute('app_event_list');
    }

    if ($event->getImage()) {
      $imagePath = $this->getParameter('kernel.project_dir') . '/public/' . $event->getImage();
      if (file_exists($imagePath)) {
        unlink($imagePath);
      }
    }

    $entityManager->remove($event);
    $entityManager->flush();

    $this->addFlash('success', 'Événement supprimé avec succès !');

    return $this->redirectToRoute('app_event_list');
  }
}
