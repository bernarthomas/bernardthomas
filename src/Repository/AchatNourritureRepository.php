<?php

namespace App\Repository;

use App\Entity\AchatNourriture;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use \DateTime;

/**
 * @method AchatNourriture|null find($id, $lockMode = null, $lockVersion = null)
 * @method AchatNourriture|null findOneBy(array $criteria, array $orderBy = null)
 * @method AchatNourriture[]    findAll()
 * @method AchatNourriture[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AchatNourritureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AchatNourriture::class);
    }

    // /**
    //  * @return AchatNourriture[] Returns an array of AchatNourriture objects
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
    public function findOneBySomeField($value): ?AchatNourriture
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function findLastDate()
    {
        $connection = $this->getEntityManager()->getConnection();
        $sql = <<<SQL
                SELECT date FROM achat_nourriture WHERE id = (SELECT MAX(id) FROM achat_nourriture);
SQL;
        $statement = $connection->prepare($sql);
        $statement->execute();
        $resultat = $statement->fetch();

        return new DateTime(reset($resultat));

    }
}
