<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220405142004 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE espace_de_coworking ADD ville VARCHAR(255) NOT NULL, ADD code_postal INT NOT NULL');
        $this->addSql('ALTER TABLE paiement CHANGE date_expi date_expi DATE NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE espace_de_coworking DROP ville, DROP code_postal');
        $this->addSql('ALTER TABLE paiement CHANGE date_expi date_expi DATETIME NOT NULL');
    }
}
