<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220329111233 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Ajout des tables et relations';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE children (id INT AUTO_INCREMENT NOT NULL, class_id INT NOT NULL, firstname VARCHAR(100) NOT NULL, lastname VARCHAR(100) NOT NULL, age INT DEFAULT NULL, is_externe TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_A197B1BAEA000B10 (class_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE children_teacher (children_id INT NOT NULL, teacher_id INT NOT NULL, INDEX IDX_48AE590E3D3D2749 (children_id), INDEX IDX_48AE590E41807E1D (teacher_id), PRIMARY KEY(children_id, teacher_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE children_user (children_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_604FBCC53D3D2749 (children_id), INDEX IDX_604FBCC5A76ED395 (user_id), PRIMARY KEY(children_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classroom (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(3) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE teacher (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(100) DEFAULT NULL, lastname VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE teacher_classroom (teacher_id INT NOT NULL, classroom_id INT NOT NULL, INDEX IDX_33167C8641807E1D (teacher_id), INDEX IDX_33167C866278D5A8 (classroom_id), PRIMARY KEY(teacher_id, classroom_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE children ADD CONSTRAINT FK_A197B1BAEA000B10 FOREIGN KEY (class_id) REFERENCES classroom (id)');
        $this->addSql('ALTER TABLE children_teacher ADD CONSTRAINT FK_48AE590E3D3D2749 FOREIGN KEY (children_id) REFERENCES children (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE children_teacher ADD CONSTRAINT FK_48AE590E41807E1D FOREIGN KEY (teacher_id) REFERENCES teacher (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE children_user ADD CONSTRAINT FK_604FBCC53D3D2749 FOREIGN KEY (children_id) REFERENCES children (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE children_user ADD CONSTRAINT FK_604FBCC5A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE teacher_classroom ADD CONSTRAINT FK_33167C8641807E1D FOREIGN KEY (teacher_id) REFERENCES teacher (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE teacher_classroom ADD CONSTRAINT FK_33167C866278D5A8 FOREIGN KEY (classroom_id) REFERENCES classroom (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE children_teacher DROP FOREIGN KEY FK_48AE590E3D3D2749');
        $this->addSql('ALTER TABLE children_user DROP FOREIGN KEY FK_604FBCC53D3D2749');
        $this->addSql('ALTER TABLE children DROP FOREIGN KEY FK_A197B1BAEA000B10');
        $this->addSql('ALTER TABLE teacher_classroom DROP FOREIGN KEY FK_33167C866278D5A8');
        $this->addSql('ALTER TABLE children_teacher DROP FOREIGN KEY FK_48AE590E41807E1D');
        $this->addSql('ALTER TABLE teacher_classroom DROP FOREIGN KEY FK_33167C8641807E1D');
        $this->addSql('DROP TABLE children');
        $this->addSql('DROP TABLE children_teacher');
        $this->addSql('DROP TABLE children_user');
        $this->addSql('DROP TABLE classroom');
        $this->addSql('DROP TABLE teacher');
        $this->addSql('DROP TABLE teacher_classroom');
    }
}
