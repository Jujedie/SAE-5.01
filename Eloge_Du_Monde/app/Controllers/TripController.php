<?php

namespace App\Controllers;

use App\Models\PrebuiltTripModel;
use App\Models\TripModel;
use App\Models\HostModel;
use App\Models\UserModel;

class TripController extends BaseController
{
	public function index()
	{
		$filter    = [$this->request->getGet('filter') => $this->request->getGet('value')];
		$session   = session();
		$tripModel = new TripModel();

		$trips = [];
		if (!empty($filter))
		{
			$trips = $tripModel->getTripsByFilter($filter);
		}
		else
		{
			$trips = $tripModel->getAllTrips();
		}

		return view('trips/index', ["user" => ((new UserModel())->getUserById($session->get('idUser'))), "listTrips" => $trips]);
	}

	public function createPersonalTrip()
	{
		$session = session();

		// Vérifier si l'utilisateur est connecté
		if (!$session->get('isLoggedIn'))
		{
			return redirect()->to('/signin')->with('error', 'Vous devez être connecté pour créer un voyage personnalisé.');
		}

		return view('trips/createTrip', ["isAdmin" => (new UserModel())->isAdmin($session->get('idUser'))]);
	}

	public function viewTrip($idTrip)
	{
		$session   = session();
		$tripModel = new TripModel();

		$trip = $tripModel->getTripById($idTrip);
		if (!$trip)
		{
			return redirect()->to('/trips')->with('error', 'Le voyage demandé n\'existe pas.');
		}

		return view('trips/viewTrip', ["isAdmin" => (new UserModel())->isAdmin($session->get('idUser')), "trip" => $trip]);
	}

	public function getCountriesData()
	{
		$countryModel  = new \App\Models\CountryModel();
		$tripStepModel = new \App\Models\TripStepModel();

		$countries = $countryModel->getAllCountries();
		$data      = [];

		foreach ($countries as $country)
		{
			$continent    = strtolower($country['continent'] ?? 'autre');
			$destinations = $tripStepModel->getStepsByCountry($country['idCountry']);
			
			if (!isset($data[$continent]))
			{
				$data[$continent] = [];
			}
			
			$data[$continent][$country['name']] =
			[
				'idCountry'    => $country['idCountry'],
				'cost'         => $country['cost'] ?? 0,
				'destinations' => array_map(function($dest)
				{
					return
					[
						'idTripStep' => $dest['idTripStep'],
						'name'       => $dest['name'],
						'cost'       => $dest['cost'] ?? 0
					];
				}, $destinations)
			];
		}

		return $this->response->setJSON($data);
	}

	public function createTrip()
	{
		if (!session()->get('isLoggedIn'))
		{
			return $this->response->setJSON
			([
				'success' => false,
				'message' => 'Vous devez être connecté pour créer un voyage.'
			])->setStatusCode(401);
		}

		$json = $this->request->getJSON();
		
		if (!$json || !isset($json->destinations) || empty($json->destinations))
		{
			return $this->response->setJSON
			([
				'success' => false,
				'message' => 'Données invalides'
			])->setStatusCode(400);
		}

		$tripModel = new TripModel();
		$hostModel = new HostModel();

		// Utiliser la date de départ fournie ou aujourd'hui par défaut
		$departureDate = $json->departureDate ?? date('Y-m-d');

		// Créer le voyage
		$dataTrip =
		[
			'departureDate' => $departureDate,
			'type'          => 'individuel',
			'idUser'        => session()->get('idUser')
		];

		$tripModel->insert($dataTrip);
		$idTrip = $tripModel->getInsertID();

		// Créer les hosts (destinations) pour chaque étape
		foreach ($json->destinations as $dest)
		{
			$nights = $dest->nights ?? 3;
			$days   = $nights + 1;
			$sql    = "INSERT INTO host (\"idTrip\", \"idTripStep\", \"nbDays\", \"nbNights\") VALUES (?, ?, ?, ?)";
			$hostModel->db->query($sql, [$idTrip, $dest->idTripStep, $days, $nights]);
		}

		return $this->response->setJSON
		([
			'success' => true,
			'message' => 'Voyage créé avec succès',
			'idTrip'  => $idTrip
		]);
	}
}