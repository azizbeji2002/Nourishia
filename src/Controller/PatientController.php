<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Patient;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use App\Service\SimpleMailer;
use App\Service\GmailMailer;
use App\Form\PatientType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\PlanNutritionnels;
use Psr\Log\LoggerInterface;
use App\Repository\PlanNutritionnelsRepository;
use App\Repository\PatientRepository;
use App\Entity\QuestionnaireResponse;
use App\Repository\QuestionnaireResponseRepository;
// Add these imports
use App\Entity\Questionnaire;
use App\Repository\QuestionnaireRepository;
class PatientController extends AbstractController
{
    
   


    #[Route('/patients', name: 'patient_index')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        // Fetch all patients from the database
        $patients = $entityManager->getRepository(Patient::class)->findAll();

        // Render the view and pass the list of patients to it
        return $this->render('patient/index.html.twig', [
            'patients' => $patients,
        ]);
    }



  
  
    // Update your assignPlanToPatient method
#[Route('/{id}/assign-plan', name: 'assign_plan_to_patient')]
public function assignPlanToPatient(
    int $id,
    Request $request,
    PatientRepository $patientRepository,
    PlanNutritionnelsRepository $planRepository,
    QuestionnaireRepository $questionnaireRepository,
    EntityManagerInterface $entityManager,
    GmailMailer $mailer
): Response {
    // Find the patient by ID
    $patient = $patientRepository->find($id);
    if (!$patient) {
        throw $this->createNotFoundException('Patient not found.');
    }
    
    // Get available questionnaires (for direct plan assignment or questionnaire option)
    $questionnaires = $questionnaireRepository->findAll();

    // Create the form for assigning a plan
    $form = $this->createForm(PatientType::class, $patient);
    
    // Handle form submission
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        // Check if user wants to send a questionnaire first
        $sendQuestionnaire = $request->request->get('send_questionnaire', false);
        $questionnaireId = $request->request->get('questionnaire');

        if ($sendQuestionnaire && $questionnaireId) {
            // Redirect to questionnaire assignment with selected plan info
            $planId = $form->get('plan')->getData() ? $form->get('plan')->getData()->getId() : null;
            
            return $this->redirectToRoute('app_patient_assign_questionnaire', [
                'id' => $patient->getId(),
                'plan' => $planId
            ]);
        }

        // Get selected plan (should be an entity, not an ID)
        $selectedPlan = $form->get('plan')->getData();

        if (!$selectedPlan instanceof \App\Entity\PlanNutritionnels) {
            $this->addFlash('error', 'Invalid plan selection.');
            return $this->redirectToRoute('patient_index');
        }

        // Assign the plan to the patient
        $patient->setPlan($selectedPlan);

        // Save changes
        $entityManager->persist($patient);
        $entityManager->flush();

        // Send email notification to patient
        if ($patient->getEmail()) {
            $htmlContent = $this->renderView('emails/plan_assignment.html.twig', [
                'patient' => $patient,
                'plan' => $selectedPlan,
                'date' => new \DateTime()
            ]);
            
            $success = $mailer->sendEmail(
                $patient->getEmail(),
                'Your Nutritional Plan Has Been Assigned',
                $htmlContent,
                null,
                $patient->getName() . ' ' . $patient->getEmail()
            );
            
            if ($success) {
                $this->addFlash('success', 'Plan assigned successfully and notification email sent.');
            } else {
                $this->addFlash('warning', 'Plan assigned successfully but notification email failed.');
            }
        } else {
            $this->addFlash('success', 'Plan assigned successfully.');
        }
           
        return $this->redirectToRoute('patient_index');
    }
    
    // Render the form in the view
    return $this->render('patient/assign_plan.html.twig', [
        'form' => $form->createView(),
        'patient' => $patient,
        'questionnaires' => $questionnaires
    ]);
}
#[Route('/{id}/assign', name: 'app_patient_assign_questionnaire', methods: ['GET', 'POST'])]
// Remove or adjust IsGranted
public function assignQuestionnaire(
    Patient $patient, 
    Request $request, 
    QuestionnaireRepository $questionnaireRepository,
    EntityManagerInterface $entityManager,
    GmailMailer $mailer
): Response {
    // Get all available questionnaires
    $questionnaires = $questionnaireRepository->findAll();
    
    if ($request->isMethod('POST')) {
        $questionnaireId = $request->request->get('questionnaire');
        $questionnaire = $questionnaireRepository->find($questionnaireId);
        
        if (!$questionnaire) {
            $this->addFlash('error', 'Questionnaire not found.');
            return $this->redirectToRoute('app_patient_assign_questionnaire', ['id' => $patient->getIdPatient()]);
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
        return $this->redirectToRoute('patient_show', ['id' => $patient->getIdPatient()]);
    }
    
    return $this->render('patient_questionnaire/assign.html.twig', [
        'patient' => $patient,
        'questionnaires' => $questionnaires,
    ]);
}

// Rest of the controller methods...
// Make sure to update any references to patient->getId() to patient->getIdPatient()

/**
 * Send an email to the patient with a link to fill the questionnaire
 */
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
        $patient->getName() // Changed from firstName + lastName to match your entity
    );
}
/**
* Send an email to the patient about their assigned plan based on questionnaire
*/
private function sendPlanAssignmentEmail(
Patient $patient, 
$plan, 
QuestionnaireResponse $response, 
GmailMailer $mailer
): void {
if (!$patient->getEmail()) {
    return;
}

$htmlContent = $this->renderView('emails/plan_assignment_questionnaire.html.twig', [
    'patient' => $patient,
    'plan' => $plan,
    'response' => $response,
    'doctorNotes' => $response->getDoctorNotes()
]);

$textContent = strip_tags(str_replace('<br>', "\n", $htmlContent));

$mailer->sendEmail(
    $patient->getEmail(),
    'Your Personalized Nutrition Plan',
    $htmlContent,
    $textContent,
    $patient->getName() // Changed to match your entity structure
);
}
// Update the listResponses method

#[Route('/responses', name: 'app_questionnaire_responses', methods: ['GET'])]
public function listResponses(QuestionnaireResponseRepository $responseRepository): Response
{
$responses = $responseRepository->findBy(
    [],  // no criteria to get all responses
    ['submittedAt' => 'DESC']
);

// Count pending responses
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

// Send email to patient with a link to fill the questionnaire
$this->sendQuestionnaireEmail($patient, $questionnaire, $response, $mailer);

$this->addFlash('success', 'Questionnaire invitation has been resent to the patient.');

return $this->redirectToRoute('patient_show', ['id' => $patient->getIdPatient()]);
}

    /**
     * Send email notification when a plan is assigned to a patient
     */
    // private function sendPlanAssignmentEmail($patient, $plan, $mailer): bool
    // {
    //     // Get patient email
    //     $patientEmail = $patient->getEmail();
        
    //     // If no email is available, we can't send the notification
    //     if (!$patientEmail) {
    //         return false;
    //     }
        
    //     // Set email subject
    //     $subject = 'Your Nutritional Plan Has Been Assigned';
        
    //     // Create HTML content
    //     $htmlContent = $this->renderView('emails/plan_assignment.html.twig', [
    //         'patient' => $patient,
    //         'plan' => $plan,
    //         'date' => new \DateTime()
    //     ]);
        
    //     // Create plain text content
    //     $textContent = strip_tags($htmlContent);
        
    //     // Send the email
    //     return $mailer->sendEmail(
    //         $patientEmail,
    //         $subject,
    //         $htmlContent,
    //         $textContent,
    //         $patient->getName() // Assuming there's a getFullName method, otherwise use appropriate method
    //     );
    // }
}