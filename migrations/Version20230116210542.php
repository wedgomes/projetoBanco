<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230116210542 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE gerente ADD agencia_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE gerente ADD CONSTRAINT FK_306C486DA6F796BE FOREIGN KEY (agencia_id) REFERENCES agencia (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_306C486DA6F796BE ON gerente (agencia_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE gerente DROP FOREIGN KEY FK_306C486DA6F796BE');
        $this->addSql('DROP INDEX UNIQ_306C486DA6F796BE ON gerente');
        $this->addSql('ALTER TABLE gerente DROP agencia_id');
    }
}
