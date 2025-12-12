<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CountrySeeder extends Seeder
{
	public function run()
	{
		$countries = [
			['name' => 'France'        , 'continent' => 'Europe'  , 'cost' => 100],
			['name' => 'Japon'         , 'continent' => 'Asie'    , 'cost' => 150],
			['name' => 'Etats-Unis'    , 'continent' => 'Amerique', 'cost' => 120],
			['name' => 'Bresil'        , 'continent' => 'Amerique', 'cost' => 130],
			['name' => 'Australie'     , 'continent' => 'Oceanie' , 'cost' => 200],
			['name' => 'Afrique du Sud', 'continent' => 'Afrique' , 'cost' => 180],
		];

		$this->db->table('country')->insertBatch($countries);
	}
}
