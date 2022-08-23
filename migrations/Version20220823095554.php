<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220823095554 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE go_out ADD state_id INT NOT NULL');
        $this->addSql('ALTER TABLE go_out ADD CONSTRAINT FK_6A94D5A25D83CC1 FOREIGN KEY (state_id) REFERENCES state (id)');
        $this->addSql('CREATE INDEX IDX_6A94D5A25D83CC1 ON go_out (state_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE go_out DROP FOREIGN KEY FK_6A94D5A25D83CC1');
        $this->addSql('DROP INDEX IDX_6A94D5A25D83CC1 ON go_out');
        $this->addSql('ALTER TABLE go_out DROP state_id');
    }
}
