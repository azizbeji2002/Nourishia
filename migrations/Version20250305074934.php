<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250305074934 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE notification (id INT AUTO_INCREMENT NOT NULL, rendezvous_id INT NOT NULL, message VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, is_read TINYINT(1) NOT NULL, INDEX IDX_BF5476CA3345E0A3 (rendezvous_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CA3345E0A3 FOREIGN KEY (rendezvous_id) REFERENCES rendez_vous (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE docteur ADD CONSTRAINT FK_83A7A439A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_83A7A439A76ED395 ON docteur (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE notification DROP FOREIGN KEY FK_BF5476CA3345E0A3');
        $this->addSql('DROP TABLE notification');
        $this->addSql('ALTER TABLE docteur DROP FOREIGN KEY FK_83A7A439A76ED395');
        $this->addSql('DROP INDEX UNIQ_83A7A439A76ED395 ON docteur');
    }
}
