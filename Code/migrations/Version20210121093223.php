<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210121093223 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adresse (id INT AUTO_INCREMENT NOT NULL, numero INT NOT NULL, rue VARCHAR(255) NOT NULL, code_postal INT NOT NULL, ville VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cadeau (id INT AUTO_INCREMENT NOT NULL, categorie_id INT NOT NULL, designation VARCHAR(255) NOT NULL, age_minimum INT NOT NULL, prix INT NOT NULL, INDEX IDX_3D213460BCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE liste (id INT AUTO_INCREMENT NOT NULL, personne_id INT NOT NULL, UNIQUE INDEX UNIQ_FCF22AF4A21BD112 (personne_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE liste_cadeau (liste_id INT NOT NULL, cadeau_id INT NOT NULL, INDEX IDX_C50415BE85441D8 (liste_id), INDEX IDX_C50415BD9D5ED84 (cadeau_id), PRIMARY KEY(liste_id, cadeau_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personne (id INT AUTO_INCREMENT NOT NULL, adresse_id INT NOT NULL, nom_prenom VARCHAR(255) NOT NULL, sexe VARCHAR(1) NOT NULL, date_naissance DATE NOT NULL, INDEX IDX_FCEC9EF4DE7DC5C (adresse_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cadeau ADD CONSTRAINT FK_3D213460BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE liste ADD CONSTRAINT FK_FCF22AF4A21BD112 FOREIGN KEY (personne_id) REFERENCES personne (id)');
        $this->addSql('ALTER TABLE liste_cadeau ADD CONSTRAINT FK_C50415BE85441D8 FOREIGN KEY (liste_id) REFERENCES liste (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE liste_cadeau ADD CONSTRAINT FK_C50415BD9D5ED84 FOREIGN KEY (cadeau_id) REFERENCES cadeau (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personne ADD CONSTRAINT FK_FCEC9EF4DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE personne DROP FOREIGN KEY FK_FCEC9EF4DE7DC5C');
        $this->addSql('ALTER TABLE liste_cadeau DROP FOREIGN KEY FK_C50415BD9D5ED84');
        $this->addSql('ALTER TABLE cadeau DROP FOREIGN KEY FK_3D213460BCF5E72D');
        $this->addSql('ALTER TABLE liste_cadeau DROP FOREIGN KEY FK_C50415BE85441D8');
        $this->addSql('ALTER TABLE liste DROP FOREIGN KEY FK_FCF22AF4A21BD112');
        $this->addSql('DROP TABLE adresse');
        $this->addSql('DROP TABLE cadeau');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE liste');
        $this->addSql('DROP TABLE liste_cadeau');
        $this->addSql('DROP TABLE personne');
    }
}
