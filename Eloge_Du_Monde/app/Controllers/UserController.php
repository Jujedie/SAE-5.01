<?php
namespace App\Controllers;

use App\Models\Utilisateur;

class UserController extends BaseController
{
	public function profil()
	{
		$session = session();

		// Vérifier si l'utilisateur est connecté
		if (!$session->get('isLoggedIn')) {
			return redirect()->to('/connexion')->with('error', 'Vous devez être connecté pour accéder à cette page.');
		}

		$utilisateurModel = new Utilisateur();
		$utilisateur = $utilisateurModel->find($session->get('idUser'));

		return view('profil', [
			'utilisateur' => $utilisateur
		]);
	}
}