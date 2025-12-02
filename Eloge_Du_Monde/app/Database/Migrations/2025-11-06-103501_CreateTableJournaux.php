<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableJournaux extends Migration
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
			'message'=> [
				'type'       => 'VARCHAR',
				'constraint' => 255,
				'null'       => false,
			],
			'date' => [
				'type'     => 'TIMESTAMP',
				'null'     => true,
			],
			'id_utilisateur' => [
				'type'     => 'INT',
				'null'     => false,
			]
		]);

		$this->forge->addKey('id');
		$this->forge->addForeignKey('id_utilisateur', 'utilisateur', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('journaux');

		$this->db->query('ALTER TABLE journaux ALTER COLUMN date SET DEFAULT CURRENT_TIMESTAMP;');
	}

	public function down()
	{
		$this->forge->dropTable('journaux');
	}
}
