SELECT
       'export_20201201' AS Code,
        a.libelle || ' ' || GROUP_CONCAT(t.libelle) AS Taches,
        p.libelle AS Projets,
        ROUND(SUM(STRFTIME('%s', t.heure_fin) - STRFTIME('%s', t.heure_debut))/3600.00, 2)  'Charge réelle (h)',
        STRFTIME('%d/%m/%Y', MAX(t.date)) AS 'Date fin',
        tg.libelle AS Affectation
FROM tache t
         JOIN tache_projet tp ON tp.tache_id = t.id
         JOIN projet p ON p.id = tp.projet_id
         JOIN tache_type tg ON tg.id = t.type_id
         JOIN tache_activite ta ON ta.tache_id = t.id
         JOIN activite a ON ta.activite_id = a.id
WHERE t.date BETWEEN '2020-11-01 00:00:00' AND '2020-11-30 23:59:59'
GROUP BY a.libelle
ORDER BY p.libelle ASC, a.libelle || ' ' || t.libelle ASC
;




