<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\LogModel;

class SigninController extends BaseController
{
	public function index()
	{
		$session = session();
		helper(['form']);

		if ($session->get('isLoggedIn'))
		{
			return redirect()->to('/')->with('info', 'Vous êtes déjà connecté.');
		}
		else
		{
			echo view('authentication/signin');
		}
	}

	public function signin()
	{
		$session = session();

		$userModel = new UserModel();
		$logModel  = new LogModel();

		$email     = $this->request->getVar('email');
		$password  = $this->request->getVar('password');

		$data = $userModel->getUserByEmail($email);

		if($data)
		{
			$pass = $data['password'];
			$authenticatePassword = password_verify($password, $pass);
			if ($authenticatePassword)
			{
				$ses_data =
				[
					'idUser'     => $data['idUser'],
					'lastName'   => $data['lastName'],
					'firstName'  => $data['firstName'],
					'email'      => $data['email'],
					'isAdmin'    => ($data['role'] === 'admin') ? true : false,
					'isLoggedIn' => TRUE
				];

				$session->set($ses_data);

				$logModel->addLogEntry('Utilisateur connecté : ' . $data['email'], $data['idUser']);
				return redirect()->to('/')->with('success', 'Connexion réussie !');
			}
			else
			{
				return redirect()->to('signin')->with('error', 'L\'adresse email ou le mot de passe est incorrect.');
			}
		}
		else
		{
			return redirect()->to('signin')->with('error', 'L\'adresse email ou le mot de passe est incorrect.');
		}
	}

	public function signout()
	{
		$session = session();
		$session->destroy();
		return redirect()->to('signin')->with('success', 'Vous avez été déconnecté avec succès.');
	}
}