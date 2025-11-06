<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableJourneaux extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type'=> 'SERIAL',
				'unsigned'=> true,
				'auto_increment'=> true,
			],
			'message'=> [
				'type'=> 'VARCHAR',
				'constraint'=> 255,
				'nullable' => false,
			],
			'date' => [
				'type'=> 'TIMESTAMP',
				'nullable'=> true,
				'default' => 'CURRENT_TIMESTAMP',
			],
			'id_utilisateur' => [
				'type'=> 'INT',
				'nullable'=> false,
			]
		]);

		$this->forge->addKey('id');
		$this->forge->createTable('journeaux');
	}

	public function down()
	{
		$this->forge->dropTable('journeaux');
	}
}
