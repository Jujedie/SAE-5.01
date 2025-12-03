<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableReview extends Migration
{
	public function up()
	{
		$this->forge->addField
		([
			'idReview'           =>
			[
				'type'           => 'SERIAL',
				'unsigned'       => true,
				'auto_increment' => true,
				'unique'         => true,
			],
			'rating'         =>
			[
				'type'       => 'INT',
				'constraint' => 'CHECK (rating >= 1 AND rating <= 5)',
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
			'verified'       =>
			[
				'type'       => 'BOOLEAN',
				'null'       => false,
				'default'    => false,
			],
			'idUser'         =>
			[
				'type'       => 'INT',
				'null'       => false,
			],
		]);

		$this->forge->addKey('idReview', true);
		$this->forge->addForeignKey('idUser', 'user', 'idUser', 'CASCADE', 'CASCADE');
		$this->forge->createTable('review', true);

		$this->db->query('ALTER TABLE review ALTER COLUMN date SET DEFAULT CURRENT_TIMESTAMP;');
	}

	public function down()
	{
		$this->forge->dropTable('review', true, true);
	}
}