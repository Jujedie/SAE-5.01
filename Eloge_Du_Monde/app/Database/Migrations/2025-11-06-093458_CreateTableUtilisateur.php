<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableUtilisateur extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'idUtil' => [
				'type'           => 'SERIAL',
				'unsigned'       => true,
				'auto_increment' => true,
				'unique'         => true,
			],
			'nom' => [
				'type'       => 'TEXT',
				'null'       => false,
			],
			'prenom' => [
				'type'       => 'TEXT',
				'null'       => false,
			],
			'telephone' => [
				'type'       => 'VARCHAR',
				'constraint' => '10',
				'null'       => false,
			],
			'email' => [
				'type'       => 'TEXT',
				'null'       => false,
			],
			'role' => [
				'type'       => 'VARCHAR',
				'constraint' => '8',
				'null'       => false,
			],
			'mdp' => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
				'null'       => false,
			],
			'estAbonne' => [
				'type'       => 'BOOLEAN',
				'null'       => false,
				'default'    => false,
			],
			'resetToken' => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
				'null'       => true,
			],
			'resetTokenExpiration'=> [
				'type'       => 'TIMESTAMP',
				'null'       => true,
			],
		]);

		$this->forge->addKey('idUtil', true);
		$this->forge->createTable('utilisateur', true);
	}

	public function down()
	{
		$this->forge->dropTable("utilisateur", true, true);
	}
}
