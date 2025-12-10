<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\BookingModel;
use App\Models\HostModel;
use App\Models\CountryModel;
use App\Models\TripModel;
use App\Models\TripStepModel;
use App\Models\PrebuiltTripModel;
use App\Models\ExtensionModel;
use App\Models\ReviewModel;
use App\Models\BlogPostModel;
use App\Models\LogModel;

class AdminController extends BaseController
{
	public function index()
	{
		// Afficher le tableau de bord admin
		$countryModel       = new CountryModel();
		$userModel          = new UserModel();
		$tripModel          = new TripModel();
		$reviewModel        = new ReviewModel();
		$prebuiltTripModel  = new PrebuiltTripModel();
		$blogModel          = new BlogPostModel();

		$data =
		[
			'usersCount'         => $userModel->getUsersCount(),
			'tripsCount'         => $tripModel->getTripsCount(),
			'reviewsCount'       => $reviewModel->getReviewsCount(),
			'countriesCount'     => $countryModel->getCountriesCount(),
			'prebuiltTripsCount' => $prebuiltTripModel->countAllResults(),
			'postsCount'         => $blogModel->getPostCount(),
		];

		return view('admin/homeAdmin', $data);
	}

	// Gestion des réservations
	public function bookings()
	{
		$tripModel     = new TripModel();
		$userModel     = new UserModel();
		$hostModel     = new HostModel();
		$tripStepModel = new TripStepModel();
		$countryModel  = new CountryModel();

		$reservationsData = [];

		$reservations     = $tripModel->getAllTrips();

		foreach ($reservations as $reservation)
		{
			$user = $userModel->getUserById($reservation['idUser']);

			// Vérifier si l'utilisateur existe
			if (!$user)
			{
				$user =
				[
					'firstname' => 'N/A',
					'lastname'  => '',
					'email'     => 'N/A',
					'phone'     => ''
				];
			}
			
			$hosts = $hostModel->getHostsByTrip($reservation['idTrip']);
			
			$destinations = [];
			$totalAmount  = 0;
			$totalNights  = 0;
			
			foreach ($hosts as $host)
			{
				$tripStep = $tripStepModel->getStepById($host['idTripStep']);
				if ($tripStep)
				{
					$country = $countryModel->getCountryById($tripStep['idCountry']);
					if ($country)
					{
						$destinations[] =
						[
							'name'    => $tripStep['name'],
							'country' => $country['name']
						];

						// Utiliser les vraies nuits stockées dans host
						$nights       = $host['nbNights'];
						$totalNights += $nights;
						$totalAmount += $country['cost'] * $nights;
					}
				}
			}

			$departureDate = new \DateTime($reservation['departureDate']);
			$endDate = clone $departureDate;
			$endDate->modify('+' . $totalNights . ' days');
			
			$reservationsData[] =
			[
				'idTrip'        => $reservation['idTrip'],
				'client'        => $user,
				'destinations'  => $destinations,
				'departureDate' => $departureDate->format('Y-m-d'),
				'endDate'       => $endDate->format('Y-m-d'),
				'totalNights'   => $totalNights,
				'totalAmount'   => $totalAmount,
				'type'          => $reservation['type'] ?? 'individuel'
			];
		}

		return view('admin/bookings/list',
		[
			'reservations' => $reservationsData
		]);
	}

	public function bookingDetail($idTrip, $idUser)
	{
		$bookingModel = new BookingModel();
		$tripModel    = new TripModel();
		$userModel    = new UserModel();

		$trip = $tripModel->getTripById($idTrip);
		$user = $userModel->getUserById($idUser);

		if (!$trip || !$user)
		{
			return redirect()->to('/admin/reservations')->with('error', 'Réservation non trouvée.');
		}

		return view('admin/reservations/detail',
		[
			'trip' => $trip,
			'user' => $user
		]);
	}

	// Gestion des utilisateurs
	public function users()
	{
		$userModel = new UserModel();

		$users = $userModel->getAllUsers();

		return view('admin/users/list', ['users' => $users]);
	}

	public function deleteUser($id)
	{
		$userModel = new UserModel();
		$userModel->deleteUserById($id);

		$logModel = new LogModel();
		$logModel->addLogEntry('Suppression de l\'utilisateur avec ID : ' . $id, session()->get('idUser'));
		
		return redirect()->to('/admin/users')->with('success', 'Utilisateur supprimé avec succès.');
	}

	// Gestion des pays
	public function countries()
	{
		$countryModel = new CountryModel();

		$countries = $countryModel->getAllCountries();

		return view('admin/countries/list', ['countries' => $countries]);
	}

	public function addCountry()
	{
		if ($this->request->getMethod() === 'POST')
		{
			$countryModel = new CountryModel();
			$logModel     = new LogModel();

			$data = $this->request->getPost();

			$rules =
			[
				'name' => 'required|max_length[255]|is_unique[countries.name]',
				'continent' => 'required|in_list[europe,asie,afrique,amerique,oceanie]',
				'cost' => 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[1000000000]',
			];

			if (!$this->validate($rules))
			{
				return redirect()->back()->withInput()->with('error', 'Le nom est déjà utilisé, trop grand ou le coût est invalide.');
			}

			$countryModel->addCountry($data);
			$logModel->addLogEntry('Ajout du pays : ' . $data['name'], session()->get('idUser'));
			return redirect()->to('/admin/countries')->with('success', 'Pays ajouté avec succès.');
		}

		return view('admin/countries/add');
	}

	public function editCountry($id)
	{
		$countryModel = new CountryModel();

		$country = $countryModel->getCountryById($id);

		if (!$country)
		{
			return redirect()->to('/admin/countries')->with('error', 'Pays non trouvé.');
		}

		if ($this->request->getMethod() === 'POST')
		{
			$data = $this->request->getPost();
			$countryModel->updateCountry($id, $data);
			$logModel = new LogModel();
			$logModel->addLogEntry('Modification du pays avec ID : ' . $id, session()->get('idUser'));
			return redirect()->to('/admin/countries')->with('success', 'Pays mis à jour avec succès.');
		}

		return view('admin/countries/edit', ['country' => $country]);
	}

	public function deleteCountry($id)
	{
		$countryModel = new CountryModel();
		$countryModel->deleteCountry($id);

		$logModel = new LogModel();
		$logModel->addLogEntry('Suppression du pays avec ID : ' . $id, session()->get('idUser'));

		return redirect()->to('/admin/countries')->with('success', 'Pays supprimé avec succès.');
	}

	// Gestion des destinations d'un pays
	public function countryDestinations($idCountry)
	{
		$countryModel  = new CountryModel();
		$tripStepModel = new TripStepModel();
		
		$country = $countryModel->getCountryById($idCountry);
		
		if (!$country)
		{
			return redirect()->to('/admin/countries')->with('error', 'Pays non trouvé.');
		}
		
		$destinations = $tripStepModel->getStepsByCountry($idCountry);

		return view('admin/countries/destinations',
		[
			'country' => $country,
			'destinations' => $destinations
		]);
	}

	public function addDestination($idCountry)
	{
		$countryModel = new CountryModel();
		$country = $countryModel->getCountryById($idCountry);
		
		if (!$country)
		{
			return redirect()->to('/admin/countries')->with('error', 'Pays non trouvé.');
		}

		if ($this->request->getMethod() === 'POST')
		{
			$tripStepModel = new TripStepModel();
			$data = $this->request->getPost();

			$rules =
			[
				'name' => 'required|max_length[255]',
				'cost' => 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[1000000000]',
			];

			if (!$this->validate($rules))
			{
				return redirect()->back()->withInput()->with('error', 'Le nom est trop grand ou le coût est invalide.');
			}

			$data['idCountry'] = $idCountry;

			$tripStepModel->addStep($data);
			$logModel = new LogModel();
			$logModel->addLogEntry('Ajout de la destination : ' . $data['name'] . ' pour le pays ID : ' . $idCountry, session()->get('idUser'));
			return redirect()->to('/admin/countries/' . $idCountry . '/destinations')->with('success', 'Destination ajoutée avec succès.');
		}

		return view('admin/countries/addDestination', ['country' => $country]);
	}

	public function editDestination($idCountry, $idDestination)
	{
		$countryModel  = new CountryModel();
		$tripStepModel = new TripStepModel();
		
		$country = $countryModel->getCountryById($idCountry);
		$destination = $tripStepModel->getStepById($idDestination);

		if (!$country || !$destination)
		{
			return redirect()->to('/admin/countries')->with('error', 'Pays ou destination non trouvé.');
		}

		if ($this->request->getMethod() === 'POST')
		{
			$data = $this->request->getPost();
			$tripStepModel->updateStep($idDestination, $data);
			$logModel = new LogModel();
			$logModel->addLogEntry('Modification de la destination avec ID : ' . $idDestination . ' pour le pays ID : ' . $idCountry, session()->get('idUser'));
			return redirect()->to('/admin/countries/' . $idCountry . '/destinations')->with('success', 'Destination mise à jour avec succès.');
		}

		return view('admin/countries/editDestination',
		[
			'country'     => $country,
			'destination' => $destination
		]);
	}

	public function deleteDestination($idCountry, $idDestination)
	{
		$tripStepModel = new TripStepModel();
		$tripStepModel->deleteStep($idDestination);

		$logModel = new LogModel();
		$logModel->addLogEntry('Suppression de la destination avec ID : ' . $idDestination . ' pour le pays ID : ' . $idCountry, session()->get('idUser'));

		return redirect()->to('/admin/countries/' . $idCountry . '/destinations')->with('success', 'Destination supprimée avec succès.');
	}

	// Gestion des voyages
	public function trips()
	{
		$tripModel         = new TripModel();
		$prebuiltTripModel = new PrebuiltTripModel();
		
		$trips = $tripModel->getAllTrips();
		$prebuiltTrips = $prebuiltTripModel->getAllPrebuiltTrips();

		return view('admin/trips/list', ['trips' => $trips, 'prebuiltTrips' => $prebuiltTrips]);
	}

	public function editTrip($id)
	{
		$tripModel = new TripModel();
		$hostModel = new HostModel();
		$countriesModel = new CountryModel();
		$stepModel = new TripStepModel();

		$trip = $tripModel->getTripById($id);

		if (!$trip)
		{
			return redirect()->to('/admin/trips')->with('error', 'Voyage non trouvé.');
		}

		if ($this->request->getMethod() === 'POST')
		{
			$data = $this->request->getPost();
			$tripModel->updateTrip($id, $data);
			$logModel = new LogModel();
			$logModel->addLogEntry('Modification du voyage avec ID : ' . $id, session()->get('idUser'));
			return redirect()->to('/admin/trips')->with('success', 'Voyage mis à jour avec succès.');
		}

		$countries = $countriesModel->getAllCountries();
		$tripSteps = $stepModel->getAllSteps();
		$existingSteps = $hostModel->getStepsByTrip($id);

		return view('admin/trips/edit', ['trip' => $trip, 'countries' => $countries, 'tripSteps' => $tripSteps, 'existingSteps' => $existingSteps]);
	}

	public function deleteTrip($id)
	{
		$tripModel = new TripModel();

		$tripModel->deleteTrip($id);

		return redirect()->to('/admin/trips')->with('success', 'Voyage supprimé avec succès.');
	}

	// Gestion des voyages préfaits
	public function prebuiltTrips()
	{
		$prebuiltTripModel = new PrebuiltTripModel();
		$extensionModel    = new ExtensionModel();
		
		$prebuiltTrips = $prebuiltTripModel->getAllPrebuiltTrips();
		
		// Récupérer les extensions pour chaque voyage
		$tripsWithExtensions = [];
		if (is_array($prebuiltTrips) && !empty($prebuiltTrips))
		{
			foreach ($prebuiltTrips as $trip)
			{
				$trip['extensions']      = $extensionModel->getExtensionsByPrebuiltTrip($trip['idTrip'], $trip['idUser']);
				$tripsWithExtensions[] = $trip;
			}
		}

		return view('admin/prebuiltTrips/list', ['prebuiltTrips' => $tripsWithExtensions]);
	}

	public function viewPrebuiltTrip($id) {
		$prebuiltTripModel = new PrebuiltTripModel();
		$extensionModel    = new ExtensionModel();
		$hostModel         = new HostModel();
		
		$prebuiltTrip = $prebuiltTripModel->getPrebuiltTripById($id);
		if (!$prebuiltTrip)
		{
			return redirect()->to('/admin/prebuiltTrips')->with('error', 'Voyage préfait non trouvé.');
		}

		// Récupérer toutes les extensions pour ce voyage
		$extensions = $extensionModel->getExtensionsByPrebuiltTrip($id, $prebuiltTrip['idUser']);

		$hosts = $hostModel->getHostsByTripWithDetails($id);
		
		return view('admin/prebuiltTrips/view',
		[
			'prebuiltTrip' => $prebuiltTrip,
			'extensions'   => $extensions,
			'hosts'        => $hosts
		]);
	}

	public function addPrebuiltTrip()
	{
		if ($this->request->getMethod() === 'POST')
		{
			$prebuiltTripModel = new PrebuiltTripModel();
			$hostModel         = new HostModel();

			$data = $this->request->getPost();
			
			// Ajouter l'ID de l'utilisateur connecté
			$data['idUser'] = session()->get('idUser');
			
			$prebuiltTripModel->addPrebuiltTrip($data);
			
			// Récupérer les étapes depuis 'steps' (nom utilisé dans le formulaire)
			$steps = $this->request->getPost('steps');
			if (!empty($steps) && is_array($steps))
			{
				$hostModel->addHostsForPrebuiltTrip($prebuiltTripModel->getInsertID(), $steps);
			}
			
			$logModel = new LogModel();
			$logModel->addLogEntry('Ajout du voyage préfait : ' . $data['title'], session()->get('idUser'));
			return redirect()->to(uri: '/admin/prebuiltTrips')->with('success', 'Voyage préfait ajouté avec succès.');
		}

		$destinations = (new TripStepModel())->getAllSteps();
		$countries    = (new CountryModel())->getAllCountries();

		return view('admin/prebuiltTrips/add', ['tripSteps' => $destinations, 'countries' => $countries]);
	}

	public function editPrebuiltTrip($id)
	{
		$prebuiltTripModel = new PrebuiltTripModel();
		$hostModel         = new HostModel();
	
		$prebuiltTrip = $prebuiltTripModel->getPrebuiltTripById($id);
	
		if (!$prebuiltTrip)
		{
			return redirect()->to('/admin/prebuiltTrips')->with('error', 'Voyage préfait non trouvé.');
		}
	
		if ($this->request->getMethod() === 'POST')
		{
			$data = $this->request->getPost();
			$prebuiltTripModel->updatePrebuiltTrip($id, $data);
			
			// Récupérer les étapes depuis 'steps' (nom utilisé dans le formulaire)
			$steps = $this->request->getPost('steps');
			if (!empty($steps) && is_array($steps))
			{
				$hostModel->updateHostsForPrebuiltTrip($id, $steps);
			}
			
			$logModel = new LogModel();
			$logModel->addLogEntry('Modification du voyage préfait avec ID : ' . $id, session()->get('idUser'));
			
			return redirect()->to('/admin/prebuiltTrips')->with('success', 'Voyage préfait mis à jour avec succès.');
		}
	
		$destinations = (new TripStepModel())->getAllSteps();
		$countries    = (new CountryModel())->getAllCountries();
		$existingHosts= $hostModel->getHostsByTripWithDetails($id);
	
		return view('admin/prebuiltTrips/edit', ['prebuiltTrip' => $prebuiltTrip, 'tripSteps' => $destinations, 'countries' => $countries, 'existingHosts' => $existingHosts]);
	}
	
	public function deletePrebuiltTrip($id)
	{
		$prebuiltTripModel = new PrebuiltTripModel();

		$prebuiltTripModel->deletePrebuiltTrip($id);

		$logModel = new LogModel();
		$logModel->addLogEntry('Suppression du voyage préfait avec ID : ' . $id, session()->get('idUser'));
		return redirect()->to('/admin/prebuiltTrips')->with('success', 'Voyage préfait supprimé avec succès.');
	}

	// Gestion des témoignages (avis)
	public function reviews()
	{
		$reviewModel = new ReviewModel();
		$userModel   = new UserModel();

		$reviews = $reviewModel->getAllReviews();

		return view('admin/reviews/list', ['reviews' => $reviews, 'users' => $userModel->getUserByReviews()]);
	}

	public function verifyReview($id)
	{
		$reviewModel = new ReviewModel();
		$logModel    = new LogModel();

		$review = $reviewModel->getReviewById($id);

		if (!$review)
		{
			return redirect()->to('/admin/reviews')->with('error', 'Témoignage non trouvé.');
		}

		$reviewModel->updateReview($id, ['verified' => 't']);
		$logModel->addLogEntry('Approuvement du témoignage ID ' . $id, session()->get('idUser'));
		return redirect()->to('/admin/reviews')->with('success', 'Témoignage vérifié avec succès.');
	}

	public function unverifyReview($id)
	{
		$reviewModel = new ReviewModel();
		$logModel    = new LogModel();

		$review = $reviewModel->getReviewById($id);

		if (!$review)
		{
			return redirect()->to('/admin/reviews')->with('error', 'Témoignage non trouvé.');
		}

		$reviewModel->updateReview($id, ['verified' => 'f']);
		$logModel->addLogEntry('Désapprouvement du témoignage ID ' . $id, session()->get('idUser'));
		return redirect()->to('/admin/reviews')->with('success', 'Témoignage non vérifié avec succès.');
	}

	public function deleteReview($id)
	{
		$reviewModel = new ReviewModel();
		$logModel    = new LogModel();

		$review = $reviewModel->getReviewById($id);

		if (!$review)
		{
			return redirect()->to('/admin/reviews')->with('error', 'Témoignage non trouvé.');
		}

		$reviewModel->deleteReviewById($id);
		$logModel->addLogEntry('Suppression du témoignage ID ' . $id, session()->get('idUser'));
		return redirect()->to('/admin/reviews')->with('success', 'Témoignage supprimé avec succès.');
	}

	// Gestion des extensions
	public function viewPrebuiltTripWithExtensions($id)
	{
		$prebuiltTripModel = new PrebuiltTripModel();
		$extensionModel    = new ExtensionModel();
		
		$prebuiltTrip = $prebuiltTripModel->getPrebuiltTripById($id);
		if (!$prebuiltTrip)
		{
			return redirect()->to('/admin/prebuiltTrips')->with('error', 'Voyage préfait non trouvé.');
		}

		// Récupérer toutes les extensions pour ce voyage
		$extensions = $extensionModel->getExtensionsByPrebuiltTrip($id, $prebuiltTrip['idUser']);
		
		return view('admin/prebuiltTrips/list',
		[
			'prebuiltTrip' => $prebuiltTrip,
			'extensions'   => $extensions
		]);
	}

	public function addExtension($prebuiltTripId)
	{
		$prebuiltTripModel = new PrebuiltTripModel();

		$prebuiltTrip = $prebuiltTripModel->getPrebuiltTripById($prebuiltTripId);
		
		if (!$prebuiltTrip)
		{
			return redirect()->to('/admin/prebuiltTrips')->with('error', 'Voyage préfait non trouvé.');
		}

		if ($this->request->getMethod() === 'POST')
		{
			$extensionModel = new ExtensionModel();

			$data = $this->request->getPost();
			
			// Utiliser les mêmes données que le voyage parent
			$data['idUser'] = $prebuiltTrip['idUser'];
			$data['type'] = $prebuiltTrip['type'];
			$data['departureDate'] = $prebuiltTrip['departureDate'];
			
			$extensionModel->addExtension($data);
			$logModel = new LogModel();
			$logModel->addLogEntry('Ajout de l\'extension : ' . $data['name'] . ' pour le voyage préfait ID : ' . $prebuiltTripId, session()->get('idUser'));
			return redirect()->to('/admin/prebuiltTrips')->with('success', 'Extension ajoutée avec succès.');
		}

		return view('admin/prebuiltTrips/addExtension', ['prebuiltTrip' => $prebuiltTrip]);
	}

	public function editExtension($extensionId)
	{
		$extensionModel = new ExtensionModel();
		$prebuiltTripModel = new PrebuiltTripModel();

		$extension = $extensionModel->getExtensionById($extensionId);
		
		if (!$extension)
		{
			return redirect()->to('/admin/prebuiltTrips')->with('error', 'Extension non trouvée.');
		}

		// Trouver le voyage parent (même idUser et même departureDate/type)
		$prebuiltTrip = $prebuiltTripModel->where('idUser', $extension['idUser'])
			->where('departureDate', $extension['departureDate'])
			->where('type', $extension['type'])
			->first();
		
		if (!$prebuiltTrip)
		{
			return redirect()->to('/admin/prebuiltTrips')->with('error', 'Voyage parent non trouvé.');
		}

		if ($this->request->getMethod() === 'POST')
		{
			$data = $this->request->getPost();
			
			$extensionModel->updateExtension($extensionId, $data);
			$logModel = new LogModel();
			$logModel->addLogEntry('Modification de l\'extension : ' . $data['title'] . ' (ID : ' . $extensionId . ')', session()->get('idUser'));
			return redirect()->to('/admin/prebuiltTrips')->with('success', 'Extension modifiée avec succès.');
		}

		return view('admin/prebuiltTrips/editExtension', [
			'extension' => $extension,
			'prebuiltTrip' => $prebuiltTrip
		]);
	}

	public function deleteExtension($extensionId, $prebuiltTripId)
	{
		$extensionModel = new ExtensionModel();

		$extensionModel->deleteExtensionById($extensionId);

		$logModel = new LogModel();
		$logModel->addLogEntry('Suppression de l\'extension ID : ' . $extensionId . ' pour le voyage préfait ID : ' . $prebuiltTripId, session()->get('idUser'));
		return redirect()->to('/admin/prebuiltTrips')->with('success', 'Extension supprimée avec succès.');
	}

	public function blog()
	{
		$blogModel = new BlogPostModel();
		$userModel = new UserModel();

		$data      =
		[
			'posts' => $blogModel->getAllPosts(),
			'users' => $userModel->getUsersByPosts(),
		];

		return view('admin/blog/list', $data);
	}

	public function addBlogPost()
	{
		$blogModel = new BlogPostModel();
		$logModel  = new LogModel();

		if ($this->request->getMethod() === 'POST')
		{
			$data = $this->request->getPost();

			$rules =
			[
				'title'   => 'required|max_length[255]',
				'type'    => 'required|in_list[Destinations,Budgets,Guides,Conseils]',
				'content' => 'required',
				'image'   => 'permit_empty|max_size[image,5120]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]',
			];

			if (!$this->validate($rules))
			{
				return redirect()->back()->withInput()->with('error', 'Veuillez corriger les erreurs dans le formulaire.');
			}

			// Gérer l'upload de l'image
			$imageFile = $this->request->getFile('image');
			$imageName = null;

			if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved())
			{
				// Générer un nom unique pour l'image
				$imageName = $imageFile->getRandomName();
				// Déplacer le fichier vers public/assets/images/
				$imageFile->move(FCPATH . 'assets/images', $imageName);
			}

			$data['idUser'] = session()->get('idUser');
			$data['date'] = date('Y-m-d H:i:s');
			$blogModel->addPost($data['title'], $data['type'], $data['date'], $data['content'], $imageName, $data['idUser']);
			$logModel->addLogEntry('Ajout d\'un nouveau post de blog', session()->get('idUser'));

			return redirect()->to('/admin/blog')->with('success', 'Post ajouté avec succès.');
		}

		return view('admin/blog/add');
	}

	public function editBlogPost($id)
	{
		$blogModel = new BlogPostModel();
		$logModel  = new LogModel();

		$post = $blogModel->getPostById($id);

		if (!$post)
		{
			return redirect()->to('/admin/blog')->with('error', 'Post non trouvé.');
		}

		if ($this->request->getMethod() === 'POST')
		{
			$data = $this->request->getPost();

			$rules =
			[
				'title'   => 'required|max_length[255]',
				'type'    => 'required|in_list[Destinations,Budgets,Guides,Conseils]',
				'content' => 'required',
				'image'   => 'permit_empty|max_size[image,5120]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]',
			];

			if (!$this->validate($rules))
			{
				return redirect()->back()->withInput()->with('error', 'Veuillez corriger les erreurs dans le formulaire.');
			}

			// Gérer l'upload de la nouvelle image si fournie
			$imageFile = $this->request->getFile('image');
			
			if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved())
			{
				// Supprimer l'ancienne image si elle existe
				if (!empty($post['image']) && file_exists(FCPATH . 'assets/images/' . $post['image']))
				{
					unlink(FCPATH . 'assets/images/' . $post['image']);
				}
				
				// Générer un nom unique pour la nouvelle image
				$data['image'] = $imageFile->getRandomName();
				// Déplacer le fichier vers public/assets/images/
				$imageFile->move(FCPATH . 'assets/images', $data['image']);
			}
			else
			{
				// Conserver l'image actuelle si aucune nouvelle image n'est uploadée
				unset($data['image']);
			}

			$blogModel->updatePost($id, $data);
			$logModel->addLogEntry('Mise à jour du post de blog ID ' . $id, session()->get('idUser'));
			return redirect()->to('/admin/blog')->with('success', 'Post mis à jour avec succès.');
		}

		return view('admin/blog/edit', ['post' => $post]);
	}

	public function deleteBlogPost($id)
	{
		$blogModel = new BlogPostModel();
		$logModel  = new LogModel();

		$blogModel->deletePost($id);

		$logModel->addLogEntry('Suppression du post de blog ID ' . $id, session()->get('idUser'));
		return redirect()->to('/admin/blog')->with('success', 'Post supprimé avec succès.');
	}
}