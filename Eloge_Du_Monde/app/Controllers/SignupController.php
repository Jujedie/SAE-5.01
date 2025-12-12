<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\LogModel;

class SignupController extends BaseController
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
			echo view('authentications/signup');
		}
	}

	public function register()
	{
		helper(['form']);
		$rules =
		[
			'lastName'        => 'required|min_length[2]|max_length[50]',
			'firstName'       => 'required|min_length[2]|max_length[50]',
			'email'           => 'required|min_length[4]|max_length[255]|valid_email|is_unique[user.email]',
			'phone'           => 'max_length[20]',
			'password'        => 'required|min_length[4]|max_length[50]',
			'confirmPassword' => 'matches[password]',
		];

		if ($this->validate($rules))
		{
			$session = session();

			$userModel = new UserModel();
			$logModel  = new LogModel();

			$data =
			[
				'lastName'  => $this->request->getVar('lastName'),
				'firstName' => $this->request->getVar('firstName'),
				'email'     => $this->request->getVar('email'),
				'password'  => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
				'role'      => 'user',
			];

			if ($this->request->getVar('phone')) {
				$data['phone'] = $this->request->getVar('phone');
			}

			$userModel->addUser($data);
			$logModel->addLogEntry('Nouvelle utilisateur inscrit : ' . $data['email'], $userModel->getUserByEmail($data['email'])['idUser']);

			$session->set('idUser', $userModel->getUserByEmail($data['email'])['idUser']);
			$session->set('lastName', $data['lastName']);
			$session->set('firstName', $data['firstName']);
			$session->set('email', $data['email']);
			$session->set('isLoggedIn', true);

			return redirect()->to('/')->with('success', 'Inscription réussie !');
		}
		else
		{
			$data['validation'] = $this->validator;
			echo view('authentications/signup', $data);
		}
	}
}