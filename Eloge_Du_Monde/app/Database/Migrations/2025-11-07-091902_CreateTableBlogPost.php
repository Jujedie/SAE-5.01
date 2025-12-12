<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableBlogPost extends Migration
{
	public function up()
	{
		$this->forge->addField
		([
			'idBlogPost'         =>
			[
				'type'           => 'SERIAL',
				'unsigned'       => true,
				'auto_increment' => true,
				'unique'         => true,
			],
			'title'          =>
			[
				'type'       => 'TEXT',
				'null'       => false,
			],
			'type'           =>
			[
				'type'       => 'VARCHAR',
				'constraint' => '50',
				'null'       => false,
			],
			'date'           =>
			[
				'type'       => 'TIMESTAMP',
				'null'       => true,
			],
			'content'        =>
			[
				'type'       => 'TEXT',
				'null'       => false,
			],
			'image'          =>
			[
				'type'       => 'TEXT',
				'null'       => true,
			],
			'idUser'         =>
			[
				'type'       => 'INT',
				'null'       => false,
			],
		]);

		$this->forge->addKey('idBlogPost', true);
		$this->forge->addForeignKey('idUser', 'user', 'idUser', 'CASCADE', 'CASCADE');
		$this->forge->createTable('blogPost', true);
	}

	public function down()
	{
		$this->forge->dropTable('blogPost', true, true);
	}
}