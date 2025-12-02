<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableJournaux extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'idJournaux' => [
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
			'idUtilisateur' => [
				'type'     => 'INT',
				'null'     => false,
			]
		]);

		$this->forge->addKey('idJournaux', true);
		$this->forge->addForeignKey('idUtilisateur', 'utilisateur', 'idUtil', 'CASCADE', 'CASCADE');
		$this->forge->createTable('journaux', true);

		$this->db->query('ALTER TABLE journaux ALTER COLUMN date SET DEFAULT CURRENT_TIMESTAMP;');
	}

	public function down()
	{
		$this->forge->dropTable('journaux', true, true);
	}
}
