<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210330095851 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bateau (id INT NOT NULL, musee_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, materiau VARCHAR(255) NOT NULL, prix_achat DOUBLE PRECISION NOT NULL, longueur DOUBLE PRECISION NOT NULL, largeur DOUBLE PRECISION NOT NULL, poids DOUBLE PRECISION NOT NULL, capacite_personne INT NOT NULL, INDEX IDX_A664B05AD90009CE (musee_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE histoire_bateau (id INT NOT NULL, bateau_id INT NOT NULL, annee_lancement DATE NOT NULL, constructeur VARCHAR(255) NOT NULL, proprietaire VARCHAR(255) NOT NULL, annee_entree_collection DATE NOT NULL, date_monument_historique DATE NOT NULL, annee_restauration DATE NOT NULL, historique LONGTEXT NOT NULL, temoignage_audio VARCHAR(255) NOT NULL, temoignage_texte LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_3226D044A9706509 (bateau_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE localisation_bateau (id INT NOT NULL, bateau_id INT NOT NULL, latitude DOUBLE PRECISION NOT NULL, longitude DOUBLE PRECISION NOT NULL, lieu_actuel VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_81AFE943A9706509 (bateau_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE musee (id INT NOT NULL, addresse VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, jours_fermeture VARCHAR(255) NOT NULL, horaire_ouverture INT NOT NULL, horaire_fermeture INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE planning_visite (id INT NOT NULL, bateau_id INT DEFAULT NULL, heure_debut DATE NOT NULL, nb_personne_inscrites INT NOT NULL, jour DATE NOT NULL, INDEX IDX_D0BDAED4A9706509 (bateau_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bateau ADD CONSTRAINT FK_A664B05AD90009CE FOREIGN KEY (musee_id) REFERENCES musee (id)');
        $this->addSql('ALTER TABLE histoire_bateau ADD CONSTRAINT FK_3226D044A9706509 FOREIGN KEY (bateau_id) REFERENCES bateau (id)');
        $this->addSql('ALTER TABLE localisation_bateau ADD CONSTRAINT FK_81AFE943A9706509 FOREIGN KEY (bateau_id) REFERENCES bateau (id)');
        $this->addSql('ALTER TABLE planning_visite ADD CONSTRAINT FK_D0BDAED4A9706509 FOREIGN KEY (bateau_id) REFERENCES bateau (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE histoire_bateau DROP FOREIGN KEY FK_3226D044A9706509');
        $this->addSql('ALTER TABLE localisation_bateau DROP FOREIGN KEY FK_81AFE943A9706509');
        $this->addSql('ALTER TABLE planning_visite DROP FOREIGN KEY FK_D0BDAED4A9706509');
        $this->addSql('ALTER TABLE bateau DROP FOREIGN KEY FK_A664B05AD90009CE');
        $this->addSql('DROP TABLE bateau');
        $this->addSql('DROP TABLE histoire_bateau');
        $this->addSql('DROP TABLE localisation_bateau');
        $this->addSql('DROP TABLE musee');
        $this->addSql('DROP TABLE planning_visite');
    }
}
