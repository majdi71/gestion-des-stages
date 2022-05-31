<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220530202224 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE liste_stage ADD CONSTRAINT FK_DD8747C7A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_DD8747C7A76ED395 ON liste_stage (user_id)');
        $this->addSql('ALTER TABLE soutenance ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE soutenance ADD CONSTRAINT FK_4D59FF6EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_4D59FF6EA76ED395 ON soutenance (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE liste_stage DROP FOREIGN KEY FK_DD8747C7A76ED395');
        $this->addSql('DROP INDEX IDX_DD8747C7A76ED395 ON liste_stage');
        $this->addSql('ALTER TABLE soutenance DROP FOREIGN KEY FK_4D59FF6EA76ED395');
        $this->addSql('DROP INDEX IDX_4D59FF6EA76ED395 ON soutenance');
        $this->addSql('ALTER TABLE soutenance DROP user_id');
    }
}
