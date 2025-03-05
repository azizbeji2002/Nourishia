<?php

namespace App\Repository;

use App\Entity\Patient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class PatientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Patient::class);
    }

    /**
     * Find all patients assigned to a specific PlanNutritionnel.
     *
     * @param int $planId The ID of the PlanNutritionnel
     * @return Patient[] Returns an array of Patient objects
     */
    public function findPatientsByPlan(int $planId)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.plan = :planId')
            ->setParameter('planId', $planId)
            ->getQuery()
            ->getResult();
    }

    /**
     * Find a patient by their email address.
     *
     * @param string $email The email of the patient
     * @return Patient|null Returns a Patient object or null
     */
    public function findOneByEmail(string $email): ?Patient
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.email = :email')
            ->setParameter('email', $email)
            ->getQuery()
            ->getOneOrNullResult();
    }

    // Add other custom query methods as needed
}
