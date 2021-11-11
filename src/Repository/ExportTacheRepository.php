<?php

namespace App\Repository;

use App\Entity\ExportTache;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ExportTache|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExportTache|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExportTache[]    findAll()
 * @method ExportTache[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExportTacheRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExportTache::class);
    }

    // /**
    //  * @return ExportTache[] Returns an array of ExportTache objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ExportTache
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function insertMultiple(array $parametres)
    {
        $connection = $this->getEntityManager()->getConnection();
        $sql = <<<SQL
            INSERT INTO export_tache (actif, affectation, charge, code, fin, projets, taches) 
            SELECT
                    TRUE,
                    tg.libelle, --affectation
                    ROUND(SUM(STRFTIME('%s', t.heure_fin) - STRFTIME('%s', t.heure_debut))/3600.00, 2), --charge
                    :code,
                    STRFTIME('%d/%m/%Y', MAX(t.date)), --date fin 
                    GROUP_CONCAT(DISTINCT p.libelle), -- projets
                    a.libelle || ' ' || GROUP_CONCAT(DISTINCT t.libelle)-- taches     
            FROM tache t
                     JOIN tache_projet tp ON tp.tache_id = t.id
                     JOIN projet p ON p.id = tp.projet_id
                     JOIN tache_type tg ON tg.id = t.type_id
                     JOIN tache_activite ta ON ta.tache_id = t.id
                     JOIN activite a ON ta.activite_id = a.id
            WHERE t.date BETWEEN :debut AND :fin
            GROUP BY a.libelle
            ORDER BY p.libelle ASC, a.libelle || ' ' || t.libelle ASC

SQL;
        $statement = $connection->prepare($sql);

        return $statement->execute($parametres);


//        $resultat = $statement->fetchAll();
//
//        return $resultat;

    }
}
