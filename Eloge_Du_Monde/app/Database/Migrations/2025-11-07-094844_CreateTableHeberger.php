<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableHeberger extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_voyage' => [
				'type' => 'INT',
				'null' => false,
			],
			'id_destination' => [
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

		$this->forge->addKey(['id_voyage', 'id_destination'], true);
		$this->forge->addForeignKey('id_voyage', 'voyage', 'id', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('id_destination', 'destination', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('heberger');
	}

	public function down()
	{
		$this->forge->dropTable('heberger');
	}
}
