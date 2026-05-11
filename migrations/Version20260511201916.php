<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260511201916 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE deck (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, cree_le DATETIME NOT NULL, difficulte INT NOT NULL, user_id INT NOT NULL, INDEX IDX_4FAC3637A76ED395 (user_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE deck_tag (deck_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_E72958A7111948DC (deck_id), INDEX IDX_E72958A7BAD26311 (tag_id), PRIMARY KEY (deck_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE flashcard (id INT AUTO_INCREMENT NOT NULL, question LONGTEXT NOT NULL, answer LONGTEXT NOT NULL, cree_le DATETIME NOT NULL, deck_id INT NOT NULL, INDEX IDX_70511A09111948DC (deck_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE revision_log (id INT AUTO_INCREMENT NOT NULL, flashcards_count INT NOT NULL, duration_seconds INT NOT NULL, created_at DATETIME NOT NULL, user_id INT DEFAULT NULL, deck_id INT DEFAULT NULL, INDEX IDX_99F1649BA76ED395 (user_id), INDEX IDX_99F1649B111948DC (deck_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, updated_at DATETIME DEFAULT NULL, password VARCHAR(255) NOT NULL, image_name VARCHAR(255) DEFAULT NULL, roles JSON NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE deck ADD CONSTRAINT FK_4FAC3637A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE deck_tag ADD CONSTRAINT FK_E72958A7111948DC FOREIGN KEY (deck_id) REFERENCES deck (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE deck_tag ADD CONSTRAINT FK_E72958A7BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE flashcard ADD CONSTRAINT FK_70511A09111948DC FOREIGN KEY (deck_id) REFERENCES deck (id)');
        $this->addSql('ALTER TABLE revision_log ADD CONSTRAINT FK_99F1649BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE revision_log ADD CONSTRAINT FK_99F1649B111948DC FOREIGN KEY (deck_id) REFERENCES deck (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE deck DROP FOREIGN KEY FK_4FAC3637A76ED395');
        $this->addSql('ALTER TABLE deck_tag DROP FOREIGN KEY FK_E72958A7111948DC');
        $this->addSql('ALTER TABLE deck_tag DROP FOREIGN KEY FK_E72958A7BAD26311');
        $this->addSql('ALTER TABLE flashcard DROP FOREIGN KEY FK_70511A09111948DC');
        $this->addSql('ALTER TABLE revision_log DROP FOREIGN KEY FK_99F1649BA76ED395');
        $this->addSql('ALTER TABLE revision_log DROP FOREIGN KEY FK_99F1649B111948DC');
        $this->addSql('DROP TABLE deck');
        $this->addSql('DROP TABLE deck_tag');
        $this->addSql('DROP TABLE flashcard');
        $this->addSql('DROP TABLE revision_log');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE user');
    }
}
