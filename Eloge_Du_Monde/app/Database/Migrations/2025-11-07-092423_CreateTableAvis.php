<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableAvis extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'idAvis' => [
				'type'           => 'SERIAL',
				'unsigned'       => true,
				'auto_increment' => true,
				'unique'         => true,
			],
			'note' => [
				'type'       => 'INT',
				'constraint' => 'CHECK (note >= 1 AND note <= 5)',
			],
			'date' => [
				'type' => 'TIMESTAMP',
				'null' => true,
			],
			'contenu' => [
				'type' => 'TEXT',
				'null' => false,
			],
			'verified' => [
				'type'    => 'BOOLEAN',
				'null'    => false,
				'default' => false,
			],
			'idUtilisateur' => [
				'type' => 'INT',
				'null' => false,
			],
		]);

		$this->forge->addKey('idAvis', true);
		$this->forge->addForeignKey('idUtilisateur', 'utilisateur', 'idUtil', 'CASCADE', 'CASCADE');
		$this->forge->createTable('avis', true);

		$this->db->query('ALTER TABLE avis ALTER COLUMN date SET DEFAULT CURRENT_TIMESTAMP;');
	}

	public function down()
	{
		$this->forge->dropTable('avis', true, true);
	}
}
