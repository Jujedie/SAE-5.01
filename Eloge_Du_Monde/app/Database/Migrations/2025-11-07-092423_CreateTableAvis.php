<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableAvis extends Migration
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
			'note' => [
				'type'       => 'INT',
				'constraint' => 'CHECK (note >= 1 AND note <= 5)',
			],
			'date' => [
				'type' => 'TIMESTAMP',
				'null' => true,
			],
			'contenu' => [
				'type' => 'TEXT',
				'null' => false,
			],
			'id_utilisateur' => [
				'type' => 'INT',
				'null' => false,
			],
		]);

		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('id_utilisateur', 'utilisateur', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('avis');

		$this->db->query('ALTER TABLE avis ALTER COLUMN date SET DEFAULT CURRENT_TIMESTAMP;');
	}

	public function down()
	{
		$this->forge->dropTable('avis');
	}
}
