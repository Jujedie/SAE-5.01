<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTablePrebuiltTrip extends Migration
{
	public function up()
	{
		// Ne fonctionne que sur PostgreSQL, car nous utilisons l'héritage INHERITS.
		$this->db->query
		(
			"CREATE TABLE prebuiltTrip
			(
				title             TEXT NOT NULL,
				programDesc       TEXT,
				hostingDesc       TEXT,
				conditionDesc     TEXT,
				formalitiesDesc   TEXT,
				thematic          TEXT,
				amount            INT  NOT NULL,
				attachment        TEXT,
				image             TEXT,
			) INHERITS (trip);");
	}

	public function down()
	{
		$this->forge->dropTable('prebuiltTrip', true, true);
	}
}