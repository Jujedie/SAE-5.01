<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InsertionPays extends Seeder
{
	public function run()
	{
		$pays = [
			['nom' => 'France'    , 'continent' => 'Europe'          , 'cout' => 100],
			['nom' => 'Japon'     , 'continent' => 'Asie'            , 'cout' => 150],
			['nom' => 'États-Unis', 'continent' => 'Amérique du Nord', 'cout' => 120],
		];

		$this->db->table('pays')->insertBatch($pays);
	}
}
