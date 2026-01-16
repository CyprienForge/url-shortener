<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260116151148 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__url AS SELECT id, long_url, short_url FROM url');
        $this->addSql('DROP TABLE url');
        $this->addSql('CREATE TABLE url (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, long_url VARCHAR(2048) NOT NULL, short_url VARCHAR(64) NOT NULL)');
        $this->addSql('INSERT INTO url (id, long_url, short_url) SELECT id, long_url, short_url FROM __temp__url');
        $this->addSql('DROP TABLE __temp__url');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__url AS SELECT id, long_url, short_url FROM url');
        $this->addSql('DROP TABLE url');
        $this->addSql('CREATE TABLE url (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, long_url VARCHAR(2048) NOT NULL, short_url INTEGER NOT NULL)');
        $this->addSql('INSERT INTO url (id, long_url, short_url) SELECT id, long_url, short_url FROM __temp__url');
        $this->addSql('DROP TABLE __temp__url');
    }
}
