<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableUser extends Migration
{
	public function up()
	{
		$this->forge->addField
		([
			'idUser'             =>
			[
				'type'           => 'SERIAL',
				'unsigned'       => true,
				'auto_increment' => true,
				'unique'         => true,
			],
			'lastName'       =>
			[
				'type'       => 'TEXT',
				'null'       => false,
			],
			'firstName'      =>
			[
				'type'       => 'TEXT',
				'null'       => false,
			],
			'phone'          =>
			[
				'type'       => 'VARCHAR',
				'constraint' => '10',
				'null'       => true,
			],
			'email'          =>
			[
				'type'       => 'TEXT',
				'null'       => false,
				'unique'     => true,
			],
			'role'           =>
			[
				'type'       => 'VARCHAR',
				'constraint' => '8',
				'null'       => false,
			],
			'password'       =>
			[
				'type'       => 'VARCHAR',
				'constraint' => '255',
				'null'       => false,
			],
			'isSubscribed'   =>
			[
				'type'       => 'BOOLEAN',
				'null'       => false,
				'default'    => false,
			],
			'resetToken'     =>
			[
				'type'       => 'VARCHAR',
				'constraint' => '255',
				'null'       => true,
			],
			'resetTokenExpiration' =>
			[
				'type'             => 'TIMESTAMP',
				'null'             => true,
			],
		]);

		$this->forge->addKey('idUser', true);
		$this->forge->createTable('user', true);
	}

	public function down()
	{
		$this->forge->dropTable("user", true, true);
	}
}