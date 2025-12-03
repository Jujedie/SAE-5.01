<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableReserver extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'idVoyage' => [
				'type' => 'INT',
				'null' => false,
			],
			'idUtil' => [
				'type' => 'INT',
				'null' => false,
			],
		]);

		$this->forge->addKey(['idVoyage', 'idUtil'], true);
		$this->forge->addForeignKey('idVoyage', 'voyage', 'idVoyage', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('idUtil', 'utilisateur', 'idUtil', 'CASCADE', 'CASCADE');
		$this->forge->createTable('reserver');
	}

	public function down()
	{
		$this->forge->dropTable('reserver');
	}
}
