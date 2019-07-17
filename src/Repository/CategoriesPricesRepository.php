<?php

namespace App\Repository;

use App\Entity\CategoriesPrices;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CategoriesPrices|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategoriesPrices|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoriesPrices[]    findAll()
 * @method CategoriesPrices[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoriesPricesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CategoriesPrices::class);
    }

    // /**
    //  * @return CategoriesPrices[] Returns an array of CategoriesPrices objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CategoriesPrices
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
