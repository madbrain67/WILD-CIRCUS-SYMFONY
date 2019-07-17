<?php

namespace App\Repository;

use App\Entity\Prices;
use App\Entity\GroupsPrices;
use App\Entity\CategoriesPrices;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Prices|null find($id, $lockMode = null, $lockVersion = null)
 * @method Prices|null findOneBy(array $criteria, array $orderBy = null)
 * @method Prices[]    findAll()
 * @method Prices[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PricesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Prices::class);
    }

    public function findByTableau()
    {
        return $this->createQueryBuilder('P')
            ->select('P.id, P.price, C.name, G.groups')
            ->leftJoin(CategoriesPrices::class, 'C', 'WITH', 'P.categorie = C.id')
            ->leftJoin(GroupsPrices::class, 'G', 'WITH', 'P.groups = G.id')
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return Prices[] Returns an array of Prices objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Prices
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
