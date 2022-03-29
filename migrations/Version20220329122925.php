<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220329122925 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE espace_de_coworking ADD id_user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE espace_de_coworking ADD CONSTRAINT FK_D4A1047879F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_D4A1047879F37AE5 ON espace_de_coworking (id_user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE espace_de_coworking DROP FOREIGN KEY FK_D4A1047879F37AE5');
        $this->addSql('DROP INDEX IDX_D4A1047879F37AE5 ON espace_de_coworking');
        $this->addSql('ALTER TABLE espace_de_coworking DROP id_user_id');
    }
}
