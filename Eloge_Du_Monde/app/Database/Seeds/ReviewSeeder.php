<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ReviewSeeder extends Seeder
{
	public function run()
	{
		$this->db->table('review')->insertBatch([
			[
				'rating'    => 5,
				'date'      => date('Y-m-d H:i:s', strtotime('2024-01-15 10:00:00')),
				'content'   => 'Un voyage inoubliable ! Tout était parfaitement organisé et les paysages étaient à couper le souffle. Je recommande vivement Eloge Du Monde pour vos prochaines aventures.',
				'verified'  => true,
				'idUser'    => 1,
			],
			[
				'rating'    => 4,
				'date'      => date('Y-m-d H:i:s', strtotime('2024-02-20 14:30:00')),
				'content'   => 'Très bonne expérience dans l\'ensemble. Le guide était compétent et sympathique. Quelques petits imprévus, mais rien de grave. Je repartirai avec eux sans hésiter.',
				'verified'  => true,
				'idUser'    => 3,
			],
			[
				'rating'    => 3,
				'date'      => date('Y-m-d H:i:s', strtotime('2024-03-10 09:15:00')),
				'content'   => 'Le voyage était correct, mais j\'ai trouvé que certains aspects pouvaient être améliorés, notamment l\'hébergement et le rythme des excursions. Cependant, le personnel était très professionnel.',
				'verified'  => true,
				'idUser'    => 4,
			],
			[
				'rating'    => 1,
				'date'      => date('Y-m-d H:i:s', strtotime('2024-04-05 16:45:00')),
				'content'   => 'Je suis très déçu par mon expérience avec Eloge Du Monde. Le voyage n\'a pas du tout répondu à mes attentes, et j\'ai rencontré de nombreux problèmes tout au long du séjour. Je ne recommande pas cette agence.',
				'verified'  => false,
				'idUser'    => 1,
			]
		]);
	}
}
