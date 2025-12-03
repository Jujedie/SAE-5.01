<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
	public function profile()
	{
		$session = session();

		// Vérifier si l'utilisateur est connecté
		if (!$session->get('isLoggedIn'))
		{
			return redirect()->to('/signin')->with('error', 'Vous devez être connecté pour accéder à cette page.');
		}

		$userModel = new UserModel();
		$user = $userModel->find($session->get('idUser'));

		return view('profile', ['user' => $user]);
	}
}