<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231218115509 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE escale DROP FOREIGN KEY FK_C39FEDD3D840FD82');
        $this->addSql('DROP INDEX IDX_C39FEDD3D840FD82 ON escale');
        $this->addSql('ALTER TABLE escale ADD idnavire INT NOT NULL, DROP navire_id');
        $this->addSql('ALTER TABLE escale ADD CONSTRAINT FK_C39FEDD36A50BD94 FOREIGN KEY (idnavire) REFERENCES navire (id)');
        $this->addSql('CREATE INDEX IDX_C39FEDD36A50BD94 ON escale (idnavire)');
        $this->addSql('ALTER TABLE navire ADD CONSTRAINT FK_EED1038C54C8C93 FOREIGN KEY (type_id) REFERENCES ais_ship_type (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE escale DROP FOREIGN KEY FK_C39FEDD36A50BD94');
        $this->addSql('DROP INDEX IDX_C39FEDD36A50BD94 ON escale');
        $this->addSql('ALTER TABLE escale ADD navire_id INT DEFAULT NULL, DROP idnavire');
        $this->addSql('ALTER TABLE escale ADD CONSTRAINT FK_C39FEDD3D840FD82 FOREIGN KEY (navire_id) REFERENCES navire (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_C39FEDD3D840FD82 ON escale (navire_id)');
        $this->addSql('ALTER TABLE navire DROP FOREIGN KEY FK_EED1038C54C8C93');
    }
}
