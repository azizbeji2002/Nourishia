<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250219203617 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, mot_passe VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE consultation (id INT AUTO_INCREMENT NOT NULL, patient_id_id INT NOT NULL, docteur_id_id INT NOT NULL, date_consultation DATE NOT NULL, statut VARCHAR(255) NOT NULL, conseils VARCHAR(255) NOT NULL, poids DOUBLE PRECISION NOT NULL, tension DOUBLE PRECISION NOT NULL, process_grossesse DATE NOT NULL, INDEX IDX_964685A6EA724598 (patient_id_id), INDEX IDX_964685A66061999D (docteur_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE docteur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, mot_passe VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, specialite VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dossiers_medicaux (id INT AUTO_INCREMENT NOT NULL, patient_id_id INT DEFAULT NULL, docteur_id_id INT DEFAULT NULL, date_creation DATE NOT NULL, diagnostic VARCHAR(255) NOT NULL, traitement VARCHAR(255) NOT NULL, fichier VARCHAR(255) DEFAULT NULL, groupe_sanguin VARCHAR(10) NOT NULL, taille DOUBLE PRECISION NOT NULL, sexe_bebe VARCHAR(10) NOT NULL, allergie VARCHAR(255) DEFAULT NULL, contact_urgence INT NOT NULL, UNIQUE INDEX UNIQ_29FDDE35EA724598 (patient_id_id), UNIQUE INDEX UNIQ_29FDDE356061999D (docteur_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patient (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, mot_passe VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, adresse VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rendez_vous (id INT AUTO_INCREMENT NOT NULL, patient_id INT NOT NULL, docteur_id INT NOT NULL, date_rdv DATETIME NOT NULL, statut VARCHAR(255) NOT NULL, INDEX IDX_65E8AA0A6B899279 (patient_id), INDEX IDX_65E8AA0ACF22540A (docteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE consultation ADD CONSTRAINT FK_964685A6EA724598 FOREIGN KEY (patient_id_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE consultation ADD CONSTRAINT FK_964685A66061999D FOREIGN KEY (docteur_id_id) REFERENCES docteur (id)');
        $this->addSql('ALTER TABLE dossiers_medicaux ADD CONSTRAINT FK_29FDDE35EA724598 FOREIGN KEY (patient_id_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE dossiers_medicaux ADD CONSTRAINT FK_29FDDE356061999D FOREIGN KEY (docteur_id_id) REFERENCES docteur (id)');
        $this->addSql('ALTER TABLE rendez_vous ADD CONSTRAINT FK_65E8AA0A6B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE rendez_vous ADD CONSTRAINT FK_65E8AA0ACF22540A FOREIGN KEY (docteur_id) REFERENCES docteur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE consultation DROP FOREIGN KEY FK_964685A6EA724598');
        $this->addSql('ALTER TABLE consultation DROP FOREIGN KEY FK_964685A66061999D');
        $this->addSql('ALTER TABLE dossiers_medicaux DROP FOREIGN KEY FK_29FDDE35EA724598');
        $this->addSql('ALTER TABLE dossiers_medicaux DROP FOREIGN KEY FK_29FDDE356061999D');
        $this->addSql('ALTER TABLE rendez_vous DROP FOREIGN KEY FK_65E8AA0A6B899279');
        $this->addSql('ALTER TABLE rendez_vous DROP FOREIGN KEY FK_65E8AA0ACF22540A');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE consultation');
        $this->addSql('DROP TABLE docteur');
        $this->addSql('DROP TABLE dossiers_medicaux');
        $this->addSql('DROP TABLE patient');
        $this->addSql('DROP TABLE rendez_vous');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
