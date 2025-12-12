<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BlogPostSeeder extends Seeder
{
	public function run()
	{
		$this->db->table('blogPost')->insertBatch([
			[
				'title'       => 'Bienvenue sur Eloge Du Monde',
				'type'        => 'Guides',
				'content'     => 'Nous sommes ravis de vous accueillir sur notre blog de voyage ! Ici, nous partageons nos aventures, nos conseils et nos inspirations pour vous aider à planifier vos propres escapades à travers le monde. Que vous soyez un voyageur chevronné ou que vous prépariez votre premier voyage, nous espérons que nos articles vous inspireront à explorer de nouveaux horizons.',
				'date'        => date('Y-m-d H:i:s', strtotime('2024-01-10 08:00:00')),
				'image'       => 'logo-eloge-du-monde.png',
				'idUser'      => 2,
			],
			[
				'title'       => 'Top 10 des destinations à ne pas manquer en 2024',
				'type'        => 'Destinations',
				'content'     => 'L\'année 2024 s\'annonce comme une année passionnante pour les voyageurs du monde entier. Voici notre sélection des 10 destinations incontournables à visiter cette année : 1. Kyoto, Japon 2. Lisbonne, Portugal 3. Cape Town, Afrique du Sud 4. Vancouver, Canada 5. Buenos Aires, Argentine 6. Reykjavik, Islande 7. Marrakech, Maroc 8. Sydney, Australie 9. Rome, Italie 10. Bali, Indonésie Préparez vos valises et partez à la découverte de ces lieux fascinants !',
				'date'        => date('Y-m-d H:i:s', strtotime('2024-02-01 09:00:00')),
				'image'       => 'destination1.jpeg',
				'idUser'      => 2,
			]
		]);
	}
}
