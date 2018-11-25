<?php

namespace App\Repository;

use App\Entity\TvPeople;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TvPeople|null find($id, $lockMode = null, $lockVersion = null)
 * @method TvPeople|null findOneBy(array $criteria, array $orderBy = null)
 * @method TvPeople[]    findAll()
 * @method TvPeople[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TvPeopleRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TvPeople::class);
    }

    // /**
    //  * @return TvPeople[] Returns an array of TvPeople objects
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
    public function findOneBySomeField($value): ?TvPeople
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
