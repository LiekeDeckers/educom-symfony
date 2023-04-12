<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230412123413 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE optreden (id INT AUTO_INCREMENT NOT NULL, poppodium_id INT NOT NULL, omschrijving VARCHAR(100) NOT NULL, datum DATE NOT NULL, prijs INT NOT NULL, ticket_url VARCHAR(100) NOT NULL, afbeelding_url VARCHAR(100) NOT NULL, INDEX IDX_6286F65DA2EEBB18 (poppodium_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE optreden ADD CONSTRAINT FK_6286F65DA2EEBB18 FOREIGN KEY (poppodium_id) REFERENCES poppodium (id)');
        $this->addSql('ALTER TABLE artiest ADD artiest_id INT NOT NULL, ADD voorprogramma_id INT NOT NULL');
        $this->addSql('ALTER TABLE artiest ADD CONSTRAINT FK_A15D5CB8AED85528 FOREIGN KEY (artiest_id) REFERENCES optreden (id)');
        $this->addSql('ALTER TABLE artiest ADD CONSTRAINT FK_A15D5CB8E017CE10 FOREIGN KEY (voorprogramma_id) REFERENCES optreden (id)');
        $this->addSql('CREATE INDEX IDX_A15D5CB8AED85528 ON artiest (artiest_id)');
        $this->addSql('CREATE INDEX IDX_A15D5CB8E017CE10 ON artiest (voorprogramma_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artiest DROP FOREIGN KEY FK_A15D5CB8AED85528');
        $this->addSql('ALTER TABLE artiest DROP FOREIGN KEY FK_A15D5CB8E017CE10');
        $this->addSql('ALTER TABLE optreden DROP FOREIGN KEY FK_6286F65DA2EEBB18');
        $this->addSql('DROP TABLE optreden');
        $this->addSql('DROP INDEX IDX_A15D5CB8AED85528 ON artiest');
        $this->addSql('DROP INDEX IDX_A15D5CB8E017CE10 ON artiest');
        $this->addSql('ALTER TABLE artiest DROP artiest_id, DROP voorprogramma_id');
    }
}
