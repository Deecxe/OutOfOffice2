<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220329075104 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation ADD id_user_id INT DEFAULT NULL, ADD id_espace_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495579F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495536BDE04B FOREIGN KEY (id_espace_id) REFERENCES espace_de_coworking (id)');
        $this->addSql('CREATE INDEX IDX_42C8495579F37AE5 ON reservation (id_user_id)');
        $this->addSql('CREATE INDEX IDX_42C8495536BDE04B ON reservation (id_espace_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495579F37AE5');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495536BDE04B');
        $this->addSql('DROP INDEX IDX_42C8495579F37AE5 ON reservation');
        $this->addSql('DROP INDEX IDX_42C8495536BDE04B ON reservation');
        $this->addSql('ALTER TABLE reservation DROP id_user_id, DROP id_espace_id');
    }
}
