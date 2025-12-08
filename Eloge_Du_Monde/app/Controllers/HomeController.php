<?php

namespace App\Controllers;

use App\Models\UserModel;

class HomeController extends BaseController
{
	public function index()
	{
		$session = session();

		$userModel = new UserModel();
		return view('home', ["isAdmin" => $userModel->isAdmin($session->get('idUser'))]);
	}

	public function blog()
	{
		return view('blog');
	}

	public function createTrip()
	{
		return view('createTrip');
	}

	public function error403()
	{
		return view('errors/html/error_403');
	}
}