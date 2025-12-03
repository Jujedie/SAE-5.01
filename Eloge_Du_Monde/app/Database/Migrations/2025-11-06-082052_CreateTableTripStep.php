<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableTripStep extends Migration
{
	public function up()
	{
		$this->forge->addField
		([
			'idTripStep'         =>
			[
				'type'           => 'SERIAL',
				'unsigned'       => true,
				'auto_increment' => true,
				'unique'         => true,
			],
			'name'           =>
			[
				'type'       => 'TEXT',
				'null'       => false,
			],
			'cost'           =>
			[
				'type'       => 'INT',
				'null'       => false,
				'constraint' => 'CHECK (cost >= 0)',
			],
			'idCountry'      =>
			[
				'type'       => 'INT',
				'null'       => false,
			],
		]);

		$this->forge->addKey('idTripStep', true);
		$this->forge->addForeignKey('idCountry', 'country', 'idCountry', 'CASCADE', 'CASCADE');
		$this->forge->createTable('tripStep', true);
	}

	public function down()
	{
		$this->forge->dropTable('tripStep', true, true);
	}
}