<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181125134306 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE tv_people (id INT AUTO_INCREMENT NOT NULL, person_id INT NOT NULL, episode_id INT NOT NULL, UNIQUE INDEX UNIQ_6D304CBB217BBB47 (person_id), UNIQUE INDEX UNIQ_6D304CBB362B62A0 (episode_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tv_people ADD CONSTRAINT FK_6D304CBB217BBB47 FOREIGN KEY (person_id) REFERENCES people (id)');
        $this->addSql('ALTER TABLE tv_people ADD CONSTRAINT FK_6D304CBB362B62A0 FOREIGN KEY (episode_id) REFERENCES episodes (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE tv_people');
    }
}
