<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220328130420 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE espace_de_coworking ADD test TINYINT(1) DEFAULT NULL, CHANGE imprimante imprimante TINYINT(1) NOT NULL, CHANGE parking parking TINYINT(1) NOT NULL, CHANGE cafe cafe TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE espace_de_coworking DROP test, CHANGE imprimante imprimante TINYINT(1) DEFAULT NULL, CHANGE parking parking TINYINT(1) DEFAULT NULL, CHANGE cafe cafe TINYINT(1) DEFAULT NULL');
    }
}
