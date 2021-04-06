<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210406080822 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE meteo (id INT AUTO_INCREMENT NOT NULL, jour VARCHAR(255) NOT NULL, temperature VARCHAR(255) NOT NULL, icone VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, temperature_ressentie VARCHAR(255) NOT NULL, temperature_min VARCHAR(255) NOT NULL, temperature_max VARCHAR(255) NOT NULL, vitesse_vent VARCHAR(255) NOT NULL, humidite VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE meteo');
    }
}
