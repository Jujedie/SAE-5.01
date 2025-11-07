<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableVoyagePrefait extends Migration
{
	public function up()
	{
		// Fonctionne uniquement sur PostgreSQL car on utilise l'héritage avec INHERITS
		$this->db->query(
			"CREATE TABLE VOYAGE_PREFAIT
			(
				titre           TEXT NOT NULL,
				programmeDesc   TEXT,
				hebergementDesc TEXT,
				conditionDesc   TEXT,
				formalitésDesc  TEXT,
				thematique      TEXT,
				montant         INT  NOT NULL,
				pieceJointe     TEXT
			) INHERITS (VOYAGE);");
	}

	public function down()
	{
		$this->forge->dropTable('voyage_prefait');
	}
}
