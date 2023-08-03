<?php

declare(strict_types = 1);

namespace Database\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230803165647 extends AbstractMigration
{
	public function getDescription(): string
	{
		return '';
	}

	public function up(Schema $schema): void
	{
		$this->addSql('CREATE SEQUENCE "user_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
		$this->addSql('CREATE TABLE "user" (id INT NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, role INT NOT NULL, last_logged_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
		$this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649F85E0677 ON "user" (username)');
	}

	public function down(Schema $schema): void
	{
		$this->addSql('CREATE SCHEMA public');
		$this->addSql('DROP SEQUENCE "user_id_seq" CASCADE');
		$this->addSql('DROP TABLE "user"');
	}
}
