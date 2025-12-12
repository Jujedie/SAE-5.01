<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TripStepSeeder extends Seeder
{
	public function run()
	{
		$tripSteps = [
			['name' => 'Paris'        , 'cost' => 50, 'idCountry' => 1],
			['name' => 'Lyon'         , 'cost' => 40, 'idCountry' => 1],
			['name' => 'Tokyo'        , 'cost' => 80, 'idCountry' => 2],
			['name' => 'Osaka'        , 'cost' => 70, 'idCountry' => 2],
			['name' => 'New York'     , 'cost' => 70, 'idCountry' => 3],
			['name' => 'Los Angeles'  , 'cost' => 60, 'idCountry' => 3],
		];

		$this->db->table('tripStep')->insertBatch($tripSteps);
	}
}
