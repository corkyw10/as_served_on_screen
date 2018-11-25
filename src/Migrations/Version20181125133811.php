<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181125133811 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE film_restaurants (id INT AUTO_INCREMENT NOT NULL, film_id INT NOT NULL, name VARCHAR(220) NOT NULL, street_address VARCHAR(220) NOT NULL, city VARCHAR(220) NOT NULL, post_code VARCHAR(220) NOT NULL, country VARCHAR(220) NOT NULL, lat NUMERIC(18, 14) NOT NULL, lng NUMERIC(18, 14) NOT NULL, osm_id VARCHAR(220) DEFAULT NULL, url VARCHAR(220) DEFAULT NULL, image_url VARCHAR(220) NOT NULL, INDEX IDX_D53B5A2B567F5183 (film_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE film_restaurants ADD CONSTRAINT FK_D53B5A2B567F5183 FOREIGN KEY (film_id) REFERENCES films (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE film_restaurants');
    }
}
