<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230905131723 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955AB014612');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495519EB6921');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849559763F080');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE place_disponible');
        $this->addSql('DROP INDEX IDX_42C84955AB014612 ON reservation');
        $this->addSql('DROP INDEX IDX_42C849559763F080 ON reservation');
        $this->addSql('DROP INDEX IDX_42C8495519EB6921 ON reservation');
        $this->addSql('ALTER TABLE reservation ADD creneau_horaire TIME NOT NULL, DROP client_id, DROP clients_id, DROP places_disponibles_id, CHANGE date_reservation date_reservation DATE NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, prenom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, telephone INT DEFAULT NULL, nb_couvert_defaut INT DEFAULT NULL, allergie VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE place_disponible (id INT AUTO_INCREMENT NOT NULL, nb_place INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE reservation ADD client_id INT DEFAULT NULL, ADD clients_id INT DEFAULT NULL, ADD places_disponibles_id INT DEFAULT NULL, DROP creneau_horaire, CHANGE date_reservation date_reservation DATETIME NOT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849559763F080 FOREIGN KEY (places_disponibles_id) REFERENCES place_disponible (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955AB014612 FOREIGN KEY (clients_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495519EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_42C84955AB014612 ON reservation (clients_id)');
        $this->addSql('CREATE INDEX IDX_42C849559763F080 ON reservation (places_disponibles_id)');
        $this->addSql('CREATE INDEX IDX_42C8495519EB6921 ON reservation (client_id)');
    }
}
