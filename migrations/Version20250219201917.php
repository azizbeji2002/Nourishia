<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250219201917 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dossiers_medicaux ADD groupe_sanguin VARCHAR(10) NOT NULL, ADD taille DOUBLE PRECISION NOT NULL, ADD sexe_bebe VARCHAR(10) NOT NULL, ADD allergie VARCHAR(255) DEFAULT NULL, ADD contact_urgence INT NOT NULL, CHANGE diagnostic diagnostic VARCHAR(255) NOT NULL, CHANGE traitement traitement VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dossiers_medicaux DROP groupe_sanguin, DROP taille, DROP sexe_bebe, DROP allergie, DROP contact_urgence, CHANGE diagnostic diagnostic VARCHAR(255) DEFAULT NULL, CHANGE traitement traitement VARCHAR(255) DEFAULT NULL');
    }
}
