<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210125105016 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE liste ADD personne_id INT NOT NULL');
        $this->addSql('ALTER TABLE liste ADD CONSTRAINT FK_FCF22AF4A21BD112 FOREIGN KEY (personne_id) REFERENCES personne (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FCF22AF4A21BD112 ON liste (personne_id)');
        $this->addSql('ALTER TABLE personne DROP FOREIGN KEY FK_FCEC9EFE85441D8');
        $this->addSql('DROP INDEX IDX_FCEC9EFE85441D8 ON personne');
        $this->addSql('ALTER TABLE personne DROP liste_id, CHANGE sexe sexe VARCHAR(1) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE liste DROP FOREIGN KEY FK_FCF22AF4A21BD112');
        $this->addSql('DROP INDEX UNIQ_FCF22AF4A21BD112 ON liste');
        $this->addSql('ALTER TABLE liste DROP personne_id');
        $this->addSql('ALTER TABLE personne ADD liste_id INT NOT NULL, CHANGE sexe sexe VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE personne ADD CONSTRAINT FK_FCEC9EFE85441D8 FOREIGN KEY (liste_id) REFERENCES liste (id)');
        $this->addSql('CREATE INDEX IDX_FCEC9EFE85441D8 ON personne (liste_id)');
    }
}
