<?php

namespace App\Repository;

use App\Domain\InformationsBateaux;
use App\Domain\TemoignageBateaux;
use App\Entity\Bateau;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use phpDocumentor\Reflection\Types\Iterable_;

/**
 * @method Bateau|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bateau|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bateau[]    findAll()
 * @method Bateau[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BateauRepository extends ServiceEntityRepository implements InformationsBateaux,TemoignageBateaux
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bateau::class);
    }

    public function getBateauById($value) : iterable
    {
        $query = $this->createQueryBuilder('b')
            ->select("b.id","b.nom","b.type","b.prixAchat","b.materiau","b.longueur","b.largeur","b.poids","b.capacitePersonne")
            ->andWhere('b.nom = :val')
            ->setParameter('val', $value)
            ->orderBy('b.nom', 'ASC')
            ->getQuery();
        return $query->getResult();
    }


    public function getTemoignageAudioEtTexteById($value)  : iterable
    {
        $query = $this->createQueryBuilder('b')
            ->select("b.temoignageAudio","b.temoignageTexte")
            ->andWhere('b.nom = :val')
            ->setParameter('val', $value)
            ->orderBy('b.nom', 'ASC')
            ->getQuery();
        return $query->getResult();
    }

    // /**
    //  * @return Bateau[] Returns an array of Bateau objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Bateau
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
