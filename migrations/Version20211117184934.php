<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211117184934 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE evenement_invite (evenement_id INT NOT NULL, invite_id INT NOT NULL, INDEX IDX_7417C055FD02F13 (evenement_id), INDEX IDX_7417C055EA417747 (invite_id), PRIMARY KEY(evenement_id, invite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE evenement_invite ADD CONSTRAINT FK_7417C055FD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE evenement_invite ADD CONSTRAINT FK_7417C055EA417747 FOREIGN KEY (invite_id) REFERENCES invite (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE invite_evenement');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE invite_evenement (invite_id INT NOT NULL, evenement_id INT NOT NULL, INDEX IDX_9FF89C5BEA417747 (invite_id), INDEX IDX_9FF89C5BFD02F13 (evenement_id), PRIMARY KEY(invite_id, evenement_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE invite_evenement ADD CONSTRAINT FK_9FF89C5BEA417747 FOREIGN KEY (invite_id) REFERENCES invite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE invite_evenement ADD CONSTRAINT FK_9FF89C5BFD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE evenement_invite');
    }
}
