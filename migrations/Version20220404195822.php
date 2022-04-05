<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220404195822 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE inscription (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscription_students (inscription_id INT NOT NULL, students_id INT NOT NULL, INDEX IDX_DFCF2175DAC5993 (inscription_id), INDEX IDX_DFCF2171AD8D010 (students_id), PRIMARY KEY(inscription_id, students_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscription_events (inscription_id INT NOT NULL, events_id INT NOT NULL, INDEX IDX_5BB823335DAC5993 (inscription_id), INDEX IDX_5BB823339D6A1065 (events_id), PRIMARY KEY(inscription_id, events_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE inscription_students ADD CONSTRAINT FK_DFCF2175DAC5993 FOREIGN KEY (inscription_id) REFERENCES inscription (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE inscription_students ADD CONSTRAINT FK_DFCF2171AD8D010 FOREIGN KEY (students_id) REFERENCES students (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE inscription_events ADD CONSTRAINT FK_5BB823335DAC5993 FOREIGN KEY (inscription_id) REFERENCES inscription (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE inscription_events ADD CONSTRAINT FK_5BB823339D6A1065 FOREIGN KEY (events_id) REFERENCES events (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE inscription_students DROP FOREIGN KEY FK_DFCF2175DAC5993');
        $this->addSql('ALTER TABLE inscription_events DROP FOREIGN KEY FK_5BB823335DAC5993');
        $this->addSql('DROP TABLE inscription');
        $this->addSql('DROP TABLE inscription_students');
        $this->addSql('DROP TABLE inscription_events');
    }
}
