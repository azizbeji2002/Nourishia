<?php

namespace App\Repository;

use App\Entity\QuestionnaireResponse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<QuestionnaireResponse>
 */
class QuestionnaireResponseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, QuestionnaireResponse::class);
    }

    public function save(QuestionnaireResponse $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(QuestionnaireResponse $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
    
    /**
     * Find responses awaiting review (completed but not processed)
     */
    public function findPendingResponses(): array
    {
        return $this->createQueryBuilder('qr')
            ->where('qr.status = :status')
            ->setParameter('status', 'completed')
            ->orderBy('qr.submittedAt', 'DESC')
            ->getQuery()
            ->getResult();
    }
}