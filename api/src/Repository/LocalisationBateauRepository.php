<?php

namespace App\Repository;

use App\Entity\LocalisationBateau;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LocalisationBateau|null find($id, $lockMode = null, $lockVersion = null)
 * @method LocalisationBateau|null findOneBy(array $criteria, array $orderBy = null)
 * @method LocalisationBateau[]    findAll()
 * @method LocalisationBateau[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LocalisationBateauRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LocalisationBateau::class);
    }

    // /**
    //  * @return LocalisationBateau[] Returns an array of LocalisationBateau objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LocalisationBateau
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
