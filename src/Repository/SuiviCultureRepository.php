<?php

namespace App\Repository;

use App\Entity\SuiviCulture;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SuiviCulture|null find($id, $lockMode = null, $lockVersion = null)
 * @method SuiviCulture|null findOneBy(array $criteria, array $orderBy = null)
 * @method SuiviCulture[]    findAll()
 * @method SuiviCulture[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SuiviCultureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SuiviCulture::class);
    }

    // /**
    //  * @return SuiviCulture[] Returns an array of SuiviCulture objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SuiviCulture
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
