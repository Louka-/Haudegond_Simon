<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210511071928 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE equipe_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE joueur_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE equipe (id INT NOT NULL, nom VARCHAR(45) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE joueur (id INT NOT NULL, relation_id INT DEFAULT NULL, nom VARCHAR(45) NOT NULL, photo VARCHAR(255) NOT NULL, pays VARCHAR(45) NOT NULL, presentation VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_FD71A9C53256915B ON joueur (relation_id)');
        $this->addSql('ALTER TABLE joueur ADD CONSTRAINT FK_FD71A9C53256915B FOREIGN KEY (relation_id) REFERENCES equipe (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE joueur DROP CONSTRAINT FK_FD71A9C53256915B');
        $this->addSql('DROP SEQUENCE equipe_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE joueur_id_seq CASCADE');
        $this->addSql('DROP TABLE equipe');
        $this->addSql('DROP TABLE joueur');
    }
}
