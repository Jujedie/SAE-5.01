<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTablePosteblog extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'idPoste' => [
				'type'           => 'SERIAL',
				'unsigned'       => true,
				'auto_increment' => true,
				'unique'         => true,
			],
			'titre' => [
				'type'       => 'TEXT',
				'null'       => false,
			],
			'type' => [
				'type'=> 'VARCHAR',
				'constraint' => '50',
				'null' => false,
			],
			'date' => [
				'type'=> 'TIMESTAMP',
				'null' => true,
			],
			'contenu' => [
				'type'=> 'TEXT',
				'null' => false,
			],
			'image' => [
				'type'=> 'TEXT',
				'null' => false,
			],
			'idUtilisateur' => [
				'type'=> 'INT',
				'null' => false,
			],
		]);

		$this->forge->addKey('idPoste', true);
		$this->forge->addForeignKey('idUtilisateur', 'utilisateur', 'idUtil', 'CASCADE', 'CASCADE');
		$this->forge->createTable('posteblog', true);

		$this->db->query('ALTER TABLE posteblog ALTER COLUMN date SET DEFAULT CURRENT_TIMESTAMP;');
	}

	public function down()
	{
		$this->forge->dropTable('posteblog', true, true);
	}
}
