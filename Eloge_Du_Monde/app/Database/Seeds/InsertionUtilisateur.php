<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InsertionUtilisateur extends Seeder
{
	public function run()
	{
		$utilisateurs = [
			[
				'nom' => 'Dupont',
				'prenom' => 'Jean',
				'telephone' => '0612345678',
				'email' => 'jean.dupont@example.com',
				'role' => 'client',
				'mdp' => password_hash('password123', PASSWORD_BCRYPT),
				'estAbonne' => true,
			],
			[
				'nom' => 'Martin',
				'prenom' => 'Sophie',
				'telephone' => '0623456789',
				'email' => 'sophie.martin@example.com',
				'role' => 'admin',
				'mdp' => password_hash('adminpass456', PASSWORD_BCRYPT),
				'estAbonne' => false,
			]
		];

		$this->db->table('utilisateur')->insertBatch($utilisateurs);
	}
}
