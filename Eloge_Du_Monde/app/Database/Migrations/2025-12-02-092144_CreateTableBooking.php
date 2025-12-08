<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableBooking extends Migration
{
	public function up()
	{
		$this->forge->addField
		([
			'idTrip'   =>
			[
				'type' => 'INT',
				'null' => false,
			],
			'idUser'   =>
			[
				'type' => 'INT',
				'null' => false,
			],
		]);

		$this->forge->addKey(['idTrip', 'idUser'], true);
		$this->forge->addForeignKey('idTrip', 'trip', 'idTrip', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('idUser', 'user', 'idUser', 'CASCADE', 'CASCADE');
		$this->forge->createTable('booking');
	}

	public function down()
	{
		$this->forge->dropTable('booking');
	}
}