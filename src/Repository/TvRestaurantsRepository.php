<?php

namespace App\Repository;

use App\Entity\TvRestaurants;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TvRestaurants|null find($id, $lockMode = null, $lockVersion = null)
 * @method TvRestaurants|null findOneBy(array $criteria, array $orderBy = null)
 * @method TvRestaurants[]    findAll()
 * @method TvRestaurants[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TvRestaurantsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TvRestaurants::class);
    }

    /**
     * @param $episodeId
     * @return TvRestaurants []
     */
    public function getRestaurantsAlphabetically($episodeId) {
        return $this->createQueryBuilder('q')
            ->where('q.episode = :episode')
            ->setParameter('episode', $episodeId)
            ->orderBy('q.name', 'ASC')
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return TvRestaurants[] Returns an array of TvRestaurants objects
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
    public function findOneBySomeField($value): ?TvRestaurants
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
