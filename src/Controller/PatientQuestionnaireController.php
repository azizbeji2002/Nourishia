<?php

namespace App\Controller;

use App\Entity\Patient;
use App\Entity\Questionnaire;
use App\Entity\QuestionnaireResponse;
use App\Form\QuestionnaireResponseType;
use App\Repository\QuestionnaireRepository;
use App\Repository\PatientRepository;
use App\Repository\QuestionnaireResponseRepository;
use App\Service\GmailMailer;
use App\Form\AssignPlanWithQuestionnaireType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Dompdf\Dompdf;
use Dompdf\Options;

#[Route('/patient/questionnaire')]
class PatientQuestionnaireController extends AbstractController
{    #[Route('/{id}/assign', name: 'app_patient_assign_questionnaire', methods: ['GET', 'POST'])]
    public function assignQuestionnaire(
        int $id,
        Request $request, 
        PatientRepository $patientRepository,
        QuestionnaireRepository $questionnaireRepository,
        EntityManagerInterface $entityManager,
        GmailMailer $mailer
    ): Response {
        // Find the patient by ID
        $patient = $patientRepository->find($id);
        if (!$patient) {
            throw $this->createNotFoundException('Patient not found.');
        }
        
        // Get all available questionnaires
        $questionnaires = $questionnaireRepository->findAll();
        
        if ($request->isMethod('POST')) {
            $questionnaireId = $request->request->get('questionnaire');
            $questionnaire = $questionnaireRepository->find($questionnaireId);
            
            if (!$questionnaire) {
                $this->addFlash('error', 'Questionnaire not found.');
                return $this->redirectToRoute('app_patient_assign_questionnaire', ['id' => $patient->getId()]);
            }
            
            // Create a response object
            $response = new QuestionnaireResponse();
            $response->setPatient($patient);
            $response->setQuestionnaire($questionnaire);
            $response->setStatus('pending');
            
            $entityManager->persist($response);
            $entityManager->flush();
            
            // Send email to patient with a link to fill the questionnaire
            $this->sendQuestionnaireEmail($patient, $questionnaire, $response, $mailer);
            
            $this->addFlash('success', 'Questionnaire sent to the patient successfully.');
            return $this->redirectToRoute('patient_index', ['id' => $patient->getIdPatient()]);
        }
        
        return $this->render('patient_questionnaire/assign.html.twig', [
            'patient' => $patient,
            'questionnaires' => $questionnaires,
        ]);
    }
    #[Route('/response/{id}', name: 'app_patient_fill_questionnaire', methods: ['GET', 'POST'])]
    public function fillQuestionnaire(
        int $id,
        Request $request, 
        QuestionnaireResponseRepository $responseRepository,
        EntityManagerInterface $entityManager
    ): Response {
        // Find the response by ID
        $response = $responseRepository->find($id);
        if (!$response) {
            throw $this->createNotFoundException('Response not found.');
        }
        
        // Check if already submitted
        if ($response->getStatus() === 'completed') {
            return $this->render('patient_questionnaire/already_submitted.html.twig', [
                'response' => $response
            ]);
        }
        
        $questionnaire = $response->getQuestionnaire();
        
        $form = $this->createForm(QuestionnaireResponseType::class, null, [
            'questionnaire' => $questionnaire
        ]);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $answers = [];
            
            // Process form data
            foreach ($questionnaire->getQuestions() as $question) {
                $fieldName = 'question_' . $question->getId();
                
                if ($form->has($fieldName)) {
                    $answers[$question->getId()] = [
                        'question' => $question->getText(),
                        'answer' => $form->get($fieldName)->getData()
                    ];
                }
            }
            
            $response->setAnswers($answers);
            $response->setStatus('completed');
            $response->setSubmittedAt(new \DateTimeImmutable());
            
            $entityManager->flush();
            
            return $this->render('patient_questionnaire/thank_you.html.twig', [
                'response' => $response
            ]);
        }
        
        return $this->render('patient_questionnaire/fill.html.twig', [
            'response' => $response,
            'questionnaire' => $questionnaire,
            'form' => $form->createView(),
        ]);
    }

    private function sendQuestionnaireEmail(
        Patient $patient, 
        Questionnaire $questionnaire, 
        QuestionnaireResponse $response, 
        GmailMailer $mailer
    ): void {
        if (!$patient->getEmail()) {
            return;
        }
        
        $link = $this->generateUrl(
            'app_patient_fill_questionnaire',
            ['id' => $response->getId()],
            \Symfony\Component\Routing\Generator\UrlGeneratorInterface::ABSOLUTE_URL
        );
        
        $htmlContent = $this->renderView('emails/questionnaire_invitation.html.twig', [
            'patient' => $patient,
            'questionnaire' => $questionnaire,
            'link' => $link
        ]);
        
        $textContent = strip_tags(str_replace('<br>', "\n", $htmlContent));
        
        $mailer->sendEmail(
            $patient->getEmail(),
            'Please Complete Your Health Questionnaire',
            $htmlContent,
            $textContent,
            $patient->getName()
        );
    }
    #[Route('/responses/{id}/review', name: 'app_doctor_review_response', methods: ['GET', 'POST'])]
    public function reviewResponse(
        int $id,
        Request $request, 
        QuestionnaireResponseRepository $responseRepository,
        EntityManagerInterface $entityManager,
        GmailMailer $mailer
    ): Response {
        // Find the response by ID
        $response = $responseRepository->find($id);
        if (!$response) {
            throw $this->createNotFoundException('Response not found.');
        }

        // Check if the response is completed
        if ($response->getStatus() !== 'completed') {
            $this->addFlash('warning', 'The patient has not completed the questionnaire yet.');
            return $this->redirectToRoute('patient_index', ['id' => $response->getPatient()->getIdPatient()]);
        }
        
        $form = $this->createForm(AssignPlanWithQuestionnaireType::class, $response);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            // Update the patient's plan
            $patient = $response->getPatient();
            $plan = $response->getAssignedPlan();
            
            if ($plan) {
                $patient->setPlan($plan);
                $response->setStatus('processed');
                
                // Send notification email to patient with PDF attachment
                $this->sendPlanAssignmentEmail($patient, $plan, $response, $mailer);
                
                $this->addFlash('success', 'Nutritional plan assigned based on questionnaire responses.');
            } else {
                $this->addFlash('warning', 'No plan was selected.');
            }
            
            $entityManager->flush();
            
            return $this->redirectToRoute('patient_index', ['id' => $patient->getIdPatient()]);
        }
        
        return $this->render('patient_questionnaire/review.html.twig', [
            'response' => $response,
            'patient' => $response->getPatient(),
            'questionnaire' => $response->getQuestionnaire(),
            'form' => $form->createView(),
        ]);
    }

    private function sendPlanAssignmentEmail($patient, $plan, $response, $mailer)
    {
        // Generate PDF
        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $dompdf = new Dompdf($options);

        $html = $this->renderView('pdf/plan_assignment.html.twig', [
            'patient' => $patient,
            'plan' => $plan,
            'response' => $response,
        ]);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $output = $dompdf->output();
        $pdfFilePath = sys_get_temp_dir() . '/plan_assignment_' . $patient->getIdPatient() . '.pdf';
        file_put_contents($pdfFilePath, $output);

        // Email content
        $htmlContent = $this->renderView('emails/plan_assignment.html.twig', [
            'patient' => $patient,
            'plan' => $plan,
            'response' => $response,
        ]);

        // Send email
        $mailer->sendEmail(
            $patient->getEmail(),
            'Your Nutritional Plan Assignment',
            $htmlContent,
            $pdfFilePath,
            $patient->getName()
        );

        // Remove the temporary PDF file
        unlink($pdfFilePath);
    }

    #[Route('/responses', name: 'app_questionnaire_responses', methods: ['GET'])]
    public function listResponses(QuestionnaireResponseRepository $responseRepository): Response
    {
        $responses = $responseRepository->findBy(
            [], 
            ['submittedAt' => 'DESC']
        );
        
        $pendingCount = count(array_filter($responses, function($response) {
            return $response->getStatus() === 'completed';
        }));
        
        return $this->render('patient_questionnaire/responses.html.twig', [
            'responses' => $responses,
            'pendingCount' => $pendingCount
        ]);
    }

    #[Route('/response/{id}/resend', name: 'app_patient_resend_questionnaire')]
    public function resendQuestionnaire(
        QuestionnaireResponse $response, 
        GmailMailer $mailer,
        EntityManagerInterface $entityManager
    ): Response {
        $patient = $response->getPatient();
        $questionnaire = $response->getQuestionnaire();
        
        $this->sendQuestionnaireEmail($patient, $questionnaire, $response, $mailer);
        
        $this->addFlash('success', 'Questionnaire invitation has been resent to the patient.');
        
        return $this->redirectToRoute('patient_index', ['id' => $patient->getIdPatient()]);
    }
   
   
      }
