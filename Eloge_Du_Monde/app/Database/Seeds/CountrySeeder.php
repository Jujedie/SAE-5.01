<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CountrySeeder extends Seeder
{
	public function run()
	{
		$countries = [
			['name' => 'France'       , 'continent' => 'Europe'  , 'cost' => 100],
			['name' => 'Japon'        , 'continent' => 'Asie'    , 'cost' => 150],
			['name' => 'Etats-Unis'   , 'continent' => 'Amérique', 'cost' => 120],
		];

		$this->db->table('country')->insertBatch($countries);
	}
}
