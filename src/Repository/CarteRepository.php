<?php

namespace App\Repository;

use App\Entity\Carte;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Carte|null find($id, $lockMode = null, $lockVersion = null)
 * @method Carte|null findOneBy(array $criteria, array $orderBy = null)
 * @method Carte[]    findAll()
 * @method Carte[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Carte::class);
    }

    // /**
    //  * @return Carte[] Returns an array of Carte objects
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
    public function findOneBySomeField($value): ?Carte
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findTenCarte()
    {
        return $this->createQueryBuilder('c')
            ->setMaxResults(10)
            ->groupBy('c.valeur', 'c.couleur')
            ;
    }
    /**
    //  * @return Carte[] Returns an array of Carte objects
    //  */
    public function findTenNonSortedCarte():array
    {
        return $this->findTenCarte()
            ->getQuery()
            ->getResult()
        ;
    }

    /**
    //  * @return Carte[] Returns an array of Carte objects
    //  */
    public function findTenSortedCarte():array
    {
          return $this->findTenCarte()
            ->addOrderBy('c.couleur','ASC')
            ->addOrderBy('c.valeur','ASC')
            ->getQuery()
            ->getResult()
            ;
    }
    private function  sortCarte(QueryBuilder $qb)
    {
        return $qb->addOrderBy('c.couleur','ASC')
            ->addOrderBy('c.valeur','ASC');
    }
}
