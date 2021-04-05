<?php

namespace App\Repository;

use App\Domain\HistoriqueBateaux;
use App\Entity\HistoireBateau;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use APP\Repository\BateauRepository;

/**
 * @method HistoireBateau|null find($id, $lockMode = null, $lockVersion = null)
 * @method HistoireBateau|null findOneBy(array $criteria, array $orderBy = null)
 * @method HistoireBateau[]    findAll()
 * @method HistoireBateau[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HistoireBateauRepository extends ServiceEntityRepository implements HistoriqueBateaux
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HistoireBateau::class);
    }

    public function getHistoriqueBateauById($value) : iterable
    {

        $query = $this->createQueryBuilder('hB')
            ->select("hB.id","hB.anneeLancement","hB.constructeur","hB.proprietaire","hB.anneeEntreeCollection","hB.dateMonumentHistorique","hB.anneeRestauration","hB.historique")
            ->andWhere('hB.id = :val')
            ->setParameter('val', $value)
            ->orderBy('hB.id', 'ASC')
            ->getQuery();
        return $query->getResult();
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
