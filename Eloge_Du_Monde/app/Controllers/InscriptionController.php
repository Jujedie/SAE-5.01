<?php

namespace App\Controllers;

use App\Models\Utilisateur;
use App\Models\Journal;

class InscriptionController extends BaseController
{
	public function index()
	{
		$session = session();
		helper(['form']);

		if ($session->get('isLoggedIn'))
		{
			return redirect()->to('accueil');
		}
		else
		{
			echo view('authentification/inscription');
		}
	}

	public function enregistrer()
	{
		helper(['form']);
		$rules =
		[
			'nom' => 'required|min_length[2]|max_length[50]',
			'prenom' => 'required|min_length[2]|max_length[50]',
			'email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[utilisateur.email]',
			'telephone' => 'required|min_length[10]|max_length[15]',
			'mdp' => 'required|min_length[4]|max_length[50]',
			'confirmationMdp' => 'matches[mdp]',
		];

		if ($this->validate($rules))
		{
			$session = session();

			$utilisateurModel = new Utilisateur();
			$logModel = new Journal();

			$data =
			[
				'nom' => $this->request->getVar('nom'),
				'prenom' => $this->request->getVar('prenom'),
				'email' => $this->request->getVar('email'),
				'telephone' => $this->request->getVar('telephone'),
				'mdp' => password_hash($this->request->getVar('mdp'),
				PASSWORD_DEFAULT),
				'role' => 'user',
			];

			$utilisateurModel->addUtilisateur($data);
			$logModel->addLogEntry('Nouvelle utilisateur inscrit : ' . $data['email'], $utilisateurModel->getUtilisateurByEmail($data['email'])['idUtil']);

			$session->set('idUtil', $utilisateurModel->getUtilisateurByEmail($data['email'])['idUtil']);
			$session->set('nom', $data['nom']);
			$session->set('prenom', $data['prenom']);
			$session->set('email', $data['email']);
			$session->set('isLoggedIn', true);

			$session->setFlashdata('success', 'Inscription réussie !');
			return redirect()->to('accueil');
		}
		else
		{
			$data['validation'] = $this->validator;
			echo view('authentification/inscription', $data);
		}
	}
}