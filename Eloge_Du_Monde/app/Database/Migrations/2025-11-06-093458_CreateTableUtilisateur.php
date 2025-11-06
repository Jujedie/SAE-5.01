<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableUtilisateur extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type'           => 'INT',
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'nom' => [
				'type'       => 'TEXT',
				'nullable'   => false,
			],
			'prenom' => [
				'type'       => 'TEXT',
				'nullable'   => false,
			],
			'telephone' => [
				'type'       => 'VARCHAR',
				'constraint' => '10',
				'nullable'   => false,
			],
			'email' => [
				'type'       => 'TEXT',
				'nullable'   => false,
			],
			'role' => [
				'type'       => 'VARCHAR',
				'constraint' => '8',
				'nullable'   => false,
			],
			'mdp' => [
				'type'       => 'VARCHAR',
				'constraint' => '32',
			],
			'resetToken' => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
				'nullable'   => true,
			],
			'resetTokenExpiration'=> [
				'type'       => 'TIMESTAMP',
				'nullable'   => true,
			],
		]);
	}

	public function down()
	{
		$this->forge->dropTable("utilisateur");
	}
}
