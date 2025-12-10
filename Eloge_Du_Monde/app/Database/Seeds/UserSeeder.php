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
			],
			[
				'lastName' => 'Dupont',
				'firstName' => 'Marie',
				'phone' => '0678901234',
				'email' => 'marie.dupont@gmail.com',
				'role' => 'client',
				'password' => password_hash('abcd', PASSWORD_BCRYPT),
				'isSubscribed' => true,
			],
			[
				'lastName' => 'Smith',
				'firstName' => 'John',
				'phone' => '0654321098',
				'email' => 'john.smith@gmail.com',
				'role' => 'client',
				'password' => password_hash('efgh', PASSWORD_BCRYPT),
				'isSubscribed' => false,
			]
		];

		$this->db->table('user')->insertBatch($users);
	}
}
