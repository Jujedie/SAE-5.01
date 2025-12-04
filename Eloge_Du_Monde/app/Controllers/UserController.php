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

	public function toggleNewsletter()
	{
		$session = session();

		// Vérifier si l'utilisateur est connecté
		if (!$session->get('isLoggedIn'))
		{
			return redirect()->to('/signin')->with('error', 'Vous devez être connecté pour accéder à cette page.');
		}

		$userModel = new UserModel();
		$user = $userModel->find($session->get('idUser'));

		// Basculer l'état de l'abonnement à la newsletter
		$isSubscribed = ($user['isSubscribed'] == 't') ? 'f' : 't';
		$userModel->update($user['idUser'], ['isSubscribed' => $isSubscribed]);

		return redirect()->to('/profile')->with('success', 'Votre abonnement à la newsletter a été mis à jour.');
	}

	public function deleteUser()
	{
		$session = session();

		// Vérifier si l'utilisateur est connecté
		if (!$session->get('isLoggedIn'))
		{
			return redirect()->to('/signin')->with('error', 'Vous devez être connecté pour accéder à cette page.');
		}

		$userModel = new UserModel();
		$userModel->delete($session->get('idUser'));

		// Détruire la session de l'utilisateur
		$session->destroy();

		return redirect()->to('/')->with('success', 'Votre compte a été supprimé avec succès.');
	}

	public function updateUser()
	{
		$session = session();

		// Vérifier si l'utilisateur est connecté
		if (!$session->get('isLoggedIn'))
		{
			return redirect()->to('/signin')->with('error', 'Vous devez être connecté pour accéder à cette page.');
		}

		$userModel = new UserModel();
		$user = $userModel->find($session->get('idUser'));

		// Récupérer les données du formulaire
		$lastName  = $this->request->getPost('lastName');
		$firstName = $this->request->getPost('firstName');
		$email     = $this->request->getPost('email');
		$phone     = $this->request->getPost('phone');

		// Mettre à jour les informations de l'utilisateur
		$userModel->update($user['idUser'],
		[
			'lastName'  => $lastName,
			'firstName' => $firstName,
			'email'     => $email,
			'phone'     => $phone,
		]);

		return redirect()->to('/profile')->with('success', 'Votre profil a été mis à jour avec succès.');
	}
}