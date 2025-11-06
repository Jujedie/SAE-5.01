<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableDestination extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'SERIAL',
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'nom' => [
				'type'=> 'TEXT',
				'nullable'=> false,
			],
			'cout' => [
				'type'=> 'INT',
				'nullable'=> false,
			],
			'id_pays' => [
				'type'=> 'INT',
				'nullable'=> false,
			],
		]);

		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('id_pays', 'pays', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('destination');
	}

	public function down()
	{
		$this->forge->dropTable('destination');
	}
}
