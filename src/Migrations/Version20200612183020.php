<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200612183020 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, theme_id INT DEFAULT NULL, smoothie_id INT DEFAULT NULL, alt VARCHAR(255) NOT NULL, data LONGBLOB NOT NULL, width INT NOT NULL, height INT NOT NULL, length INT NOT NULL, filetype VARCHAR(255) NOT NULL, INDEX IDX_C53D045F59027487 (theme_id), INDEX IDX_C53D045F5F15819C (smoothie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE smoothie (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE smoothie_theme (smoothie_id INT NOT NULL, theme_id INT NOT NULL, INDEX IDX_353CB0455F15819C (smoothie_id), INDEX IDX_353CB04559027487 (theme_id), PRIMARY KEY(smoothie_id, theme_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE theme (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F59027487 FOREIGN KEY (theme_id) REFERENCES theme (id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F5F15819C FOREIGN KEY (smoothie_id) REFERENCES smoothie (id)');
        $this->addSql('ALTER TABLE smoothie_theme ADD CONSTRAINT FK_353CB0455F15819C FOREIGN KEY (smoothie_id) REFERENCES smoothie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE smoothie_theme ADD CONSTRAINT FK_353CB04559027487 FOREIGN KEY (theme_id) REFERENCES theme (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F5F15819C');
        $this->addSql('ALTER TABLE smoothie_theme DROP FOREIGN KEY FK_353CB0455F15819C');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F59027487');
        $this->addSql('ALTER TABLE smoothie_theme DROP FOREIGN KEY FK_353CB04559027487');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE smoothie');
        $this->addSql('DROP TABLE smoothie_theme');
        $this->addSql('DROP TABLE theme');
    }
}
