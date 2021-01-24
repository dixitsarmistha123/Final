<?php

namespace App\Repository;

use App\Entity\ManagedBy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ManagedBy|null find($id, $lockMode = null, $lockVersion = null)
 * @method ManagedBy|null findOneBy(array $criteria, array $orderBy = null)
 * @method ManagedBy[]    findAll()
 * @method ManagedBy[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ManagedByRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ManagedBy::class);
    }

    // /**
    //  * @return ManagedBy[] Returns an array of ManagedBy objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ManagedBy
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
