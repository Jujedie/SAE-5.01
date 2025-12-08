<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
	public function run()
	{
		$users = [
			[
				'lastName' => 'Mangeant',
				'firstName' => 'Thibault',
				'phone' => '0612345678',
				'email' => 'mangeant.thibault@gmail.com',
				'role' => 'client',
				'password' => password_hash('1234', PASSWORD_BCRYPT),
				'isSubscribed' => true,
			],
			[
				'lastName' => 'Leboeuf',
				'firstName' => 'Frank',
				'phone' => '0687654321',
				'email' => 'frank.leboeuf@gmail.com',
				'role' => 'admin',
				'password' => password_hash('4321', PASSWORD_BCRYPT),
				'isSubscribed' => false,
			]
		];

		$this->db->table('user')->insertBatch($users);
	}
}
