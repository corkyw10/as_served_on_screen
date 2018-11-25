<?php

namespace App\Repository;

use App\Entity\TvRatings;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TvRatings|null find($id, $lockMode = null, $lockVersion = null)
 * @method TvRatings|null findOneBy(array $criteria, array $orderBy = null)
 * @method TvRatings[]    findAll()
 * @method TvRatings[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TvRatingsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TvRatings::class);
    }

    // /**
    //  * @return TvRatings[] Returns an array of TvRatings objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TvRatings
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
