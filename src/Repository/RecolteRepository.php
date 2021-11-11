<?php

namespace App\Repository;

use App\Entity\Culture;
use App\Entity\Recolte;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\DBAL\DBALException;
use \DateTime;
use Doctrine\DBAL\FetchMode;
use Doctrine\DBAL\Driver\Exception as DBALDriverException;

/**
 * @method Recolte|null find($id, $lockMode = null, $lockVersion = null)
 * @method Recolte|null findOneBy(array $criteria, array $orderBy = null)
 * @method Recolte[]    findAll()
 * @method Recolte[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecolteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Recolte::class);
    }

    // /**
    //  * @return Recolte[] Returns an array of Recolte objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Recolte
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    /**
     * @param int $annee
     * @param array $filtre
     *
     * @return array|mixed[]
     *
     * @throws DBALDriverException
     */
    public function findSynthese(int $annee, array $filtre=[])
    {
        try {
            $annee1 = $annee + 1;
            $connection = $this->getEntityManager()->getConnection();
            $whereDate = "WHERE r.date BETWEEN '$annee-01-01 00:00:00' AND '$annee1-01-01 00:00:00'";
            if (!empty($filtre['dateDebut']) && !empty($filtre['dateFin'])) {
                $dateDebut = $filtre['dateDebut']->format('Y-m-d 00:00:00.0');
                $dateFin = $filtre['dateFin']->format('Y-m-d 00:00:00.0');
                $whereDate = "WHERE r.date BETWEEN '$dateDebut' AND '$dateFin'";
            }
            $sql = <<<SQL
                SELECT *
                FROM (
                         SELECT 'valeur (€)', 'total', null, '01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'
                         UNION
                         SELECT  COALESCE((SELECT AVG(prix_paye/poids) FROM achat_nourriture WHERE culture_id = culture__id AND date BETWEEN '$annee-01-01 00:00:00' AND '$annee1-01-01 00:00:00') *
                                PRINTF("%.3f",
                                       COALESCE(SUM(JAN), 0) +
                                       COALESCE(SUM(FEV), 0) +
                                       COALESCE(SUM(MAR), 0) +
                                       COALESCE(SUM(AVR), 0) +
                                       COALESCE(SUM(MAI), 0) +
                                       COALESCE(SUM(JUIN), 0) +
                                       COALESCE(SUM(JUIL), 0) +
                                       COALESCE(SUM(AOU), 0) +
                                       COALESCE(SUM(SEP), 0) +
                                       COALESCE(SUM(OCT), 0) +
                                       COALESCE(SUM(NOV), 0) +
                                       COALESCE(SUM(DEC), 0)
                                    ), ' ')
                                'valeur',
                                PRINTF("%.3f",
                                       COALESCE(SUM(JAN), 0) +
                                       COALESCE(SUM(FEV), 0) +
                                       COALESCE(SUM(MAR), 0) +
                                       COALESCE(SUM(AVR), 0) +
                                       COALESCE(SUM(MAI), 0) +
                                       COALESCE(SUM(JUIN), 0) +
                                       COALESCE(SUM(JUIL), 0) +
                                       COALESCE(SUM(AOU), 0) +
                                       COALESCE(SUM(SEP), 0) +
                                       COALESCE(SUM(OCT), 0) +
                                       COALESCE(SUM(NOV), 0) +
                                       COALESCE(SUM(DEC), 0)
                                    )                                                                                    total,
                                ' total',
                                CASE PRINTF("%.3f", SUM(JAN)) WHEN '0.000' THEN NULL ELSE PRINTF("%.3f", SUM(JAN)) END   '01',
                                CASE PRINTF("%.3f", SUM(FEV)) WHEN '0.000' THEN NULL ELSE PRINTF("%.3f", SUM(FEV)) END   '02',
                                CASE PRINTF("%.3f", SUM(MAR)) WHEN '0.000' THEN NULL ELSE PRINTF("%.3f", SUM(MAR)) END   '03',
                                CASE PRINTF("%.3f", SUM(AVR)) WHEN '0.000' THEN NULL ELSE PRINTF("%.3f", SUM(AVR)) END   '04',
                                CASE PRINTF("%.3f", SUM(MAI)) WHEN '0.000' THEN NULL ELSE PRINTF("%.3f", SUM(MAI)) END   '05',
                                CASE PRINTF("%.3f", SUM(JUIN)) WHEN '0.000' THEN NULL ELSE PRINTF("%.3f", SUM(JUIN)) END '06',
                                CASE PRINTF("%.3f", SUM(JUIL)) WHEN '0.000' THEN NULL ELSE PRINTF("%.3f", SUM(JUIL)) END '07',
                                CASE PRINTF("%.3f", SUM(AOU)) WHEN '0.000' THEN NULL ELSE PRINTF("%.3f", SUM(AOU)) END   '08',
                                CASE PRINTF("%.3f", SUM(SEP)) WHEN '0.000' THEN NULL ELSE PRINTF("%.3f", SUM(SEP)) END   '09',
                                CASE PRINTF("%.3f", SUM(OCT)) WHEN '0.000' THEN NULL ELSE PRINTF("%.3f", SUM(OCT)) END   '10',
                                CASE PRINTF("%.3f", SUM(NOV)) WHEN '0.000' THEN NULL ELSE PRINTF("%.3f", SUM(NOV)) END   '11',
                                CASE PRINTF("%.3f", SUM(DEC)) WHEN '0.000' THEN NULL ELSE PRINTF("%.3f", SUM(DEC)) END   '12'
                         FROM (
                                  SELECT culture__id,
                                         0,
                                         culture,
                                         CASE mois WHEN '01' THEN poids END 'JAN',
                                         CASE mois WHEN '02' THEN poids END 'FEV',
                                         CASE mois WHEN '03' THEN poids END 'MAR',
                                         CASE mois WHEN '04' THEN poids END 'AVR',
                                         CASE mois WHEN '05' THEN poids END 'MAI',
                                         CASE mois WHEN '06' THEN poids END 'JUIN',
                                         CASE mois WHEN '07' THEN poids END 'JUIL',
                                         CASE mois WHEN '08' THEN poids END 'AOU',
                                         CASE mois WHEN '09' THEN poids END 'SEP',
                                         CASE mois WHEN '10' THEN poids END 'OCT',
                                         CASE mois WHEN '11' THEN poids END 'NOV',
                                         CASE mois WHEN '12' THEN poids END 'DEC'
                                  FROM (
                                           SELECT c.id culture__id, 0, null culture, strftime('%m', r.date) mois, SUM(r.poids) poids
                                           FROM recolte r
                                                    JOIN culture c ON r.culture_id = c.id
                                           $whereDate
                                             AND r.actif = TRUE
                                             AND c.actif = TRUE
                                           GROUP BY strftime('%m', r.date)
                                       )
                              )
                         GROUP BY culture
                         UNION
                         SELECT  COALESCE((SELECT AVG(prix_paye/poids) FROM achat_nourriture WHERE culture_id = culture__id AND date BETWEEN '$annee-01-01 00:00:00' AND '$annee1-01-01 00:00:00') *
                                PRINTF("%.3f",
                                       COALESCE(SUM(JAN), 0) +
                                       COALESCE(SUM(FEV), 0) +
                                       COALESCE(SUM(MAR), 0) +
                                       COALESCE(SUM(AVR), 0) +
                                       COALESCE(SUM(MAI), 0) +
                                       COALESCE(SUM(JUIN), 0) +
                                       COALESCE(SUM(JUIL), 0) +
                                       COALESCE(SUM(AOU), 0) +
                                       COALESCE(SUM(SEP), 0) +
                                       COALESCE(SUM(OCT), 0) +
                                       COALESCE(SUM(NOV), 0) +
                                       COALESCE(SUM(DEC), 0)
                                    ), ' ') ,
                                PRINTF("%.3f",
                                       COALESCE(SUM(JAN), 0) +
                                       COALESCE(SUM(FEV), 0) +
                                       COALESCE(SUM(MAR), 0) +
                                       COALESCE(SUM(AVR), 0) +
                                       COALESCE(SUM(MAI), 0) +
                                       COALESCE(SUM(JUIN), 0) +
                                       COALESCE(SUM(JUIL), 0) +
                                       COALESCE(SUM(AOU), 0) +
                                       COALESCE(SUM(SEP), 0) +
                                       COALESCE(SUM(OCT), 0) +
                                       COALESCE(SUM(NOV), 0) +
                                       COALESCE(SUM(DEC), 0)
                                    )                                                                                    total,
                                culture,
                                CASE PRINTF("%.3f", SUM(JAN)) WHEN '0.000' THEN NULL ELSE PRINTF("%.3f", SUM(JAN)) END   '01',
                                CASE PRINTF("%.3f", SUM(FEV)) WHEN '0.000' THEN NULL ELSE PRINTF("%.3f", SUM(FEV)) END   '02',
                                CASE PRINTF("%.3f", SUM(MAR)) WHEN '0.000' THEN NULL ELSE PRINTF("%.3f", SUM(MAR)) END   '03',
                                CASE PRINTF("%.3f", SUM(AVR)) WHEN '0.000' THEN NULL ELSE PRINTF("%.3f", SUM(AVR)) END   '04',
                                CASE PRINTF("%.3f", SUM(MAI)) WHEN '0.000' THEN NULL ELSE PRINTF("%.3f", SUM(MAI)) END   '05',
                                CASE PRINTF("%.3f", SUM(JUIN)) WHEN '0.000' THEN NULL ELSE PRINTF("%.3f", SUM(JUIN)) END '06',
                                CASE PRINTF("%.3f", SUM(JUIL)) WHEN '0.000' THEN NULL ELSE PRINTF("%.3f", SUM(JUIL)) END '07',
                                CASE PRINTF("%.3f", SUM(AOU)) WHEN '0.000' THEN NULL ELSE PRINTF("%.3f", SUM(AOU)) END   '08',
                                CASE PRINTF("%.3f", SUM(SEP)) WHEN '0.000' THEN NULL ELSE PRINTF("%.3f", SUM(SEP)) END   '09',
                                CASE PRINTF("%.3f", SUM(OCT)) WHEN '0.000' THEN NULL ELSE PRINTF("%.3f", SUM(OCT)) END   '10',
                                CASE PRINTF("%.3f", SUM(NOV)) WHEN '0.000' THEN NULL ELSE PRINTF("%.3f", SUM(NOV)) END   '11',
                                CASE PRINTF("%.3f", SUM(DEC)) WHEN '0.000' THEN NULL ELSE PRINTF("%.3f", SUM(DEC)) END   '12'
                         FROM (
                                  SELECT culture__id,
                                         0,
                                         culture,
                                         CASE mois WHEN '01' THEN poids END 'JAN',
                                         CASE mois WHEN '02' THEN poids END 'FEV',
                                         CASE mois WHEN '03' THEN poids END 'MAR',
                                         CASE mois WHEN '04' THEN poids END 'AVR',
                                         CASE mois WHEN '05' THEN poids END 'MAI',
                                         CASE mois WHEN '06' THEN poids END 'JUIN',
                                         CASE mois WHEN '07' THEN poids END 'JUIL',
                                         CASE mois WHEN '08' THEN poids END 'AOU',
                                         CASE mois WHEN '09' THEN poids END 'SEP',
                                         CASE mois WHEN '10' THEN poids END 'OCT',
                                         CASE mois WHEN '11' THEN poids END 'NOV',
                                         CASE mois WHEN '12' THEN poids END 'DEC'
                                  FROM (
                                           SELECT c.id culture__id, 0, c.libelle culture, strftime('%m', r.date) mois, SUM(r.poids) poids
                                           FROM recolte r
                                                    JOIN culture c ON r.culture_id = c.id
                                           $whereDate
                                             AND r.actif = TRUE
                                             AND c.actif = TRUE
                                           GROUP BY r.culture_id, strftime('%m', r.date)
                                       ) 
                              ) 
                         GROUP BY culture
                     )
                ORDER BY 3 ASC
SQL;
            $statement = $connection->prepare($sql);
            $statement->execute();
            $retour = $statement->fetchAll();
        } catch (DBALException $e) {
            $retour = [];
        } finally {

            return $retour;
        }
    }

    public function findLastDate()
    {
        $connection = $this->getEntityManager()->getConnection();
        $sql = <<<SQL
                SELECT MAX(date) FROM recolte WHERE actif = TRUE;
SQL;
        $statement = $connection->prepare($sql);
        $statement->execute();
        $resultat = $statement->fetch();

        return new DateTime(reset($resultat));
    }

    public function findLastCulture()
    {
        return $this->createQueryBuilder('r')
            ->select('c')
            ->join(Culture::class, 'c', 'WITH', 'r.culture = c')
            ->andWhere('r.actif = TRUE')
            ->andWhere('c.actif = TRUE')
            ->orderBy('r.id', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }
    public function compare(int $idCulture = null)
    {
        $connection = $this->getEntityManager()->getConnection();
        $filtre = null;
        $parametres = [];
        if (!empty($idCulture)) {
            $filtre = 'AND r.culture_id = :id_culture ';
            $parametres['id_culture'] = $idCulture;
        }
        $sql = <<<SQL
                    SELECT
                          (SELECT SUM(poids) FROM recolte JOIN culture on culture_id = culture.id WHERE strftime('%Y', date) = strftime('%Y', r.date) AND libelle = c.libelle) total,
                           c.libelle culture,
                           SUM(r.poids)  'poids',
                           strftime('%m', r.date) mois,
                           strftime('%Y', r.date) 'annee'
                    FROM recolte r
                    JOIN culture c on r.culture_id = c.id
                    WHERE c.actif = TRUE
                    AND r.actif = TRUE
                    $filtre
                    GROUP BY strftime('%Y', r.date), strftime('%m', r.date), c.libelle
                    ORDER BY c.libelle ASC, strftime('%Y', r.date) ASC, strftime('%m', r.date) ASC
SQL;
        $statement = $connection->prepare($sql);
        $statement->execute($parametres);

        return $statement->fetchAll();
    }

    public function trouveCultures(int $idCulture = null)
    {
        $connection = $this->getEntityManager()->getConnection();
        $filtre = null;
        $parametres = [];
        if (!empty($idCulture)) {
            $filtre = 'AND r.culture_id = :id_culture ';
            $parametres['id_culture'] = $idCulture;
        }
        $sql = <<<SQL
                    SELECT DISTINCT c.libelle culture
                    FROM culture c
                    JOIN recolte r on r.culture_id = c.id
                    WHERE c.actif = TRUE
                    AND r.actif = TRUE
                    $filtre
                    ORDER BY c.libelle ASC
SQL;
        $statement = $connection->prepare($sql);
        $statement->execute($parametres);

        return $statement->fetchAll(FetchMode::COLUMN);
    }
}
