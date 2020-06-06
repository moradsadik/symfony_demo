<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200606151502 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE rencontre DROP CONSTRAINT fk_460c35eda76ed395');
        $this->addSql('DROP INDEX idx_460c35eda76ed395');
        $this->addSql('ALTER TABLE rencontre RENAME COLUMN user_id TO utilisateur_id');
        $this->addSql('ALTER TABLE rencontre ADD CONSTRAINT FK_460C35EDFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_460C35EDFB88E14F ON rencontre (utilisateur_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE rencontre DROP CONSTRAINT FK_460C35EDFB88E14F');
        $this->addSql('DROP INDEX IDX_460C35EDFB88E14F');
        $this->addSql('ALTER TABLE rencontre RENAME COLUMN utilisateur_id TO user_id');
        $this->addSql('ALTER TABLE rencontre ADD CONSTRAINT fk_460c35eda76ed395 FOREIGN KEY (user_id) REFERENCES utilisateur (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_460c35eda76ed395 ON rencontre (user_id)');
    }
}
