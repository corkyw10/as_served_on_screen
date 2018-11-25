<?php

namespace App\Repository;

use App\Entity\TvShows;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TvShows|null find($id, $lockMode = null, $lockVersion = null)
 * @method TvShows|null findOneBy(array $criteria, array $orderBy = null)
 * @method TvShows[]    findAll()
 * @method TvShows[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TvShowsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TvShows::class);
    }

    // /**
    //  * @return TvShows[] Returns an array of TvShows objects
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
    public function findOneBySomeField($value): ?TvShows
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
