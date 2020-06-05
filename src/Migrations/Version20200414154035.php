<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200414154035 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        //$this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE faq ADD category VARCHAR(200) NOT NULL, ADD queston VARCHAR(255) NOT NULL, ADD answer LONGTEXT NOT NULL, ADD status VARCHAR(60) NOT NULL, ADD date_publish DATETIME NOT NULL');
        $this->addSql('ALTER TABLE partner ADD name VARCHAR(120) NOT NULL, ADD description LONGTEXT NOT NULL, ADD service VARCHAR(120) NOT NULL, ADD logo VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE rencontre ADD artist_id INT DEFAULT NULL, ADD user_id INT DEFAULT NULL, ADD date DATETIME NOT NULL, ADD lat_lng VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE rencontre ADD CONSTRAINT FK_460C35EDB7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id)');
        $this->addSql('ALTER TABLE rencontre ADD CONSTRAINT FK_460C35EDA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_460C35EDB7970CF8 ON rencontre (artist_id)');
        $this->addSql('CREATE INDEX IDX_460C35EDA76ED395 ON rencontre (user_id)');
        $this->addSql('ALTER TABLE social ADD name VARCHAR(100) NOT NULL, ADD link VARCHAR(255) NOT NULL, ADD logo VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        //$this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE faq DROP category, DROP queston, DROP answer, DROP status, DROP date_publish');
        $this->addSql('ALTER TABLE partner DROP name, DROP description, DROP service, DROP logo');
        $this->addSql('ALTER TABLE rencontre DROP FOREIGN KEY FK_460C35EDB7970CF8');
        $this->addSql('ALTER TABLE rencontre DROP FOREIGN KEY FK_460C35EDA76ED395');
        $this->addSql('DROP INDEX IDX_460C35EDB7970CF8 ON rencontre');
        $this->addSql('DROP INDEX IDX_460C35EDA76ED395 ON rencontre');
        $this->addSql('ALTER TABLE rencontre DROP artist_id, DROP user_id, DROP date, DROP lat_lng');
        $this->addSql('ALTER TABLE social DROP name, DROP link, DROP logo');
    }
}
