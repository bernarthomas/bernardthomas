<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210103180806 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_1FF7F711670C757F');
        $this->addSql('DROP INDEX IDX_1FF7F711B108249D');
        $this->addSql('CREATE TEMPORARY TABLE __temp__achat_nourriture AS SELECT id, culture_id, fournisseur_id, actif, date, date_creation, date_derniere_maj, poids, prix_paye FROM achat_nourriture');
        $this->addSql('DROP TABLE achat_nourriture');
        $this->addSql('CREATE TABLE achat_nourriture (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, culture_id INTEGER NOT NULL, fournisseur_id INTEGER DEFAULT NULL, actif BOOLEAN NOT NULL, date DATETIME DEFAULT NULL, date_creation DATETIME NOT NULL, date_derniere_maj DATETIME DEFAULT NULL, poids DOUBLE PRECISION NOT NULL, prix_paye DOUBLE PRECISION NOT NULL, CONSTRAINT FK_1FF7F711B108249D FOREIGN KEY (culture_id) REFERENCES culture (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_1FF7F711670C757F FOREIGN KEY (fournisseur_id) REFERENCES fournisseur (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO achat_nourriture (id, culture_id, fournisseur_id, actif, date, date_creation, date_derniere_maj, poids, prix_paye) SELECT id, culture_id, fournisseur_id, actif, date, date_creation, date_derniere_maj, poids, prix_paye FROM __temp__achat_nourriture');
        $this->addSql('DROP TABLE __temp__achat_nourriture');
        $this->addSql('CREATE INDEX IDX_1FF7F711670C757F ON achat_nourriture (fournisseur_id)');
        $this->addSql('CREATE INDEX IDX_1FF7F711B108249D ON achat_nourriture (culture_id)');
        $this->addSql('DROP INDEX IDX_41405E391B6BC839');
        $this->addSql('DROP INDEX IDX_41405E399F2C3FAB');
        $this->addSql('DROP INDEX IDX_41405E39F6B12637');
        $this->addSql('DROP INDEX IDX_41405E39620D5460');
        $this->addSql('CREATE TEMPORARY TABLE __temp__element AS SELECT id, suivi_culture_id, zone_id, legende_id, variete_id, date, actif, date_creation, date_derniere_maj, echec FROM element');
        $this->addSql('DROP TABLE element');
        $this->addSql('CREATE TABLE element (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, suivi_culture_id INTEGER NOT NULL, zone_id INTEGER DEFAULT NULL, legende_id INTEGER NOT NULL, variete_id INTEGER NOT NULL, date DATETIME NOT NULL, actif BOOLEAN NOT NULL, date_creation DATETIME NOT NULL, date_derniere_maj DATETIME DEFAULT NULL, echec BOOLEAN NOT NULL, CONSTRAINT FK_41405E391B6BC839 FOREIGN KEY (suivi_culture_id) REFERENCES suivi_culture (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_41405E399F2C3FAB FOREIGN KEY (zone_id) REFERENCES zone (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_41405E39F6B12637 FOREIGN KEY (legende_id) REFERENCES legende (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_41405E39620D5460 FOREIGN KEY (variete_id) REFERENCES variete (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO element (id, suivi_culture_id, zone_id, legende_id, variete_id, date, actif, date_creation, date_derniere_maj, echec) SELECT id, suivi_culture_id, zone_id, legende_id, variete_id, date, actif, date_creation, date_derniere_maj, echec FROM __temp__element');
        $this->addSql('DROP TABLE __temp__element');
        $this->addSql('CREATE INDEX IDX_41405E391B6BC839 ON element (suivi_culture_id)');
        $this->addSql('CREATE INDEX IDX_41405E399F2C3FAB ON element (zone_id)');
        $this->addSql('CREATE INDEX IDX_41405E39F6B12637 ON element (legende_id)');
        $this->addSql('CREATE INDEX IDX_41405E39620D5460 ON element (variete_id)');
        $this->addSql('DROP INDEX IDX_27425660F6B12637');
        $this->addSql('DROP INDEX IDX_274256601F1F2A24');
        $this->addSql('CREATE TEMPORARY TABLE __temp__element_legende AS SELECT element_id, legende_id FROM element_legende');
        $this->addSql('DROP TABLE element_legende');
        $this->addSql('CREATE TABLE element_legende (element_id INTEGER NOT NULL, legende_id INTEGER NOT NULL, PRIMARY KEY(element_id, legende_id), CONSTRAINT FK_274256601F1F2A24 FOREIGN KEY (element_id) REFERENCES element (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_27425660F6B12637 FOREIGN KEY (legende_id) REFERENCES legende (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO element_legende (element_id, legende_id) SELECT element_id, legende_id FROM __temp__element_legende');
        $this->addSql('DROP TABLE __temp__element_legende');
        $this->addSql('CREATE INDEX IDX_27425660F6B12637 ON element_legende (legende_id)');
        $this->addSql('CREATE INDEX IDX_274256601F1F2A24 ON element_legende (element_id)');
        $this->addSql('DROP INDEX IDX_3433713CB108249D');
        $this->addSql('CREATE TEMPORARY TABLE __temp__recolte AS SELECT id, culture_id, actif, date_creation, date_derniere_maj, commentaire, date, poids FROM recolte');
        $this->addSql('DROP TABLE recolte');
        $this->addSql('CREATE TABLE recolte (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, culture_id INTEGER NOT NULL, actif BOOLEAN NOT NULL, date_creation DATETIME NOT NULL, date_derniere_maj DATETIME DEFAULT NULL, commentaire VARCHAR(255) DEFAULT NULL COLLATE BINARY, date DATETIME DEFAULT NULL, poids DOUBLE PRECISION NOT NULL, CONSTRAINT FK_3433713CB108249D FOREIGN KEY (culture_id) REFERENCES culture (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO recolte (id, culture_id, actif, date_creation, date_derniere_maj, commentaire, date, poids) SELECT id, culture_id, actif, date_creation, date_derniere_maj, commentaire, date, poids FROM __temp__recolte');
        $this->addSql('DROP TABLE __temp__recolte');
        $this->addSql('CREATE INDEX IDX_3433713CB108249D ON recolte (culture_id)');
        $this->addSql('DROP INDEX IDX_93872075C54C8C93');
        $this->addSql('CREATE TEMPORARY TABLE __temp__tache AS SELECT id, type_id, actif, date, date_creation, date_derniere_maj, heure_debut, heure_fin, libelle FROM tache');
        $this->addSql('DROP TABLE tache');
        $this->addSql('CREATE TABLE tache (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, type_id INTEGER DEFAULT NULL, actif BOOLEAN NOT NULL, date DATETIME NOT NULL, date_creation DATETIME NOT NULL, date_derniere_maj DATETIME DEFAULT NULL, heure_debut TIME NOT NULL, heure_fin TIME DEFAULT NULL, libelle VARCHAR(255) NOT NULL COLLATE BINARY, CONSTRAINT FK_93872075C54C8C93 FOREIGN KEY (type_id) REFERENCES tache_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO tache (id, type_id, actif, date, date_creation, date_derniere_maj, heure_debut, heure_fin, libelle) SELECT id, type_id, actif, date, date_creation, date_derniere_maj, heure_debut, heure_fin, libelle FROM __temp__tache');
        $this->addSql('DROP TABLE __temp__tache');
        $this->addSql('CREATE INDEX IDX_93872075C54C8C93 ON tache (type_id)');
        $this->addSql('DROP INDEX IDX_3B44428D2235D39');
        $this->addSql('DROP INDEX IDX_3B444289B0F88B1');
        $this->addSql('CREATE TEMPORARY TABLE __temp__tache_activite AS SELECT tache_id, activite_id FROM tache_activite');
        $this->addSql('DROP TABLE tache_activite');
        $this->addSql('CREATE TABLE tache_activite (tache_id INTEGER NOT NULL, activite_id INTEGER NOT NULL, PRIMARY KEY(tache_id, activite_id), CONSTRAINT FK_3B44428D2235D39 FOREIGN KEY (tache_id) REFERENCES tache (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_3B444289B0F88B1 FOREIGN KEY (activite_id) REFERENCES activite (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO tache_activite (tache_id, activite_id) SELECT tache_id, activite_id FROM __temp__tache_activite');
        $this->addSql('DROP TABLE __temp__tache_activite');
        $this->addSql('CREATE INDEX IDX_3B44428D2235D39 ON tache_activite (tache_id)');
        $this->addSql('CREATE INDEX IDX_3B444289B0F88B1 ON tache_activite (activite_id)');
        $this->addSql('DROP INDEX IDX_BCE9A358D2235D39');
        $this->addSql('DROP INDEX IDX_BCE9A358C18272');
        $this->addSql('CREATE TEMPORARY TABLE __temp__tache_projet AS SELECT tache_id, projet_id FROM tache_projet');
        $this->addSql('DROP TABLE tache_projet');
        $this->addSql('CREATE TABLE tache_projet (tache_id INTEGER NOT NULL, projet_id INTEGER NOT NULL, PRIMARY KEY(tache_id, projet_id), CONSTRAINT FK_BCE9A358D2235D39 FOREIGN KEY (tache_id) REFERENCES tache (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_BCE9A358C18272 FOREIGN KEY (projet_id) REFERENCES projet (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO tache_projet (tache_id, projet_id) SELECT tache_id, projet_id FROM __temp__tache_projet');
        $this->addSql('DROP TABLE __temp__tache_projet');
        $this->addSql('CREATE INDEX IDX_BCE9A358D2235D39 ON tache_projet (tache_id)');
        $this->addSql('CREATE INDEX IDX_BCE9A358C18272 ON tache_projet (projet_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE "action"');
        $this->addSql('DROP INDEX IDX_1FF7F711B108249D');
        $this->addSql('DROP INDEX IDX_1FF7F711670C757F');
        $this->addSql('CREATE TEMPORARY TABLE __temp__achat_nourriture AS SELECT id, culture_id, fournisseur_id, actif, date, date_creation, date_derniere_maj, poids, prix_paye FROM achat_nourriture');
        $this->addSql('DROP TABLE achat_nourriture');
        $this->addSql('CREATE TABLE achat_nourriture (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, culture_id INTEGER NOT NULL, fournisseur_id INTEGER DEFAULT NULL, actif BOOLEAN NOT NULL, date DATETIME DEFAULT NULL, date_creation DATETIME NOT NULL, date_derniere_maj DATETIME DEFAULT NULL, poids DOUBLE PRECISION NOT NULL, prix_paye DOUBLE PRECISION NOT NULL)');
        $this->addSql('INSERT INTO achat_nourriture (id, culture_id, fournisseur_id, actif, date, date_creation, date_derniere_maj, poids, prix_paye) SELECT id, culture_id, fournisseur_id, actif, date, date_creation, date_derniere_maj, poids, prix_paye FROM __temp__achat_nourriture');
        $this->addSql('DROP TABLE __temp__achat_nourriture');
        $this->addSql('CREATE INDEX IDX_1FF7F711B108249D ON achat_nourriture (culture_id)');
        $this->addSql('CREATE INDEX IDX_1FF7F711670C757F ON achat_nourriture (fournisseur_id)');
        $this->addSql('DROP INDEX IDX_41405E391B6BC839');
        $this->addSql('DROP INDEX IDX_41405E399F2C3FAB');
        $this->addSql('DROP INDEX IDX_41405E39F6B12637');
        $this->addSql('DROP INDEX IDX_41405E39620D5460');
        $this->addSql('CREATE TEMPORARY TABLE __temp__element AS SELECT id, suivi_culture_id, zone_id, legende_id, variete_id, date, echec, actif, date_creation, date_derniere_maj FROM element');
        $this->addSql('DROP TABLE element');
        $this->addSql('CREATE TABLE element (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, suivi_culture_id INTEGER NOT NULL, zone_id INTEGER DEFAULT NULL, legende_id INTEGER NOT NULL, variete_id INTEGER NOT NULL, date DATETIME NOT NULL, actif BOOLEAN NOT NULL, date_creation DATETIME NOT NULL, date_derniere_maj DATETIME DEFAULT NULL, echec BOOLEAN DEFAULT NULL)');
        $this->addSql('INSERT INTO element (id, suivi_culture_id, zone_id, legende_id, variete_id, date, echec, actif, date_creation, date_derniere_maj) SELECT id, suivi_culture_id, zone_id, legende_id, variete_id, date, echec, actif, date_creation, date_derniere_maj FROM __temp__element');
        $this->addSql('DROP TABLE __temp__element');
        $this->addSql('CREATE INDEX IDX_41405E391B6BC839 ON element (suivi_culture_id)');
        $this->addSql('CREATE INDEX IDX_41405E399F2C3FAB ON element (zone_id)');
        $this->addSql('CREATE INDEX IDX_41405E39F6B12637 ON element (legende_id)');
        $this->addSql('CREATE INDEX IDX_41405E39620D5460 ON element (variete_id)');
        $this->addSql('DROP INDEX IDX_274256601F1F2A24');
        $this->addSql('DROP INDEX IDX_27425660F6B12637');
        $this->addSql('CREATE TEMPORARY TABLE __temp__element_legende AS SELECT element_id, legende_id FROM element_legende');
        $this->addSql('DROP TABLE element_legende');
        $this->addSql('CREATE TABLE element_legende (element_id INTEGER NOT NULL, legende_id INTEGER NOT NULL, PRIMARY KEY(element_id, legende_id))');
        $this->addSql('INSERT INTO element_legende (element_id, legende_id) SELECT element_id, legende_id FROM __temp__element_legende');
        $this->addSql('DROP TABLE __temp__element_legende');
        $this->addSql('CREATE INDEX IDX_274256601F1F2A24 ON element_legende (element_id)');
        $this->addSql('CREATE INDEX IDX_27425660F6B12637 ON element_legende (legende_id)');
        $this->addSql('DROP INDEX IDX_3433713CB108249D');
        $this->addSql('CREATE TEMPORARY TABLE __temp__recolte AS SELECT id, culture_id, actif, date_creation, date_derniere_maj, commentaire, date, poids FROM recolte');
        $this->addSql('DROP TABLE recolte');
        $this->addSql('CREATE TABLE recolte (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, culture_id INTEGER NOT NULL, actif BOOLEAN NOT NULL, date_creation DATETIME NOT NULL, date_derniere_maj DATETIME DEFAULT NULL, commentaire VARCHAR(255) DEFAULT NULL, date DATETIME DEFAULT NULL, poids DOUBLE PRECISION NOT NULL)');
        $this->addSql('INSERT INTO recolte (id, culture_id, actif, date_creation, date_derniere_maj, commentaire, date, poids) SELECT id, culture_id, actif, date_creation, date_derniere_maj, commentaire, date, poids FROM __temp__recolte');
        $this->addSql('DROP TABLE __temp__recolte');
        $this->addSql('CREATE INDEX IDX_3433713CB108249D ON recolte (culture_id)');
        $this->addSql('DROP INDEX IDX_93872075C54C8C93');
        $this->addSql('CREATE TEMPORARY TABLE __temp__tache AS SELECT id, type_id, actif, date, date_creation, date_derniere_maj, heure_debut, heure_fin, libelle FROM tache');
        $this->addSql('DROP TABLE tache');
        $this->addSql('CREATE TABLE tache (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, type_id INTEGER DEFAULT NULL, actif BOOLEAN NOT NULL, date DATETIME NOT NULL, date_creation DATETIME NOT NULL, date_derniere_maj DATETIME DEFAULT NULL, heure_debut TIME NOT NULL, heure_fin TIME DEFAULT NULL, libelle VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO tache (id, type_id, actif, date, date_creation, date_derniere_maj, heure_debut, heure_fin, libelle) SELECT id, type_id, actif, date, date_creation, date_derniere_maj, heure_debut, heure_fin, libelle FROM __temp__tache');
        $this->addSql('DROP TABLE __temp__tache');
        $this->addSql('CREATE INDEX IDX_93872075C54C8C93 ON tache (type_id)');
        $this->addSql('DROP INDEX IDX_3B44428D2235D39');
        $this->addSql('DROP INDEX IDX_3B444289B0F88B1');
        $this->addSql('CREATE TEMPORARY TABLE __temp__tache_activite AS SELECT tache_id, activite_id FROM tache_activite');
        $this->addSql('DROP TABLE tache_activite');
        $this->addSql('CREATE TABLE tache_activite (tache_id INTEGER NOT NULL, activite_id INTEGER NOT NULL, PRIMARY KEY(tache_id, activite_id))');
        $this->addSql('INSERT INTO tache_activite (tache_id, activite_id) SELECT tache_id, activite_id FROM __temp__tache_activite');
        $this->addSql('DROP TABLE __temp__tache_activite');
        $this->addSql('CREATE INDEX IDX_3B44428D2235D39 ON tache_activite (tache_id)');
        $this->addSql('CREATE INDEX IDX_3B444289B0F88B1 ON tache_activite (activite_id)');
        $this->addSql('DROP INDEX IDX_BCE9A358D2235D39');
        $this->addSql('DROP INDEX IDX_BCE9A358C18272');
        $this->addSql('CREATE TEMPORARY TABLE __temp__tache_projet AS SELECT tache_id, projet_id FROM tache_projet');
        $this->addSql('DROP TABLE tache_projet');
        $this->addSql('CREATE TABLE tache_projet (tache_id INTEGER NOT NULL, projet_id INTEGER NOT NULL, PRIMARY KEY(tache_id, projet_id))');
        $this->addSql('INSERT INTO tache_projet (tache_id, projet_id) SELECT tache_id, projet_id FROM __temp__tache_projet');
        $this->addSql('DROP TABLE __temp__tache_projet');
        $this->addSql('CREATE INDEX IDX_BCE9A358D2235D39 ON tache_projet (tache_id)');
        $this->addSql('CREATE INDEX IDX_BCE9A358C18272 ON tache_projet (projet_id)');
    }
}
