<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableExtension extends Migration
{
    public function up()
	{
		// Fonctionne uniquement sur PostgreSQL car on utilise l'héritage avec INHERITS
		$this->db->query(
			"CREATE TABLE EXTENSION
			(
				titre       TEXT NOT NULL,
				montant     INT  NOT NULL,
				pieceJointe TEXT
			) INHERITS (VOYAGE);");
	}

	public function down()
	{
		$this->forge->dropTable('extension');
	}
}
