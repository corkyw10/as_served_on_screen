<?php

namespace App\Repository;

use App\Entity\FilmRestaurants;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method FilmRestaurants|null find($id, $lockMode = null, $lockVersion = null)
 * @method FilmRestaurants|null findOneBy(array $criteria, array $orderBy = null)
 * @method FilmRestaurants[]    findAll()
 * @method FilmRestaurants[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FilmRestaurantsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, FilmRestaurants::class);
    }

    /**
     * @param $filmId
     * @return FilmRestaurants []
     */
    public function getRestaurantsAlphabetically($filmId) {
        return $this->createQueryBuilder('q')
            ->where('q.film = :film')
            ->setParameter('film', $filmId)
            ->orderBy('q.name', 'ASC')
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return FilmRestaurants[] Returns an array of FilmRestaurants objects
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
    public function findOneBySomeField($value): ?FilmRestaurants
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
