<?php
namespace App\Controllers;

use App\Models\Utilisateur;

class HomeController extends BaseController
{
	public function index()
	{
		$session = session();

		$utilisateur = new Utilisateur();
		return view('home', ["estAdmin" => $utilisateur->estAdmin($session->get('idUtil'))]);
	}

	public function error403()
	{
		return view('errors/html/error_403');
	}
}