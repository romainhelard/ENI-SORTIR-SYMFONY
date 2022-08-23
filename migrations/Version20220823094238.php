<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220823094238 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE go_out ADD campus_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE go_out ADD CONSTRAINT FK_6A94D5A2AF5D55E1 FOREIGN KEY (campus_id) REFERENCES campus (id)');
        $this->addSql('CREATE INDEX IDX_6A94D5A2AF5D55E1 ON go_out (campus_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE go_out DROP FOREIGN KEY FK_6A94D5A2AF5D55E1');
        $this->addSql('DROP INDEX IDX_6A94D5A2AF5D55E1 ON go_out');
        $this->addSql('ALTER TABLE go_out DROP campus_id');
    }
}
