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

		if (!$user)
		{
			session()->destroy();
			return redirect()->to('/signin')->with('error', 'Utilisateur non trouvé. Veuillez vous reconnecter.');
		}

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

		helper(['form']);
		$rules =
		[
			'lastName'        => 'required|min_length[2]|max_length[50]',
			'firstName'       => 'required|min_length[2]|max_length[50]',
			'email'           => 'required|min_length[4]|max_length[100]|valid_email',
			'phone'           => 'max_length[15]',
			'confirmPassword' => 'matches[password]',
		];
		
		if ($this->validate($rules))
		{

			$userModel = new UserModel();
			$user      = $userModel->find($session->get('idUser'));

			// Récupérer les données du formulaire
			$lastName  = $this->request->getPost('lastName');
			$firstName = $this->request->getPost('firstName');
			$email     = $this->request->getPost('email');
			$phone     = $this->request->getPost('phone');

			if ($this->request->getPost('password'))
			{
				$password = password_hash($this->request->getPost('password'), PASSWORD_BCRYPT);
				// Mettre à jour le mot de passe si un nouveau mot de passe est fourni
				$userModel->update($user['idUser'], ['password' => $password]);
			}

			if ( $this->request->getPost('email') !== $user['email'] )
			{
				// Vérifier si l'email est déjà utilisé par un autre utilisateur
				$existingUser = $userModel->where('email', $email)->first();
				if ($existingUser && $existingUser['idUser'] != $user['idUser'])
				{
					return redirect()->to('/profile/updateUser')->with('error', 'L\'adresse email est déjà utilisée par un autre compte.');
				}
			}

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
		else
		{
			return redirect()->to('profile')->with('error', 'Votre profil n\'a pas pu être mis à jour. Veuillez vérifier les informations saisies.');
		}
	}
}