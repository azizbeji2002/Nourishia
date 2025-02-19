<?php

namespace App\Repository;

use App\Entity\PlanNutritionnels;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PlanNutritionnels>
 *
 * @method PlanNutritionnels|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlanNutritionnels|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlanNutritionnels[]    findAll()
 * @method PlanNutritionnels[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlanNutritionnelsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlanNutritionnels::class);
    }

//    /**
//     * @return PlanNutritionnels[] Returns an array of PlanNutritionnels objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PlanNutritionnels
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
