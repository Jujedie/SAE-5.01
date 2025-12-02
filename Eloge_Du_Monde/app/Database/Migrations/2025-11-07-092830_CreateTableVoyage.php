<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableVoyage extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'idVoyage'          => [
				'type'           => 'SERIAL',
				'unsigned'       => true,
				'auto_increment' => true,
				'unique'         => true,
			],
			'datedepart' => [
				'type' => 'TIMESTAMP',
				'null' => false,
			],
			'type' => [
				'type'=> 'TEXT',
				'null'=> false,
			],
			'idUtilisateur' => [
				'type' => 'INT',
				'null' => false,
			],
		]);

		$this->forge->addKey('idVoyage', true);
		$this->forge->addForeignKey('idUtilisateur', 'utilisateur', 'idUtil', 'CASCADE', 'CASCADE');
		$this->forge->createTable('voyage', true);

		$this->db->query('ALTER TABLE voyage ALTER COLUMN datedepart SET DEFAULT CURRENT_TIMESTAMP;');
	}

	public function down()
	{
		$this->forge->dropTable('voyage', true, true);
	}
}
