<?php
namespace App\Controllers;

use App\Models\Utilisateur;

class AdminController extends BaseController
{
	public function index()
	{
		$session = session();
		
		// Vérifier si l'utilisateur est connecté
		if (!$session->get('isLoggedIn')) {
			return redirect()->to('/connexion')->with('error', 'Vous devez être connecté pour accéder à cette page.');
		}

		// Vérifier si l'utilisateur est administrateur
		$utilisateur = new Utilisateur();
		if (!$utilisateur->estAdmin($session->get('idUtil'))) {
			return redirect()->to('/accueil')->with('error', 'Accès refusé. Cette page est réservée aux administrateurs.');
		}

		// Afficher le tableau de bord admin
		return view('admin/HomeAdmin');
	}

	public function dashboard()
	{
		return $this->index();
	}
}
