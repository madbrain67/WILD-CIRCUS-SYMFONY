<?php

namespace App\Repository;

use App\Entity\GroupsPrices;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method GroupsPrices|null find($id, $lockMode = null, $lockVersion = null)
 * @method GroupsPrices|null findOneBy(array $criteria, array $orderBy = null)
 * @method GroupsPrices[]    findAll()
 * @method GroupsPrices[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GroupsPricesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, GroupsPrices::class);
    }

    // /**
    //  * @return GroupsPrices[] Returns an array of GroupsPrices objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GroupsPrices
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
