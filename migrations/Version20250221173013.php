<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250221173013 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE poste ADD user_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE poste ADD CONSTRAINT FK_7C890FAB9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_7C890FAB9D86650F ON poste (user_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE poste DROP FOREIGN KEY FK_7C890FAB9D86650F');
        $this->addSql('DROP INDEX IDX_7C890FAB9D86650F ON poste');
        $this->addSql('ALTER TABLE poste DROP user_id_id');
    }
}
