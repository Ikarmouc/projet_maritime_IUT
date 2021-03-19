<?php

namespace App\Repository;

use App\Entity\HistoireBateau;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method HistoireBateau|null find($id, $lockMode = null, $lockVersion = null)
 * @method HistoireBateau|null findOneBy(array $criteria, array $orderBy = null)
 * @method HistoireBateau[]    findAll()
 * @method HistoireBateau[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HistoireBateauRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HistoireBateau::class);
    }

    // /**
    //  * @return HistoireBateau[] Returns an array of HistoireBateau objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HistoireBateau
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
