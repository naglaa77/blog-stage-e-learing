<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221007070316 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) DEFAULT NULL, slug VARCHAR(255) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, body LONGTEXT DEFAULT NULL, published TINYINT(1) DEFAULT NULL, created_at DATETIME DEFAULT NULL, description_art VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_category (article_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_53A4EDAA7294869C (article_id), INDEX IDX_53A4EDAA12469DE2 (category_id), PRIMARY KEY(article_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, title_cat VARCHAR(255) NOT NULL, description_cat LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, article_id INT DEFAULT NULL, author_com VARCHAR(255) NOT NULL, content_com LONGTEXT NOT NULL, createdat_com DATETIME DEFAULT NULL, INDEX IDX_9474526C7294869C (article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact_us (id INT AUTO_INCREMENT NOT NULL, nom_contact VARCHAR(255) DEFAULT NULL, email_contact VARCHAR(255) DEFAULT NULL, message_contact LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cours (id INT AUTO_INCREMENT NOT NULL, type_id INT DEFAULT NULL, title_c VARCHAR(255) DEFAULT NULL, description_c VARCHAR(255) DEFAULT NULL, slug_c VARCHAR(255) DEFAULT NULL, image_c VARCHAR(400) DEFAULT NULL, about_c LONGTEXT DEFAULT NULL, published_c TINYINT(1) DEFAULT NULL, createdat_c DATETIME DEFAULT NULL, link1_c VARCHAR(600) DEFAULT NULL, link2_c VARCHAR(600) DEFAULT NULL, modules1 VARCHAR(500) DEFAULT NULL, modules2 VARCHAR(500) DEFAULT NULL, modules3 VARCHAR(500) DEFAULT NULL, modules4 VARCHAR(500) DEFAULT NULL, duration_c VARCHAR(255) DEFAULT NULL, cost_c VARCHAR(255) DEFAULT NULL, level_c VARCHAR(255) DEFAULT NULL, certificate_c VARCHAR(255) DEFAULT NULL, modules_n INT DEFAULT NULL, INDEX IDX_FDCA8C9CC54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formulaire (id INT AUTO_INCREMENT NOT NULL, titre_site VARCHAR(100) DEFAULT NULL, nom_user VARCHAR(100) NOT NULL, prenom_user VARCHAR(100) NOT NULL, service_user VARCHAR(100) DEFAULT NULL, mail_user VARCHAR(100) NOT NULL, tel_user DOUBLE PRECISION DEFAULT NULL, projet_nom VARCHAR(50) DEFAULT NULL, type_form VARCHAR(100) DEFAULT NULL, public_vise VARCHAR(100) DEFAULT NULL, public_vise2 VARCHAR(255) DEFAULT NULL, descriptif_form LONGTEXT NOT NULL, porteur_form VARCHAR(100) DEFAULT NULL, responsable_form VARCHAR(100) NOT NULL, url_form VARCHAR(255) DEFAULT NULL, nom_contributeurs VARCHAR(100) DEFAULT NULL, externalisee_form TINYINT(1) NOT NULL, concurrence_form TINYINT(1) NOT NULL, contenus_form LONGTEXT DEFAULT NULL, financement_form TINYINT(1) NOT NULL, date_fin_form DATE DEFAULT NULL, date_archivage_form DATE DEFAULT NULL, statistique_form TINYINT(1) DEFAULT NULL, recharche_form TINYINT(1) DEFAULT NULL, actualites_form TINYINT(1) DEFAULT NULL, formulaires_form TINYINT(1) DEFAULT NULL, partage_form TINYINT(1) DEFAULT NULL, media_form TINYINT(1) DEFAULT NULL, multilangue_form TINYINT(1) DEFAULT NULL, multilangue_form2 VARCHAR(100) DEFAULT NULL, autre_form TINYINT(1) DEFAULT NULL, autre_form2 VARCHAR(255) DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, date_status DATETIME DEFAULT NULL, comments_status LONGTEXT DEFAULT NULL, approve_status TINYINT(1) DEFAULT NULL, multilangue_form3 VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ressources (id INT AUTO_INCREMENT NOT NULL, topic_id INT DEFAULT NULL, title_res VARCHAR(255) DEFAULT NULL, description_res VARCHAR(255) DEFAULT NULL, link_res VARCHAR(500) DEFAULT NULL, INDEX IDX_6A2CD5C71F55203D (topic_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE topic (id INT AUTO_INCREMENT NOT NULL, title_top VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, title_t VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, prenom VARCHAR(255) DEFAULT NULL, password VARCHAR(255) DEFAULT NULL, is_verified TINYINT(1) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, uid VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, mailperso VARCHAR(255) DEFAULT NULL, mail VARCHAR(255) DEFAULT NULL, tel VARCHAR(255) DEFAULT NULL, datenais DATE NOT NULL, genre VARCHAR(255) DEFAULT NULL, nationalite VARCHAR(255) DEFAULT NULL, statut TINYINT(1) DEFAULT NULL, diplome_prepare VARCHAR(400) DEFAULT NULL, derniere_diplome VARCHAR(400) DEFAULT NULL, derniere_filiere VARCHAR(400) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article_category ADD CONSTRAINT FK_53A4EDAA7294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_category ADD CONSTRAINT FK_53A4EDAA12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C7294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE cours ADD CONSTRAINT FK_FDCA8C9CC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE ressources ADD CONSTRAINT FK_6A2CD5C71F55203D FOREIGN KEY (topic_id) REFERENCES topic (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article_category DROP FOREIGN KEY FK_53A4EDAA7294869C');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C7294869C');
        $this->addSql('ALTER TABLE article_category DROP FOREIGN KEY FK_53A4EDAA12469DE2');
        $this->addSql('ALTER TABLE ressources DROP FOREIGN KEY FK_6A2CD5C71F55203D');
        $this->addSql('ALTER TABLE cours DROP FOREIGN KEY FK_FDCA8C9CC54C8C93');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE article_category');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE contact_us');
        $this->addSql('DROP TABLE cours');
        $this->addSql('DROP TABLE formulaire');
        $this->addSql('DROP TABLE ressources');
        $this->addSql('DROP TABLE topic');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
