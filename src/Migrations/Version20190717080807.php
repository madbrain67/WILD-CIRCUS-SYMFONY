<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190717080807 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE prices ADD groups_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE prices ADD CONSTRAINT FK_E4CB6D59F373DCF FOREIGN KEY (groups_id) REFERENCES groups_prices (id)');
        $this->addSql('CREATE INDEX IDX_E4CB6D59F373DCF ON prices (groups_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE prices DROP FOREIGN KEY FK_E4CB6D59F373DCF');
        $this->addSql('DROP INDEX IDX_E4CB6D59F373DCF ON prices');
        $this->addSql('ALTER TABLE prices DROP groups_id');
    }
}
