<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CountrySeeder extends Seeder
{
	public function run()
	{
		$countries = [
			['name' => 'France'       , 'continent' => 'Europe'          , 'cost' => 100],
			['name' => 'Japan'        , 'continent' => 'Asia'            , 'cost' => 150],
			['name' => 'United States', 'continent' => 'North America'   , 'cost' => 120],
		];

		$this->db->table('country')->insertBatch($countries);
	}
}
