<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260421204522 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE deck_tag (deck_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_E72958A7111948DC (deck_id), INDEX IDX_E72958A7BAD26311 (tag_id), PRIMARY KEY (deck_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE deck_tag ADD CONSTRAINT FK_E72958A7111948DC FOREIGN KEY (deck_id) REFERENCES deck (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE deck_tag ADD CONSTRAINT FK_E72958A7BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE flashcard_tag DROP FOREIGN KEY `FK_D1FEDA7CBAD26311`');
        $this->addSql('ALTER TABLE flashcard_tag DROP FOREIGN KEY `FK_D1FEDA7CC5D16576`');
        $this->addSql('DROP TABLE flashcard_tag');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE flashcard_tag (flashcard_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_D1FEDA7CC5D16576 (flashcard_id), INDEX IDX_D1FEDA7CBAD26311 (tag_id), PRIMARY KEY (flashcard_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE flashcard_tag ADD CONSTRAINT `FK_D1FEDA7CBAD26311` FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE flashcard_tag ADD CONSTRAINT `FK_D1FEDA7CC5D16576` FOREIGN KEY (flashcard_id) REFERENCES flashcard (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE deck_tag DROP FOREIGN KEY FK_E72958A7111948DC');
        $this->addSql('ALTER TABLE deck_tag DROP FOREIGN KEY FK_E72958A7BAD26311');
        $this->addSql('DROP TABLE deck_tag');
    }
}
