<?php

namespace App\Controllers;

use App\Models\UserModel;

class TripController extends BaseController
{
	public function index($filter = []){
		$session = session();

		$trips = [];
		if (!empty($filter)) {
			$tripModel = new \App\Models\TripModel();
			$trips = $tripModel->getTripsByFilter($filter);
		} else {
			$tripModel = new \App\Models\TripModel();
			$trips = $tripModel->getAllTrips();
		}

		return view('trips', ["listTrips" => $trips]);
	}
}