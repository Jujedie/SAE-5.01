<?php
namespace App\Controllers;

use App\Models\Utilisateur;

class AccueilController extends BaseController
{
	public function index()
	{
		$session = session();

		$utilisateur = new Utilisateur();
		return view('accueil', ["estDirecteur" => $utilisateur->estDirecteur($session->get('idUtil'))]);
	}

	public function home()
	{
		return view('home');
	}

	public function error403()
	{
		return view('errors/html/error_403');
	}
}