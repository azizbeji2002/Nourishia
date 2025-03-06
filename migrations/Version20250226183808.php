<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250226183808 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activite_sportif (id_activite INT AUTO_INCREMENT NOT NULL, plan_id INT NOT NULL, type VARCHAR(255) DEFAULT NULL, duree INT DEFAULT NULL, frequence INT DEFAULT NULL, INDEX IDX_982A8308E899029B (plan_id), PRIMARY KEY(id_activite)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, poste_id INT NOT NULL, contenu LONGTEXT DEFAULT NULL, date_creation DATETIME DEFAULT NULL, nbr_signal INT DEFAULT NULL, INDEX IDX_67F068BCA0905086 (poste_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE consultation (id INT AUTO_INCREMENT NOT NULL, patient_id_id INT NOT NULL, docteur_id_id INT NOT NULL, date_consultation DATE NOT NULL, statut VARCHAR(255) NOT NULL, conseils VARCHAR(255) NOT NULL, poids DOUBLE PRECISION NOT NULL, tension DOUBLE PRECISION NOT NULL, process_grossesse DATE NOT NULL, INDEX IDX_964685A6EA724598 (patient_id_id), INDEX IDX_964685A66061999D (docteur_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE docteur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, mot_passe VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, specialite VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dossiers_medicaux (id INT AUTO_INCREMENT NOT NULL, patient_id_id INT DEFAULT NULL, docteur_id_id INT DEFAULT NULL, date_creation DATE NOT NULL, diagnostic VARCHAR(255) NOT NULL, traitement VARCHAR(255) NOT NULL, fichier VARCHAR(255) DEFAULT NULL, groupe_sanguin VARCHAR(10) NOT NULL, taille DOUBLE PRECISION NOT NULL, sexe_bebe VARCHAR(10) NOT NULL, allergie VARCHAR(255) DEFAULT NULL, contact_urgence INT NOT NULL, UNIQUE INDEX UNIQ_29FDDE35EA724598 (patient_id_id), UNIQUE INDEX UNIQ_29FDDE356061999D (docteur_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, pname VARCHAR(255) NOT NULL, prix INT NOT NULL, status VARCHAR(255) NOT NULL, quantity INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patient (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, mot_passe VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, adresse VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plan_nutritionnels (idplan INT AUTO_INCREMENT NOT NULL, aliment_recommende VARCHAR(255) DEFAULT NULL, aliment_evite VARCHAR(255) DEFAULT NULL, PRIMARY KEY(idplan)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE poste (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) DEFAULT NULL, contenue LONGTEXT DEFAULT NULL, date_publication DATE DEFAULT NULL, etat TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, categorie_id INT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, prix DOUBLE PRECISION NOT NULL, quantite INT NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_D34A04ADBCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rendez_vous (id INT AUTO_INCREMENT NOT NULL, patient_id INT NOT NULL, docteur_id INT NOT NULL, date_rdv DATETIME NOT NULL, statut VARCHAR(255) NOT NULL, INDEX IDX_65E8AA0A6B899279 (patient_id), INDEX IDX_65E8AA0ACF22540A (docteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, tel VARCHAR(10) NOT NULL, adr VARCHAR(50) NOT NULL, date DATE NOT NULL, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE activite_sportif ADD CONSTRAINT FK_982A8308E899029B FOREIGN KEY (plan_id) REFERENCES plan_nutritionnels (idplan) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCA0905086 FOREIGN KEY (poste_id) REFERENCES poste (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE consultation ADD CONSTRAINT FK_964685A6EA724598 FOREIGN KEY (patient_id_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE consultation ADD CONSTRAINT FK_964685A66061999D FOREIGN KEY (docteur_id_id) REFERENCES docteur (id)');
        $this->addSql('ALTER TABLE dossiers_medicaux ADD CONSTRAINT FK_29FDDE35EA724598 FOREIGN KEY (patient_id_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE dossiers_medicaux ADD CONSTRAINT FK_29FDDE356061999D FOREIGN KEY (docteur_id_id) REFERENCES docteur (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE rendez_vous ADD CONSTRAINT FK_65E8AA0A6B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE rendez_vous ADD CONSTRAINT FK_65E8AA0ACF22540A FOREIGN KEY (docteur_id) REFERENCES docteur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activite_sportif DROP FOREIGN KEY FK_982A8308E899029B');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCA0905086');
        $this->addSql('ALTER TABLE consultation DROP FOREIGN KEY FK_964685A6EA724598');
        $this->addSql('ALTER TABLE consultation DROP FOREIGN KEY FK_964685A66061999D');
        $this->addSql('ALTER TABLE dossiers_medicaux DROP FOREIGN KEY FK_29FDDE35EA724598');
        $this->addSql('ALTER TABLE dossiers_medicaux DROP FOREIGN KEY FK_29FDDE356061999D');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADBCF5E72D');
        $this->addSql('ALTER TABLE rendez_vous DROP FOREIGN KEY FK_65E8AA0A6B899279');
        $this->addSql('ALTER TABLE rendez_vous DROP FOREIGN KEY FK_65E8AA0ACF22540A');
        $this->addSql('DROP TABLE activite_sportif');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE consultation');
        $this->addSql('DROP TABLE docteur');
        $this->addSql('DROP TABLE dossiers_medicaux');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE patient');
        $this->addSql('DROP TABLE plan_nutritionnels');
        $this->addSql('DROP TABLE poste');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE rendez_vous');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
