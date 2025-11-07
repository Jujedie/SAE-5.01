<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTablePosteblog extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type'           => 'SERIAL',
				'unsigned'       => true,
				'auto_increment' => true,
				'unique'         => true,
			],
			'titre' => [
				'type'       => 'TEXT',
				'null'       => false,
			],
			'type' => [
				'type'=> 'VARCHAR',
				'constraint' => '50',
				'null' => false,
			],
			'date' => [
				'type'=> 'TIMESTAMP',
				'null' => true,
			],
			'contenu' => [
				'type'=> 'TEXT',
				'null' => false,
			],
			'image' => [
				'type'=> 'TEXT',
				'null' => false,
			],
			'id_utilisateur' => [
				'type'=> 'INT',
				'null' => false,
			],
		]);

		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('id_utilisateur', 'utilisateur', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('posteblog');

		$this->db->query('ALTER TABLE posteblog ALTER COLUMN date SET DEFAULT CURRENT_TIMESTAMP;');
	}

	public function down()
	{
		$this->forge->dropTable('posteblog');
	}
}
