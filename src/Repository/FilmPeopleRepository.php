<?php

namespace App\Repository;

use App\Entity\FilmPeople;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method FilmPeople|null find($id, $lockMode = null, $lockVersion = null)
 * @method FilmPeople|null findOneBy(array $criteria, array $orderBy = null)
 * @method FilmPeople[]    findAll()
 * @method FilmPeople[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FilmPeopleRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, FilmPeople::class);
    }

    // /**
    //  * @return FilmPeople[] Returns an array of FilmPeople objects
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
    public function findOneBySomeField($value): ?FilmPeople
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
