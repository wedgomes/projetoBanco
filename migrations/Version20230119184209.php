<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230119184209 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE transacao (id INT AUTO_INCREMENT NOT NULL, conta_destino_id INT DEFAULT NULL, conta_origem_id INT DEFAULT NULL, valor DOUBLE PRECISION NOT NULL, INDEX IDX_6C9E60CE88825F03 (conta_destino_id), INDEX IDX_6C9E60CE332BCA77 (conta_origem_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE transacao ADD CONSTRAINT FK_6C9E60CE88825F03 FOREIGN KEY (conta_destino_id) REFERENCES conta (id)');
        $this->addSql('ALTER TABLE transacao ADD CONSTRAINT FK_6C9E60CE332BCA77 FOREIGN KEY (conta_origem_id) REFERENCES conta (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE transacao DROP FOREIGN KEY FK_6C9E60CE88825F03');
        $this->addSql('ALTER TABLE transacao DROP FOREIGN KEY FK_6C9E60CE332BCA77');
        $this->addSql('DROP TABLE transacao');
    }
}
