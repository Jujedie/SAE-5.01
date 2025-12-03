<?php

namespace App\Controllers;

use App\Models\Utilisateur;

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
			'mdp' => 'required|min_length[4]|max_length[50]',
			'confirmationMdp' => 'matches[mdp]',
		];

		if ($this->validate($rules))
		{
			$session = session();

			$utilisateurModel = new Utilisateur();
			$data =
			[
				'nom' => $this->request->getVar('nom'),
				'prenom' => $this->request->getVar('prenom'),
				'email' => $this->request->getVar('email'),
				'mdp' => password_hash($this->request->getVar('mdp'),
				PASSWORD_DEFAULT),
			];

			$utilisateurModel->ajouterUtilisateur($data);

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