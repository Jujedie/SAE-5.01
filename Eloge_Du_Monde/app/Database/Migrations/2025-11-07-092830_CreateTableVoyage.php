<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableVoyage extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'SERIAL',
				'unsigned'       => true,
				'auto_increment' => true,
				'unique'         => true,
			],
			'datedepart' => [
				'type' => 'TIMESTAMP',
				'null' => false,
			],
			'type' => [
				'type'=> 'TEXT',
				'null'=> false,
			],
			'id_utilisateur' => [
				'type' => 'INT',
				'null' => false,
			],
		]);

		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('id_utilisateur', 'utilisateur', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('voyage');

		$this->db->query('ALTER TABLE voyage ALTER COLUMN datedepart SET DEFAULT CURRENT_TIMESTAMP;');
	}

	public function down()
	{
		$this->forge->dropTable('voyage');
	}
}
