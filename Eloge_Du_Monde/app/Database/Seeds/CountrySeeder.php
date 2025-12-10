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
			['name' => 'Etats-Unis'    , 'continent' => 'Amérique', 'cost' => 120],
			['name' => 'Brésil'        , 'continent' => 'Amérique', 'cost' => 130],
			['name' => 'Australie'     , 'continent' => 'Océanie' , 'cost' => 200],
			['name' => 'Afrique du Sud', 'continent' => 'Afrique' , 'cost' => 180],
		];

		$this->db->table('country')->insertBatch($countries);
	}
}
