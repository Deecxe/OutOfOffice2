<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220405174111 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE facture ADD id_reservationn_id INT DEFAULT NULL, ADD id_users_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE866410928AB4A3 FOREIGN KEY (id_reservationn_id) REFERENCES reservation (id)');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE866410376858A8 FOREIGN KEY (id_users_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_FE866410928AB4A3 ON facture (id_reservationn_id)');
        $this->addSql('CREATE INDEX IDX_FE866410376858A8 ON facture (id_users_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE facture DROP FOREIGN KEY FK_FE866410928AB4A3');
        $this->addSql('ALTER TABLE facture DROP FOREIGN KEY FK_FE866410376858A8');
        $this->addSql('DROP INDEX IDX_FE866410928AB4A3 ON facture');
        $this->addSql('DROP INDEX IDX_FE866410376858A8 ON facture');
        $this->addSql('ALTER TABLE facture DROP id_reservationn_id, DROP id_users_id');
    }
}
