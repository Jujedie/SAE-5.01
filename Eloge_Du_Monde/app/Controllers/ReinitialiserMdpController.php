<?php

namespace App\Controllers;

use App\Models\Utilisateur;

class ReinitialiserMdpController extends BaseController
{
	public function index($token)
	{
		helper(['form']);
		$utilisateurModel = new Utilisateur();
		$utilisateur = $utilisateurModel->getUtilisateurByResetToken($token);
		
		if ($utilisateur)
		{
			return view('authentification/reinitialiserMdp', ['token' => $token]);
		}
		else
		{
			$session = session();
			$session->setFlashdata('error', 'Le lien de réinitialisation est invalide ou a expiré.');
			return redirect()->to('oublieMdp');
		}
	}

	public function majMdp()
	{
		$session = session();

		$token = $this->request->getPost('token');
		$mdp = $this->request->getPost('mdp');
		$confirmationMdp = $this->request->getPost('confirmationMdp');

		// Valider et traiter les données du formulaire
		$utilisateurModel = new Utilisateur();
			$utilisateur = $utilisateurModel->getUtilisateurByResetToken($token);

		if ($utilisateur && $mdp === $confirmationMdp)
		{
			// Mettre à jour le mot de passe et réinitialiser le jeton
			$hashedPassword = password_hash($mdp, PASSWORD_DEFAULT);
			$utilisateurModel->updatePasswordUtilisateur($utilisateur['idUtil'], $hashedPassword);

			$session->setFlashdata('success', 'Votre mot de passe a été réinitialisé avec succès.');
			return redirect()->to('connexion');
		}
		else
		{
			$session->setFlashdata('error', 'Les mots de passe ne correspondent pas ou le lien est invalide.');
			return redirect()->to('reinitialiserMdp/' . $token);
		}
	}
}