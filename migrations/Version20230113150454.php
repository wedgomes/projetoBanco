<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230113150454 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agencia ADD endereco VARCHAR(255) NOT NULL, ADD nome VARCHAR(255) NOT NULL, DROP cidade, DROP rua, DROP bairro, DROP estado, DROP cep');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agencia ADD cidade VARCHAR(255) NOT NULL, ADD rua VARCHAR(255) NOT NULL, ADD bairro VARCHAR(255) NOT NULL, ADD estado VARCHAR(255) NOT NULL, ADD cep VARCHAR(255) NOT NULL, DROP endereco, DROP nome');
    }
}
