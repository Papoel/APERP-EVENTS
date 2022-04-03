<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220403125007 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE students_user (students_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_28EF1A821AD8D010 (students_id), INDEX IDX_28EF1A82A76ED395 (user_id), PRIMARY KEY(students_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE students_user ADD CONSTRAINT FK_28EF1A821AD8D010 FOREIGN KEY (students_id) REFERENCES students (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE students_user ADD CONSTRAINT FK_28EF1A82A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE user_students');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_students (user_id INT NOT NULL, students_id INT NOT NULL, INDEX IDX_44E469B2A76ED395 (user_id), INDEX IDX_44E469B21AD8D010 (students_id), PRIMARY KEY(user_id, students_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE user_students ADD CONSTRAINT FK_44E469B2A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_students ADD CONSTRAINT FK_44E469B21AD8D010 FOREIGN KEY (students_id) REFERENCES students (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE students_user');
    }
}
