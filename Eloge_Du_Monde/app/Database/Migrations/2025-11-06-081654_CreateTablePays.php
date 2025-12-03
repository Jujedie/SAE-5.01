<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTablePays extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'idPays'          => [
				'type'           => 'SERIAL',
				'unsigned'       => true,
				'auto_increment' => true,
				'unique'         => true,
			],
			'nom' => [
				'type'=> 'VARCHAR',
				'constraint'=> 100,
				'nullable'=> false,
			],
			'continent' => [
				'type'=> 'VARCHAR',
				'constraint'=> 50,
				'nullable'=> false,
			],
			'cout' => [
				'type'=> 'INT',
				'nullable'=> false,
			],
		]);

		$this->forge->addKey('idPays', true);
		$this->forge->createTable('pays', true);
	}

	public function down()
	{
		$this->forge->dropTable('pays', true, true);
	}
}
