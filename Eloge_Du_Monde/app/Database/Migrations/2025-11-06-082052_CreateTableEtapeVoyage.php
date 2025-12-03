<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableEtapeVoyage extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'idEtapeVoyage'          => [
				'type'           => 'SERIAL',
				'unsigned'       => true,
				'auto_increment' => true,
				'unique'         => true,
			],
			'nom' => [
				'type' => 'TEXT',
				'null' => false,
			],
			'cout' => [
				'type' => 'INT',
				'null' => false,
				'constraint' => 'CHECK (cout >= 0)',
			],
			'idPays' => [
				'type' => 'INT',
				'null' => false,
			],
		]);

		$this->forge->addKey('idEtapeVoyage', true);
		$this->forge->addForeignKey('idPays', 'pays', 'idPays', 'CASCADE', 'CASCADE');
		$this->forge->createTable('etapeVoyage', true);
	}

	public function down()
	{
		$this->forge->dropTable('etapeVoyage', true, true);
	}
}
