<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InsertionDestination extends Seeder
{
	public function run()
	{
		$destinations = [
			['nom' => 'Paris'        , 'cout' => 50, 'id_pays' => 1],
			['nom' => 'Tokyo'        , 'cout' => 80, 'id_pays' => 2],
			['nom' => 'New York'     , 'cout' => 70, 'id_pays' => 3],
		];

		$this->db->table('destination')->insertBatch($destinations);
	}
}
