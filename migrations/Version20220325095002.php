<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220325095002 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE espace_de_coworking (id INT AUTO_INCREMENT NOT NULL, url VARCHAR(255) NOT NULL, titre VARCHAR(25) NOT NULL, prix DOUBLE PRECISION NOT NULL, adresse VARCHAR(50) NOT NULL, descriptif VARCHAR(255) NOT NULL, imprimante TINYINT(1) NOT NULL, parking TINYINT(1) NOT NULL, cafe TINYINT(1) NOT NULL, heure_ouverture VARCHAR(6) NOT NULL, heure_fermeture VARCHAR(6) NOT NULL, nombre_place INT NOT NULL, nombre_place_libre INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE espace_de_coworking');
    }
}
