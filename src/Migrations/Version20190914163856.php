<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190914163856 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE danse (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, type VARCHAR(50) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE danse_eleve (danse_id INT NOT NULL, eleve_id INT NOT NULL, INDEX IDX_D04DCD7536D95F (danse_id), INDEX IDX_D04DCD7A6CC7B2 (eleve_id), PRIMARY KEY(danse_id, eleve_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE eleve (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, prenom VARCHAR(100) DEFAULT NULL, sexe VARCHAR(1) NOT NULL, date_naissance DATE DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, cp VARCHAR(5) DEFAULT NULL, ville VARCHAR(100) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, tel_fixe VARCHAR(10) DEFAULT NULL, tel_portable VARCHAR(10) DEFAULT NULL, taille SMALLINT DEFAULT NULL, station_metro VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE danse_eleve ADD CONSTRAINT FK_D04DCD7536D95F FOREIGN KEY (danse_id) REFERENCES danse (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE danse_eleve ADD CONSTRAINT FK_D04DCD7A6CC7B2 FOREIGN KEY (eleve_id) REFERENCES eleve (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE danse_eleve DROP FOREIGN KEY FK_D04DCD7536D95F');
        $this->addSql('ALTER TABLE danse_eleve DROP FOREIGN KEY FK_D04DCD7A6CC7B2');
        $this->addSql('DROP TABLE danse');
        $this->addSql('DROP TABLE danse_eleve');
        $this->addSql('DROP TABLE eleve');
    }
}
