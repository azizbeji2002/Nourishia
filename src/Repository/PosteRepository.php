<?php

namespace App\Repository;

use App\Entity\Poste;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Poste>
 */
class PosteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Poste::class);
    }

    public function findAllWithComments()
    {
        return $this->createQueryBuilder('p')
            ->addSelect('c')
            ->leftJoin('p.commentaires', 'c')
            ->where('p.etat = :etat')
            ->setParameter('etat', true)
            ->orderBy('p.datePublication', 'DESC')
            ->addOrderBy('c.dateCreation', 'ASC')
            ->getQuery()
            ->getResult();
    }
    public function findAllWithEpingle()
{
    return $this->createQueryBuilder('p')
        ->addSelect('c')
        ->leftJoin('p.commentaires', 'c')
        ->where('p.etat = :etat')
        ->setParameter('etat', true)
        ->orderBy('p.epingle', 'DESC')  // Trier d'abord par epingle (true en premier)
        ->addOrderBy('p.datePublication', 'DESC')  // Puis trier par date de publication
        ->addOrderBy('c.dateCreation', 'ASC')  // Et enfin trier par date de création des commentaires
        ->getQuery()
        ->getResult();
}


//    /**
//     * @return Poste[] Returns an array of Poste objects
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

//    public function findOneBySomeField($value): ?Poste
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
