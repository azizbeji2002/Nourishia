<?php

namespace App\Controller;

use App\Entity\Questionnaire;
use App\Form\QuestionnaireType;
use App\Repository\QuestionnaireRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// Update or remove IsGranted if you don't use it
class QuestionnaireController extends AbstractController
{
    #[Route('/quest', name: 'app_questionnaire_index', methods: ['GET'])]
    public function index(QuestionnaireRepository $questionnaireRepository): Response
    {
        return $this->render('questionnaire/index.html.twig', [
            'questionnaires' => $questionnaireRepository->findAll(),
        ]);
    }
    #[Route('/new', name: 'app_questionnaire_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $questionnaire = new Questionnaire();
        $questionnaire->setCreatedBy('Chaima Chebbi ');
        
        $form = $this->createForm(QuestionnaireType::class, $questionnaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($questionnaire);
            $entityManager->flush();

            return $this->redirectToRoute('app_questionnaire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('questionnaire/new.html.twig', [
            'questionnaire' => $questionnaire,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/questionnaire/{id}', name: 'app_questionnaire_show', methods: ['GET'])]
    public function show(QuestionnaireRepository $questionnaireRepository, int $id): Response
    {
        $questionnaire = $questionnaireRepository->find($id);

        if (!$questionnaire) {
            throw $this->createNotFoundException('No questionnaire found for id ' . $id);
        }

        return $this->render('questionnaire/show.html.twig', [
            'questionnaire' => $questionnaire,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_questionnaire_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, EntityManagerInterface $entityManager, QuestionnaireRepository $questionnaireRepository, $id): Response
    {
        $questionnaire = $questionnaireRepository->find($id);

        if (!$questionnaire) {
            throw $this->createNotFoundException('No questionnaire found for id ' . $id);
        }

        $form = $this->createForm(QuestionnaireType::class, $questionnaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_questionnaire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('questionnaire/edit.html.twig', [
            'questionnaire' => $questionnaire,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'app_questionnaire_delete', methods: ['POST'])]
    public function delete(Request $request, Questionnaire $questionnaire, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$questionnaire->getId(), $request->request->get('_token'))) {
            $entityManager->remove($questionnaire);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_questionnaire_index', [], Response::HTTP_SEE_OTHER);
    }


    // Rest of the controller methods...
}