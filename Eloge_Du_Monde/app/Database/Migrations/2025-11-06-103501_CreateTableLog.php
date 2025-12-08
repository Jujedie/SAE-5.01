<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableLog extends Migration
{
	public function up()
	{
		$this->forge->addField
		([
			'idLog'              =>
			[
				'type'           => 'SERIAL',
				'unsigned'       => true,
				'auto_increment' => true,
				'unique'         => true,
			],
			'message'        =>
			[
				'type'       => 'VARCHAR',
				'constraint' => 255,
				'null'       => false,
			],
			'date'           =>
			[
				'type'       => 'TIMESTAMP',
				'null'       => true,
			],
			'idUser'         =>
			[
				'type'       => 'INT',
				'null'       => false,
			],
		]);

		$this->forge->addKey('idLog', true);
		$this->forge->addForeignKey('idUser', 'user', 'idUser', 'CASCADE', 'CASCADE');
		$this->forge->createTable('log', true);

		$this->db->query('ALTER TABLE log ALTER COLUMN date SET DEFAULT CURRENT_TIMESTAMP;');
	}

	public function down()
	{
		$this->forge->dropTable('log', true, true);
	}
}