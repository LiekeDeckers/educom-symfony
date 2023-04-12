<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230412131241 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artiest ADD aartiest_id INT NOT NULL, ADD vvoorprogramma_id INT NOT NULL');
        $this->addSql('ALTER TABLE artiest ADD CONSTRAINT FK_A15D5CB8AED85528 FOREIGN KEY (artiest_id) REFERENCES optreden (id)');
        $this->addSql('ALTER TABLE artiest ADD CONSTRAINT FK_A15D5CB8E017CE10 FOREIGN KEY (voorprogramma_id) REFERENCES optreden (id)');
        $this->addSql('ALTER TABLE artiest ADD CONSTRAINT FK_A15D5CB8B78FC54A FOREIGN KEY (aartiest_id) REFERENCES optreden (id)');
        $this->addSql('ALTER TABLE artiest ADD CONSTRAINT FK_A15D5CB86C30D83 FOREIGN KEY (vvoorprogramma_id) REFERENCES optreden (id)');
        $this->addSql('CREATE INDEX IDX_A15D5CB8AED85528 ON artiest (artiest_id)');
        $this->addSql('CREATE INDEX IDX_A15D5CB8E017CE10 ON artiest (voorprogramma_id)');
        $this->addSql('CREATE INDEX IDX_A15D5CB8B78FC54A ON artiest (aartiest_id)');
        $this->addSql('CREATE INDEX IDX_A15D5CB86C30D83 ON artiest (vvoorprogramma_id)');
        $this->addSql('ALTER TABLE optreden ADD artiest_id INT NOT NULL, ADD voorprogramma_id INT NOT NULL');
        $this->addSql('ALTER TABLE optreden ADD CONSTRAINT FK_6286F65DAED85528 FOREIGN KEY (artiest_id) REFERENCES artiest (id)');
        $this->addSql('ALTER TABLE optreden ADD CONSTRAINT FK_6286F65DE017CE10 FOREIGN KEY (voorprogramma_id) REFERENCES artiest (id)');
        $this->addSql('CREATE INDEX IDX_6286F65DAED85528 ON optreden (artiest_id)');
        $this->addSql('CREATE INDEX IDX_6286F65DE017CE10 ON optreden (voorprogramma_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artiest DROP FOREIGN KEY FK_A15D5CB8AED85528');
        $this->addSql('ALTER TABLE artiest DROP FOREIGN KEY FK_A15D5CB8E017CE10');
        $this->addSql('ALTER TABLE artiest DROP FOREIGN KEY FK_A15D5CB8B78FC54A');
        $this->addSql('ALTER TABLE artiest DROP FOREIGN KEY FK_A15D5CB86C30D83');
        $this->addSql('DROP INDEX IDX_A15D5CB8AED85528 ON artiest');
        $this->addSql('DROP INDEX IDX_A15D5CB8E017CE10 ON artiest');
        $this->addSql('DROP INDEX IDX_A15D5CB8B78FC54A ON artiest');
        $this->addSql('DROP INDEX IDX_A15D5CB86C30D83 ON artiest');
        $this->addSql('ALTER TABLE artiest DROP aartiest_id, DROP vvoorprogramma_id');
        $this->addSql('ALTER TABLE optreden DROP FOREIGN KEY FK_6286F65DAED85528');
        $this->addSql('ALTER TABLE optreden DROP FOREIGN KEY FK_6286F65DE017CE10');
        $this->addSql('DROP INDEX IDX_6286F65DAED85528 ON optreden');
        $this->addSql('DROP INDEX IDX_6286F65DE017CE10 ON optreden');
        $this->addSql('ALTER TABLE optreden DROP artiest_id, DROP voorprogramma_id');
    }
}
