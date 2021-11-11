<?php

namespace App\Repository;

use App\Entity\TacheType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TacheType|null find($id, $lockMode = null, $lockVersion = null)
 * @method TacheType|null findOneBy(array $criteria, array $orderBy = null)
 * @method TacheType[]    findAll()
 * @method TacheType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TacheTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TacheType::class);
    }

    // /**
    //  * @return TacheType[] Returns an array of TacheType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TacheType
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
