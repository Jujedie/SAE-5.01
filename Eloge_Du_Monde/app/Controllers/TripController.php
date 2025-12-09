<?php

namespace App\Controllers;

use App\Models\PrebuiltTripModel;
use App\Models\TripModel;
use App\Models\HostModel;
use App\Models\UserModel;

class TripController extends BaseController
{
	public function index(String $filter = "")
	{
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

		return view('trip/index', ["user" => ((new UserModel())->getUserById($session->get('idUser'))), "listTrips" => $trips]);
	}

	public function createPersonalTrip()
	{
		$session = session();

		// Vérifier si l'utilisateur est connecté
		if (!$session->get('isLoggedIn'))
		{
			return redirect()->to('/signin')->with('error', 'Vous devez être connecté pour créer un voyage personnalisé.');
		}

		return view('trip/create_trip', ["isAdmin" => ((new UserModel())->isAdmin($session->get('idUser')))]);
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
	
	public function creationPersonalTrip()
	{
		if (!session()->get('isLoggedIn'))
		{
			return redirect()->to('/signin')->with('error', 'Vous devez être connecté pour créer un voyage personnalisé.');
		}

		helper(['form']);
		$rules =
		[
			'departureDate' => 'required|valid_date',
			'type'          => 'required|string',
			'cost' 		    => 'integer|greater_than_equal_to[0]',
			'steps'         => 'required|array',
		];

		if ($this->validate($rules))
		{
			$tripModel = new TripModel();
			$logModel  = new LogModel();
			$tripStepModel = new TripStepModel();

			$dataTrip =
			[
				'departureDate' => $this->request->getVar('departureDate'),
				'type'          => $this->request->getVar('type'),
				'idUser'        => session()->get('idUser'),
			];

			$steps = $tripStepModel->stepsExists($this->request->getVar('steps'));

			$tripModel->createTrip($dataTrip, $steps);

			return redirect()->to('/trips')->with('success', 'Votre voyage personnalisé a été créé avec succès.');
		}
		else
		{
			return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
		}
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

		return view('trip/view_trip', ["isAdmin" => ((new UserModel())->isAdmin($session->get('idUser'))), "trip" => $trip]);
	}

	public function getCountriesData()
	{
		$countryModel = new \App\Models\CountryModel();
		$tripStepModel = new \App\Models\TripStepModel();

		$countries = $countryModel->getAllCountries();
		$data = [];

		foreach ($countries as $country) {
			$continent = strtolower($country['continent'] ?? 'autre');
			$destinations = $tripStepModel->getStepsByCountry($country['idCountry']);
			
			if (!isset($data[$continent])) {
				$data[$continent] = [];
			}
			
			$data[$continent][$country['name']] = [
				'idCountry' => $country['idCountry'],
				'cost' => $country['cost'] ?? 0,
				'destinations' => array_map(function($dest) {
					return [
						'idTripStep' => $dest['idTripStep'],
						'name' => $dest['name'],
						'cost' => $dest['cost'] ?? 0
					];
				}, $destinations)
			];
		}

		return $this->response->setJSON($data);
	}

	public function createTrip()
	{
		if (!session()->get('isLoggedIn')) {
			return $this->response->setJSON([
				'success' => false,
				'message' => 'Vous devez être connecté pour créer un voyage.'
			])->setStatusCode(401);
		}

		$json = $this->request->getJSON();
		
		if (!$json || !isset($json->destinations) || empty($json->destinations)) {
			return $this->response->setJSON([
				'success' => false,
				'message' => 'Données invalides'
			])->setStatusCode(400);
		}

		$tripModel = new TripModel();
		$hostModel = new HostModel();

		// Utiliser la date de départ fournie ou aujourd'hui par défaut
		$departureDate = $json->departureDate ?? date('Y-m-d');

		// Créer le voyage
		$dataTrip = [
			'departureDate' => $departureDate,
			'type' => 'individuel',
			'idUser' => session()->get('idUser')
		];

		$tripModel->insert($dataTrip);
		$idTrip = $tripModel->getInsertID();

		// Créer les hosts (destinations) pour chaque étape
		foreach ($json->destinations as $dest) {
			$nights = $dest->nights ?? 3;
			$days = $nights + 1;
			$sql = "INSERT INTO host (\"idTrip\", \"idTripStep\", \"nbDays\", \"nbNights\") VALUES (?, ?, ?, ?)";
			$hostModel->db->query($sql, [$idTrip, $dest->idTripStep, $days, $nights]);
		}

		return $this->response->setJSON([
			'success' => true,
			'message' => 'Voyage créé avec succès',
			'idTrip' => $idTrip
		]);
	}
}