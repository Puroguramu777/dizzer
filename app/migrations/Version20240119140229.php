<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240119140229 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE author (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE author_music (author_id INT NOT NULL, music_id INT NOT NULL, INDEX IDX_DBDA0287F675F31B (author_id), INDEX IDX_DBDA0287399BBB13 (music_id), PRIMARY KEY(author_id, music_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE music (id INT AUTO_INCREMENT NOT NULL, music_name VARCHAR(255) NOT NULL, music_date_creation DATE NOT NULL, file_name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE author_music ADD CONSTRAINT FK_DBDA0287F675F31B FOREIGN KEY (author_id) REFERENCES author (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE author_music ADD CONSTRAINT FK_DBDA0287399BBB13 FOREIGN KEY (music_id) REFERENCES music (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE author_music DROP FOREIGN KEY FK_DBDA0287F675F31B');
        $this->addSql('ALTER TABLE author_music DROP FOREIGN KEY FK_DBDA0287399BBB13');
        $this->addSql('DROP TABLE author');
        $this->addSql('DROP TABLE author_music');
        $this->addSql('DROP TABLE music');
    }
}
