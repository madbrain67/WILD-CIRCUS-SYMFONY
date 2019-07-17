<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190717072255 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE prices ADD categorie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE prices ADD CONSTRAINT FK_E4CB6D59BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categories_prices (id)');
        $this->addSql('CREATE INDEX IDX_E4CB6D59BCF5E72D ON prices (categorie_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE prices DROP FOREIGN KEY FK_E4CB6D59BCF5E72D');
        $this->addSql('DROP INDEX IDX_E4CB6D59BCF5E72D ON prices');
        $this->addSql('ALTER TABLE prices DROP categorie_id');
    }
}
