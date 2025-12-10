<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableTrip extends Migration
{
	public function up()
	{
		$this->forge->addField
		([
			'idTrip'             =>
			[
				'type'           => 'SERIAL',
				'unsigned'       => true,
				'auto_increment' => true,
				'unique'         => true,
			],
			'departureDate'  =>
			[
				'type'       => 'TIMESTAMP',
				'null'       => false,
			],
			'type'           =>
			[
				'type'       => 'TEXT',
				'null'       => false,
			],
			'idUser'         =>
			[
				'type'       => 'INT',
				'null'       => false,
			],
		]);

		$this->forge->addKey('idTrip', true);
		$this->forge->addForeignKey('idUser', 'user', 'idUser', 'CASCADE', 'CASCADE');
		$this->forge->createTable('trip', true);
	}

	public function down()
	{
		$this->forge->dropTable('trip', true, true);
	}
}