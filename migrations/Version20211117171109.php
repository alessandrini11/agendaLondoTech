<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211117171109 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE invite (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE invite_evenement (invite_id INT NOT NULL, evenement_id INT NOT NULL, INDEX IDX_9FF89C5BEA417747 (invite_id), INDEX IDX_9FF89C5BFD02F13 (evenement_id), PRIMARY KEY(invite_id, evenement_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE invite_evenement ADD CONSTRAINT FK_9FF89C5BEA417747 FOREIGN KEY (invite_id) REFERENCES invite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE invite_evenement ADD CONSTRAINT FK_9FF89C5BFD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE invite_evenement DROP FOREIGN KEY FK_9FF89C5BEA417747');
        $this->addSql('DROP TABLE invite');
        $this->addSql('DROP TABLE invite_evenement');
    }
}
