<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260511174417 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE revision_log DROP FOREIGN KEY `FK_99F1649B111948DC`');
        $this->addSql('ALTER TABLE revision_log ADD CONSTRAINT FK_99F1649B111948DC FOREIGN KEY (deck_id) REFERENCES deck (id) ON DELETE SET NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE revision_log DROP FOREIGN KEY FK_99F1649B111948DC');
        $this->addSql('ALTER TABLE revision_log ADD CONSTRAINT `FK_99F1649B111948DC` FOREIGN KEY (deck_id) REFERENCES deck (id)');
    }
}
