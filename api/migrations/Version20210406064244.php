<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210406064244 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE meteo (id INT AUTO_INCREMENT NOT NULL, jour VARCHAR(255) NOT NULL, temperature VARCHAR(255) NOT NULL, icone VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, temperature_ressentie VARCHAR(255) NOT NULL, temperature_min VARCHAR(255) NOT NULL, temperature_max VARCHAR(255) NOT NULL, vitesse_vent VARCHAR(255) NOT NULL, humidite VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bateau ADD temoignage_audio VARCHAR(255) NOT NULL, ADD temoignage_texte LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE histoire_bateau DROP temoignage_audio, DROP temoignage_texte');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE meteo');
        $this->addSql('ALTER TABLE bateau DROP temoignage_audio, DROP temoignage_texte');
        $this->addSql('ALTER TABLE histoire_bateau ADD temoignage_audio VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD temoignage_texte LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
