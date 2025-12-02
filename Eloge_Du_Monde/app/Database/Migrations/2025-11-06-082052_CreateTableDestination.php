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
			'id_pays' => [
				'type' => 'INT',
				'null' => false,
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
