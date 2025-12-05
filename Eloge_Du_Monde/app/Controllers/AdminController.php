<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\BookingModel;
use App\Models\CountryModel;
use App\Models\TripModel;
use App\Models\PrebuiltTripModel;
use App\Models\ReviewModel;

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

	// Gestion des destinations
	public function countries()
	{
		$countryModel = new CountryModel();
		$countries = $countryModel->getAllCountries();

		return view('admin/destinations/list', ['destinations' => $countries]);
	}

	public function addCountry()
	{
		if ($this->request->getMethod() === 'POST')
		{
			$countryModel = new CountryModel();
			$data = $this->request->getPost();

			$countryModel->addCountry($data);

			return redirect()->to('/admin/destinations')->with('success', 'Destination ajoutée avec succès.');
		}

		return view('admin/destinations/add');
	}

	public function editCountry($id)
	{
		$countryModel = new CountryModel();
		$country = $countryModel->getCountryById($id);

		if (!$country)
		{
			return redirect()->to('/admin/destinations')->with('error', 'Destination non trouvée.');
		}

		if ($this->request->getMethod() === 'POST')
		{
			$data = $this->request->getPost();
			$countryModel->updateCountry($id, $data);
			return redirect()->to('/admin/destinations')->with('success', 'Destination mise à jour avec succès.');
		}

		return view('admin/destinations/edit', ['destination' => $country]);
	}

	public function deleteCountry($id)
	{
		$countryModel = new CountryModel();
		$countryModel->deleteCountry($id);

		return redirect()->to('/admin/destinations')->with('success', 'Destination supprimée avec succès.');
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
		$prebuiltTrips = $prebuiltTripModel->getAllPrebuiltTrips();

		return view('admin/prebuiltTrips/list', ['prebuiltTrips' => $prebuiltTrips]);
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
		$reviews = $reviewModel->getAllReviews();

		return view('admin/reviews/list', ['reviews' => $reviews]);
	}

	public function verifyReview($id)
	{
		$reviewModel = new ReviewModel();
		$review = $reviewModel->getReviewById($id);

		if (!$review)
		{
			return redirect()->to('/admin/reviews')->with('error', 'Témoignage non trouvé.');
		}

		$reviewModel->updateReview($id, ['verified' => 1]);
		return redirect()->to('/admin/reviews')->with('success', 'Témoignage vérifié avec succès.');
	}

	public function deleteReview($id)
	{
		$reviewModel = new ReviewModel();
		$reviewModel->deleteReviewById($id);

		return redirect()->to('/admin/reviews')->with('success', 'Témoignage supprimé avec succès.');
	}
}