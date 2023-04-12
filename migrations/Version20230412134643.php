<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230412134643 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE optreden2 (id INT AUTO_INCREMENT NOT NULL, poppodium_id INT NOT NULL, omschrijving VARCHAR(100) NOT NULL, datum DATE NOT NULL, prijs INT NOT NULL, ticket_url VARCHAR(100) NOT NULL, afbeelding_url VARCHAR(100) NOT NULL, INDEX IDX_F6D15B2A2EEBB18 (poppodium_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE optreden2 ADD CONSTRAINT FK_F6D15B2A2EEBB18 FOREIGN KEY (poppodium_id) REFERENCES poppodium (id)');
        $this->addSql('ALTER TABLE artiest ADD aartiest_id INT NOT NULL, ADD vvoorprogramma_id INT NOT NULL, ADD artiest2_id INT NOT NULL, ADD voorprogramma2_id INT NOT NULL');
        $this->addSql('ALTER TABLE artiest ADD CONSTRAINT FK_A15D5CB8AED85528 FOREIGN KEY (artiest_id) REFERENCES optreden (id)');
        $this->addSql('ALTER TABLE artiest ADD CONSTRAINT FK_A15D5CB8E017CE10 FOREIGN KEY (voorprogramma_id) REFERENCES optreden (id)');
        $this->addSql('ALTER TABLE artiest ADD CONSTRAINT FK_A15D5CB8B78FC54A FOREIGN KEY (aartiest_id) REFERENCES optreden (id)');
        $this->addSql('ALTER TABLE artiest ADD CONSTRAINT FK_A15D5CB86C30D83 FOREIGN KEY (vvoorprogramma_id) REFERENCES optreden (id)');
        $this->addSql('ALTER TABLE artiest ADD CONSTRAINT FK_A15D5CB8F1C2F2D2 FOREIGN KEY (artiest2_id) REFERENCES optreden2 (id)');
        $this->addSql('ALTER TABLE artiest ADD CONSTRAINT FK_A15D5CB8D98E85D7 FOREIGN KEY (voorprogramma2_id) REFERENCES optreden2 (id)');
        $this->addSql('CREATE INDEX IDX_A15D5CB8AED85528 ON artiest (artiest_id)');
        $this->addSql('CREATE INDEX IDX_A15D5CB8E017CE10 ON artiest (voorprogramma_id)');
        $this->addSql('CREATE INDEX IDX_A15D5CB8B78FC54A ON artiest (aartiest_id)');
        $this->addSql('CREATE INDEX IDX_A15D5CB86C30D83 ON artiest (vvoorprogramma_id)');
        $this->addSql('CREATE INDEX IDX_A15D5CB8F1C2F2D2 ON artiest (artiest2_id)');
        $this->addSql('CREATE INDEX IDX_A15D5CB8D98E85D7 ON artiest (voorprogramma2_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artiest DROP FOREIGN KEY FK_A15D5CB8F1C2F2D2');
        $this->addSql('ALTER TABLE artiest DROP FOREIGN KEY FK_A15D5CB8D98E85D7');
        $this->addSql('ALTER TABLE optreden2 DROP FOREIGN KEY FK_F6D15B2A2EEBB18');
        $this->addSql('DROP TABLE optreden2');
        $this->addSql('ALTER TABLE artiest DROP FOREIGN KEY FK_A15D5CB8AED85528');
        $this->addSql('ALTER TABLE artiest DROP FOREIGN KEY FK_A15D5CB8E017CE10');
        $this->addSql('ALTER TABLE artiest DROP FOREIGN KEY FK_A15D5CB8B78FC54A');
        $this->addSql('ALTER TABLE artiest DROP FOREIGN KEY FK_A15D5CB86C30D83');
        $this->addSql('DROP INDEX IDX_A15D5CB8AED85528 ON artiest');
        $this->addSql('DROP INDEX IDX_A15D5CB8E017CE10 ON artiest');
        $this->addSql('DROP INDEX IDX_A15D5CB8B78FC54A ON artiest');
        $this->addSql('DROP INDEX IDX_A15D5CB86C30D83 ON artiest');
        $this->addSql('DROP INDEX IDX_A15D5CB8F1C2F2D2 ON artiest');
        $this->addSql('DROP INDEX IDX_A15D5CB8D98E85D7 ON artiest');
        $this->addSql('ALTER TABLE artiest DROP aartiest_id, DROP vvoorprogramma_id, DROP artiest2_id, DROP voorprogramma2_id');
    }
}
