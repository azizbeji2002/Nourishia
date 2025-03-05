<?php

namespace App\Service;

use App\Repository\QuestionnaireResponseRepository;
use Symfony\Component\Security\Core\Security;

class QuestionnaireService
{
    private $responseRepository;
    private $security;
    
    public function __construct(QuestionnaireResponseRepository $responseRepository, Security $security)
    {
        $this->responseRepository = $responseRepository;
        $this->security = $security;
    }
    
    /**
     * Count pending questionnaire responses that need review
     */
    public function countPendingResponses(): int
    {
        // Only doctors should see pending responses
        if (!$this->security->isGranted('ROLE_DOCTOR')) {
            return 0;
        }
        
        return $this->responseRepository->count([
            'status' => 'completed'
        ]);
    }
    
    /**
     * Get questionnaire template recommendations based on patient data
     */
    public function getRecommendedQuestionnaires($patient): array
    {
        // Logic to recommend questionnaires based on patient demographics, conditions, etc.
        // This could be expanded based on your specific needs
        
        return [];
    }
}