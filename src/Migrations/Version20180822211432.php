<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180822211432 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE meta_tags (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, post_id_id INT NOT NULL, seo_title VARCHAR(255) NOT NULL, seo_description LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_FC1AE7659D86650F (user_id_id), UNIQUE INDEX UNIQ_FC1AE765E85F12B8 (post_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE meta_tags ADD CONSTRAINT FK_FC1AE7659D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE meta_tags ADD CONSTRAINT FK_FC1AE765E85F12B8 FOREIGN KEY (post_id_id) REFERENCES post (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE meta_tags DROP FOREIGN KEY FK_FC1AE7659D86650F');
        $this->addSql('DROP TABLE meta_tags');
        $this->addSql('DROP TABLE user');
    }
}
