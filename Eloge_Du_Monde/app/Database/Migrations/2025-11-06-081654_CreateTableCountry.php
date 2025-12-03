<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableCountry extends Migration
{
	public function up()
	{
		$this->forge->addField
		([
			'idCountry'          =>
			[
				'type'           => 'SERIAL',
				'unsigned'       => true,
				'auto_increment' => true,
				'unique'         => true,
			],
			'name'           =>
			[
				'type'       => 'VARCHAR',
				'constraint' => 100,
				'nullable'   => false,
			],
			'continent'      =>
			[
				'type'       => 'VARCHAR',
				'constraint' => 50,
				'nullable'   => false,
			],
			'cost'           =>
			[
				'type'       => 'INT',
				'nullable'   => false,
			],
		]);

		$this->forge->addKey('idCountry', true);
		$this->forge->createTable('country', true);
	}

	public function down()
	{
		$this->forge->dropTable('country', true, true);
	}
}