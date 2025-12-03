<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableHeberger extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'idVoyage' => [
				'type' => 'INT',
				'null' => false,
			],
			'idEtapeVoyage' => [
				'type' => 'INT',
				'null' => false,
			],
			'nbJours' => [
				'type' => 'INT',
				'null' => false,
			],
			'nbNuits' => [
				'type' => 'INT',
				'null' => false,
			],
		]);

		$this->forge->addKey(['idVoyage', 'idEtapeVoyage'], true);
		$this->forge->addForeignKey('idVoyage', 'voyage', 'idVoyage', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('idEtapeVoyage', 'etapeVoyage', 'idEtapeVoyage', 'CASCADE', 'CASCADE');
		$this->forge->createTable('heberger', true);
	}

	public function down()
	{
		$this->forge->dropTable('heberger', true, true);
	}
}
