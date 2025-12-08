<?php

namespace App\Controllers;

use App\Models\TripModel;
use App\Models\UserModel;

class TripController extends BaseController
{
	public function index($filter = [])
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

		return view('trips', ["user" => ((new UserModel())->getUserById($session->get('idUser'))), "listTrips" => $trips]);
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

			$tripModel->createPersonalTrip($dataTrip, $steps);

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
}