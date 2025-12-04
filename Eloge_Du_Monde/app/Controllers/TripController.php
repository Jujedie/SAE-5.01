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
}