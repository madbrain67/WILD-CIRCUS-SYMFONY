<?php

namespace App\Repository;

use App\Entity\Cart;
use App\Entity\User;
use App\Entity\Prices;
use App\Entity\GroupsPrices;
use App\Entity\CategoriesPrices;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Cart|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cart|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cart[]    findAll()
 * @method Cart[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CartRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Cart::class);
    }

    public function findByCart($id)
    {
        return $this->createQueryBuilder('C')
            ->select('C.id AS id_cart, C.qt, CAT.name, G.groups, P.price')
            ->leftJoin(CategoriesPrices::class, 'CAT', 'WITH', 'C.categorie = CAT.id')
            ->leftJoin(GroupsPrices::class, 'G', 'WITH', 'C.groups = G.id')
            ->leftJoin(Prices::class, 'P', 'WITH', 'P.categorie = C.categorie AND P.groups = C.groups')
            ->where('C.user = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return Cart[] Returns an array of Cart objects
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
    public function findOneBySomeField($value): ?Cart
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
