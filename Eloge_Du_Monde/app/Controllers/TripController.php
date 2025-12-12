<?php

namespace App\Controllers;

use App\Models\PrebuiltTripModel;
use App\Models\HostModel;
use App\Models\UserModel;
use App\Models\TripModel;

class TripController extends BaseController
{
	public function index()
	{
		$session   = session();
		$tripModel = new PrebuiltTripModel();

		$trips = [];
		
		// Vérifier si on a un paramètre thematic dans l'URL
		$thematic = $this->request->getGet('thematic');
		if (!empty($thematic)) {
			$trips = $tripModel->getPrebuiltsByFilter(['thematic' => $thematic]);
		}
		// Sinon vérifier l'ancien système de filtres
		elseif (!empty($this->request->getGet('filter')) && !empty($this->request->getGet('value')))
		{
			$filter = [$this->request->getGet('filter') => $this->request->getGet('value')];
			$trips = $tripModel->getPrebuiltsByFilter($filter);
		}
		else
		{
			$trips = $tripModel->getAllPrebuiltTrips();
		}

		$hostModel = new HostModel();
		foreach ($trips as &$trip) {
			$hosts = $hostModel->getHostsByTripWithDetails($trip['idTrip']);
			$trip['steps'] = $hosts;
		}
		unset($trip); // Détruire la référence

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
		$tripModel = new PrebuiltTripModel();

		$trip = $tripModel->getPrebuiltTripById($idTrip);
		if (!$trip)
		{
			return redirect()->to('/trips')->with('error', 'Le voyage demandé n\'existe pas.');
		}
		
		$tripHostModel = new HostModel();
		$hosts         = $tripHostModel->getHostsByTripWithDetails($idTrip);
		$trip['steps'] = $hosts;

		return view('trips/viewTrip', ["trip" => $trip, "isConnected" => $session->get('isLoggedIn')]);
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
		try
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
			
			log_message('info', 'Creating trip with data: ' . json_encode($json));
			
			if (!$json || !isset($json->destinations) || empty($json->destinations))
			{
				return $this->response->setJSON
				([
					'success' => false,
					'message' => 'Données invalides : aucune destination fournie'
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

			log_message('info', 'Tentative insertion voyage: ' . json_encode($dataTrip));

			// Désactiver temporairement la validation
			$tripModel->skipValidation(true);
			$insertResult = $tripModel->insert($dataTrip, false);
			
			if (!$insertResult)
			{
				$errors = $tripModel->errors();
				log_message('error', 'Erreur insertion voyage: ' . json_encode($errors));
				log_message('error', 'Last query: ' . $tripModel->getLastQuery());
				return $this->response->setJSON
				([
					'success' => false,
					'message' => 'Erreur lors de la création du voyage',
					'errors'  => $errors,
					'debug'   => [
						'data' => $dataTrip,
						'lastQuery' => (string)$tripModel->getLastQuery()
					]
				])->setStatusCode(500);
			}

			$idTrip = $tripModel->getInsertID();
			log_message('info', 'Voyage créé avec ID: ' . $idTrip);

			// Créer les hosts (destinations) pour chaque étape
			$hostModel->skipValidation(true);
			foreach ($json->destinations as $dest)
			{
				if (!isset($dest->idTripStep))
				{
					log_message('error', 'idTripStep manquant pour une destination');
					continue;
				}

				$nights = isset($dest->nights) ? (int)$dest->nights : 3;
				$days   = $nights + 1;
				
				$hostData =
				[
					'idTrip'     => $idTrip,
					'idTripStep' => $dest->idTripStep,
					'nbDays'     => $days,
					'nbNights'   => $nights
				];

				log_message('info', 'Insertion host: ' . json_encode($hostData));
				
				$hostInsertResult = $hostModel->insert($hostData, false);
				
				if (!$hostInsertResult)
				{
					log_message('error', 'Erreur insertion host: ' . json_encode($hostModel->errors()));
					log_message('error', 'Last query: ' . $hostModel->getLastQuery());
				}
			}

			return $this->response->setJSON
			([
				'success' => true,
				'message' => 'Voyage créé avec succès',
				'idTrip'  => $idTrip
			]);
		}
		catch (\Exception $e)
		{
			log_message('error', 'Exception création voyage: ' . $e->getMessage());
			log_message('error', 'Stack trace: ' . $e->getTraceAsString());
			
			return $this->response->setJSON
			([
				'success' => false,
				'message' => 'Erreur lors de la création du voyage: ' . $e->getMessage()
			])->setStatusCode(500);
		}
	}
}