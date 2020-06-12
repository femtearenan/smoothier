<?php

namespace App\Repository;

use App\Entity\Smoothie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Smoothie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Smoothie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Smoothie[]    findAll()
 * @method Smoothie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SmoothieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Smoothie::class);
    }

    // /**
    //  * @return Smoothie[] Returns an array of Smoothie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Smoothie
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
