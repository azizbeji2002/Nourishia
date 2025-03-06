<?php

namespace App\Repository;

use App\Entity\Consultation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Consultation>
 */
class ConsultationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Consultation::class);
    }

//    /**
//     * @return Consultation[] Returns an array of Consultation objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Consultation
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

public function searchConsultations(string $searchTerm, string $sortField, string $sortOrder): \Doctrine\ORM\QueryBuilder
{
    $qb = $this->createQueryBuilder('c')
        // Searching by statut
        ->leftJoin('c.statut', 's')
        // Searching by conseils
        ->orWhere('c.conseils LIKE :searchTerm')
        // Searching by poids
        ->orWhere('c.poids LIKE :searchTerm')
        // Searching by tension
        ->orWhere('c.tension LIKE :searchTerm')
        // Searching by statut (assumed to be a string or some property of the Statut enum)
        ->orWhere('s.value LIKE :searchTerm')
       
        ->setParameter('searchTerm', '%' . $searchTerm . '%');

    // Sorting
    if (in_array($sortField, ['date_consultation', 'tension', 'statut'])) {
        $qb->orderBy('c.' . $sortField, $sortOrder);
    }

    return $qb;
}



}
