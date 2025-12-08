<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\BookingModel;
use App\Models\CountryModel;
use App\Models\TripModel;
use App\Models\TripStepModel;
use App\Models\PrebuiltTripModel;
use App\Models\ExtensionModel;
use App\Models\ReviewModel;
use App\Models\LogModel;

class AdminController extends BaseController
{
	public function index()
	{
		// Afficher le tableau de bord admin
		$countryModel       = new CountryModel();
		$userModel          = new UserModel();
		$bookingModel       = new BookingModel();
		$tripModel          = new TripModel();
		$reviewModel        = new ReviewModel();
		$prebuiltTripModel  = new PrebuiltTripModel();

		$data =
		[
			'destinationsCount'  => $countryModel->countAllResults(),
			'usersCount'         => $userModel->getUsersCount(),
			'bookingsCount'      => $bookingModel->getBookingsCount(),
			'tripsCount'         => $tripModel->getTripsCount(),
			'reviewsCount'       => $reviewModel->getReviewsCount(),
			'countriesCount'     => $countryModel->getCountriesCount(),
			'continentsCount'    => $countryModel->getContinentsCount(),
			'prebuiltTripsCount' => $prebuiltTripModel->countAllResults(),
		];

		return view('admin/homeAdmin', $data);
	}

	// Gestion des réservations
	public function bookings()
	{
		$bookingModel = new BookingModel();
		$bookings = $bookingModel->getAllBookings();

		return view('admin/reservations/list',
		[
			'reservations' => $bookings
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
			$data = $this->request->getPost();

			$countryModel->addCountry($data);
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
			return redirect()->to('/admin/countries')->with('success', 'Pays mis à jour avec succès.');
		}

		return view('admin/countries/edit', ['country' => $country]);
	}

	public function deleteCountry($id)
	{
		$countryModel = new CountryModel();
		$countryModel->deleteCountry($id);

		return redirect()->to('/admin/countries')->with('success', 'Pays supprimé avec succès.');
	}

	// Gestion des destinations d'un pays
	public function countryDestinations($idCountry)
	{
		$countryModel = new CountryModel();
		$tripStepModel = new TripStepModel();
		
		$country = $countryModel->getCountryById($idCountry);
		
		if (!$country)
		{
			return redirect()->to('/admin/countries')->with('error', 'Pays non trouvé.');
		}
		
		$destinations = $tripStepModel->getStepsByCountry($idCountry);

		return view('admin/countries/destinations', [
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
			$data['idCountry'] = $idCountry;

			$tripStepModel->addStep($data);
			return redirect()->to('/admin/countries/' . $idCountry . '/destinations')->with('success', 'Destination ajoutée avec succès.');
		}

		return view('admin/countries/addDestination', ['country' => $country]);
	}

	public function editDestination($idCountry, $idDestination)
	{
		$countryModel = new CountryModel();
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
			return redirect()->to('/admin/countries/' . $idCountry . '/destinations')->with('success', 'Destination mise à jour avec succès.');
		}

		return view('admin/countries/editDestination', [
			'country' => $country,
			'destination' => $destination
		]);
	}

	public function deleteDestination($idCountry, $idDestination)
	{
		$tripStepModel = new TripStepModel();
		$tripStepModel->deleteStep($idDestination);

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
		$trip = $tripModel->getTripById($id);

		if (!$trip)
		{
			return redirect()->to('/admin/trips')->with('error', 'Voyage non trouvé.');
		}

		if ($this->request->getMethod() === 'POST')
		{
			$data = $this->request->getPost();
			$tripModel->updateTrip($id, $data);
			return redirect()->to('/admin/trips')->with('success', 'Voyage mis à jour avec succès.');
		}

		return view('admin/trips/edit', ['trip' => $trip]);
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
		$extensionModel = new ExtensionModel();
		
		$prebuiltTrips = $prebuiltTripModel->getAllPrebuiltTrips();
		
		// Récupérer les extensions pour chaque voyage
		$tripsWithExtensions = [];
		foreach ($prebuiltTrips as $trip) {
			$trip['extensions'] = $extensionModel->getExtensionsByPrebuiltTrip($trip['idTrip'], $trip['idUser']);
			$tripsWithExtensions[] = $trip;
		}

		return view('admin/prebuiltTrips/list', ['prebuiltTrips' => $tripsWithExtensions]);
	}

	public function addPrebuiltTrip()
	{
		if ($this->request->getMethod() === 'POST')
		{
			$prebuiltTripModel = new PrebuiltTripModel();
			$data = $this->request->getPost();
			
			// Ajouter l'ID de l'utilisateur connecté
			$data['idUser'] = session()->get('idUser');
			
			$prebuiltTripModel->addPrebuiltTrip($data);
			return redirect()->to('/admin/prebuiltTrips')->with('success', 'Voyage préfait ajouté avec succès.');
		}

		return view('admin/prebuiltTrips/add');
	}

	public function editPrebuiltTrip($id)
	{
		$prebuiltTripModel = new PrebuiltTripModel();
		$prebuiltTrip = $prebuiltTripModel->getPrebuiltTripById($id);

		if (!$prebuiltTrip)
		{
			return redirect()->to('/admin/prebuiltTrips')->with('error', 'Voyage préfait non trouvé.');
		}

		if ($this->request->getMethod() === 'POST')
		{
			$data = $this->request->getPost();
			$prebuiltTripModel->updatePrebuiltTrip($id, $data);
			return redirect()->to('/admin/prebuiltTrips')->with('success', 'Voyage préfait mis à jour avec succès.');
		}

		return view('admin/prebuiltTrips/edit', ['prebuiltTrip' => $prebuiltTrip]);
	}

	public function deletePrebuiltTrip($id)
	{
		$prebuiltTripModel = new PrebuiltTripModel();
		$prebuiltTripModel->deletePrebuiltTrip($id);

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
		$logModel = new LogModel();

		$review = $reviewModel->getReviewById($id);

		if (!$review)
		{
			return redirect()->to('/admin/reviews')->with('error', 'Témoignage non trouvé.');
		}

		$logModel->addLogEntry('Approuvement du témoignage ID ' . $id, session()->get('idUser'));
		$reviewModel->updateReview($id, ['verified' => 't']);
		return redirect()->to('/admin/reviews')->with('success', 'Témoignage vérifié avec succès.');
	}

	public function unverifyReview($id)
	{
		$reviewModel = new ReviewModel();
		$logModel = new LogModel();
		$review = $reviewModel->getReviewById($id);

		if (!$review)
		{
			return redirect()->to('/admin/reviews')->with('error', 'Témoignage non trouvé.');
		}

		$logModel->addLogEntry('Désapprouvement du témoignage ID ' . $id, session()->get('idUser'));
		$reviewModel->updateReview($id, ['verified' => 'f']);
		return redirect()->to('/admin/reviews')->with('success', 'Témoignage non vérifié avec succès.');
	}

	public function deleteReview($id)
	{
		$reviewModel = new ReviewModel();
		$logModel = new LogModel();
		$review = $reviewModel->getReviewById($id);

		if (!$review)
		{
			return redirect()->to('/admin/reviews')->with('error', 'Témoignage non trouvé.');
		}

		$logModel->addLogEntry('Suppression du témoignage ID ' . $id, session()->get('idUser'));
		$reviewModel->deleteReviewById($id);

		return redirect()->to('/admin/reviews')->with('success', 'Témoignage supprimé avec succès.');
	}

	// Gestion des extensions
	public function viewPrebuiltTripWithExtensions($id)
	{
		$prebuiltTripModel = new PrebuiltTripModel();
		$extensionModel = new ExtensionModel();
		
		$prebuiltTrip = $prebuiltTripModel->getPrebuiltTripById($id);
		if (!$prebuiltTrip)
		{
			return redirect()->to('/admin/prebuiltTrips')->with('error', 'Voyage préfait non trouvé.');
		}
		
		// Récupérer toutes les extensions pour ce voyage
		$extensions = $extensionModel->getExtensionsByPrebuiltTrip($id, $prebuiltTrip['idUser']);
		
		return view('admin/prebuiltTrips/list', [
			'prebuiltTrip' => $prebuiltTrip,
			'extensions' => $extensions
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
			return redirect()->to('/admin/prebuiltTrips/view/' . $prebuiltTripId)->with('success', 'Extension ajoutée avec succès.');
		}

		return view('admin/prebuiltTrips/addExtension', ['prebuiltTrip' => $prebuiltTrip]);
	}

	public function deleteExtension($extensionId, $prebuiltTripId)
	{
		$extensionModel = new ExtensionModel();
		$extensionModel->deleteExtensionById($extensionId);

		return redirect()->to('/admin/prebuiltTrips/view/' . $prebuiltTripId)->with('success', 'Extension supprimée avec succès.');
	}
}