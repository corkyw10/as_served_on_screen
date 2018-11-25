<?php

namespace App\Repository;

use App\Entity\FilmRatings;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method FilmRatings|null find($id, $lockMode = null, $lockVersion = null)
 * @method FilmRatings|null findOneBy(array $criteria, array $orderBy = null)
 * @method FilmRatings[]    findAll()
 * @method FilmRatings[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FilmRatingsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, FilmRatings::class);
    }

    // /**
    //  * @return FilmRatings[] Returns an array of FilmRatings objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FilmRatings
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
