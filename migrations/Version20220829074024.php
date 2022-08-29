<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220829074024 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_go_out (user_id INT NOT NULL, go_out_id INT NOT NULL, INDEX IDX_FC6CE9FA76ED395 (user_id), INDEX IDX_FC6CE9FB7902A53 (go_out_id), PRIMARY KEY(user_id, go_out_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_go_out ADD CONSTRAINT FK_FC6CE9FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_go_out ADD CONSTRAINT FK_FC6CE9FB7902A53 FOREIGN KEY (go_out_id) REFERENCES go_out (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_go_out DROP FOREIGN KEY FK_FC6CE9FA76ED395');
        $this->addSql('ALTER TABLE user_go_out DROP FOREIGN KEY FK_FC6CE9FB7902A53');
        $this->addSql('DROP TABLE user_go_out');
    }
}
