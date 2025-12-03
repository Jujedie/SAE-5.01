<?php

namespace App\Controllers;

use App\Models\Utilisateur;
use App\Models\Journal;

class ConnexionController extends BaseController
{
	public function index()
	{
		$session = session();
		helper(['form']);

		if ($session->get('isLoggedIn'))
		{
			return redirect()->to('/');
		}
		else
		{
			echo view('authentification/connexion');
		}
	}

	public function connexion()
	{
		$session = session();

		$utilisateurModel = new Utilisateur();
		$logModel = new Journal();

		$email = $this->request->getVar('email');
		$password = $this->request->getVar('mdp');

		$data = $utilisateurModel->getUtilisateurByEmail($email);

		if($data)
		{
			$pass = $data['mdp'];
			$authenticatePassword = password_verify($password, $pass);
			if ($authenticatePassword)
			{
				$ses_data =
				[
					'idUtil' => $data['idUtil'],
					'nom' => $data['nom'],
					'prenom' => $data['prenom'],
					'email' => $data['email'],
					'isLoggedIn' => TRUE
				];

				$session->set($ses_data);

				$session->setFlashdata('success', 'Connexion réussie !');

				$logModel->addLogEntry('Utilisateur connecté : ' . $data['email'], $data['idUtil']);
				return redirect()->to('/');
			}
			else
			{
				$session->setFlashdata('error', 'L\'adresse email ou le mot de passe est incorrect.');
				return redirect()->to('connexion');
			}
		}
		else
		{
			$session->setFlashdata('error', 'L\'adresse email ou le mot de passe est incorrect.');
			return redirect()->to('connexion');
		}
	}

	public function deconnexion()
	{
		$session = session();
		$session->destroy();
		return redirect()->to('connexion');
	}
}