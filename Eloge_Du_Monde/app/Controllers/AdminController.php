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
		$check = $this->checkAdmin();
		if ($check) return $check;

		// Afficher le tableau de bord admin
		return view('admin/HomeAdmin');
	}

	private function checkAdmin()
	{
		$session = session();
		
		// Vérifier si l'utilisateur est connecté
		if (!$session->get('isLoggedIn'))
			{
			return redirect()->to('/signin')->with('error', 'Vous devez être connecté pour accéder à cette page.');
		}

		// Vérifier si l'utilisateur est administrateur
		$userModel = new UserModel();
		if (!$userModel->isAdmin($session->get('idUser')))
		{
			return redirect()->to('/')->with('error', 'Accès refusé. Cette page est réservée aux administrateurs.');
		}

		return null;
	}

	// Gestion des réservations
	public function bookings()
	{
		$check = $this->checkAdmin();
		if ($check) return $check;

		$bookingModel = new BookingModel();
		$bookings = $bookingModel->getAllBookings();

		return view('admin/reservations/list',
		[
			'reservations' => $bookings
		]);
	}

	public function bookingDetail($idTrip, $idUser)
	{
		$check = $this->checkAdmin();
		if ($check) return $check;

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

		return view('admin/utilisateurs/list', ['users' => $users]);
	}

	public function editUser($id)
	{
		$check = $this->checkAdmin();
		if ($check) return $check;

		$userModel = new UserModel();
		$user = $userModel->getUserById($id);

		if (!$user)
		{
			return redirect()->to('/admin/users')->with('error', 'Utilisateur non trouvé.');
		}

		if ($this->request->getMethod() === 'POST')
		{
			$data = $this->request->getPost();
			
			// Ne pas mettre à jour le mot de passe s'il est vide
			if (empty($data['password']))
			{
				unset($data['password']);
			}
			else
			{
				$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
			}
			
			$userModel->updateUser($id, $data);
			return redirect()->to('/admin/users')->with('success', 'Utilisateur mis à jour avec succès.');
		}

		return view('admin/users/edit', ['user' => $user]);
	}

	public function deleteUser($id)
	{
		$check = $this->checkAdmin();
		if ($check) return $check;

		$userModel = new UserModel();
		$userModel->deleteUser($id);

		return redirect()->to('/admin/users')->with('success', 'Utilisateur supprimé avec succès.');
	}

	// Gestion des destinations
	public function countries()
	{
		$check = $this->checkAdmin();
		if ($check) return $check;

		$countryModel = new CountryModel();
		$countries = $countryModel->getAllCountries();

		return view('admin/destinations/list', ['destinations' => $countries]);
	}

	public function addCountry()
	{
		$check = $this->checkAdmin();
		if ($check) return $check;

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
		$check = $this->checkAdmin();
		if ($check) return $check;

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
		$check = $this->checkAdmin();
		if ($check) return $check;

		$countryModel = new CountryModel();
		$countryModel->deleteCountry($id);

		return redirect()->to('/admin/destinations')->with('success', 'Destination supprimée avec succès.');
	}

	// Gestion des voyages
	public function trips()
	{
		$check = $this->checkAdmin();
		if ($check) return $check;

		$tripModel = new TripModel();
		$prebuiltTripModel = new PrebuiltTripModel();
		
		$trips = $tripModel->getAllTrips();
		$prebuiltTrips = $prebuiltTripModel->getAllPrebuiltTrips();

		return view('admin/trips/list', ['trips' => $trips, 'prebuiltTrips' => $prebuiltTrips]);
	}

	public function editTrip($id)
	{
		$check = $this->checkAdmin();
		if ($check) return $check;

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
		$check = $this->checkAdmin();
		if ($check) return $check;

		$tripModel = new TripModel();
		$tripModel->deleteTrip($id);

		return redirect()->to('/admin/trips')->with('success', 'Voyage supprimé avec succès.');
	}

	// Gestion des témoignages (avis)
	public function reviews()
	{
		$check = $this->checkAdmin();
		if ($check) return $check;

		$reviewModel = new ReviewModel();
		$reviews = $reviewModel->getAllReviews();

		return view('admin/reviews/list', ['reviews' => $reviews]);
	}

	public function verifyReview($id)
	{
		$check = $this->checkAdmin();
		if ($check) return $check;

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
		$check = $this->checkAdmin();
		if ($check) return $check;

		$reviewModel = new ReviewModel();
		$reviewModel->deleteReviewById($id);

		return redirect()->to('/admin/reviews')->with('success', 'Témoignage supprimé avec succès.');
	}
}