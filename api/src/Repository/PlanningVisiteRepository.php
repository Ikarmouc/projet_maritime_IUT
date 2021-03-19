<?php

namespace App\Repository;

use App\Entity\PlanningVisite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PlanningVisite|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlanningVisite|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlanningVisite[]    findAll()
 * @method PlanningVisite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlanningVisiteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlanningVisite::class);
    }

    // /**
    //  * @return PlanningVisite[] Returns an array of PlanningVisite objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PlanningVisite
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
