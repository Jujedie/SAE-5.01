<?php

namespace App\Controllers;

use App\Models\UserModel;

class ResetPasswordController extends BaseController
{
	public function index($token)
	{
		helper(['form']);
		$userModel = new UserModel();
		$user = $userModel->getUserByResetToken($token);
		
		if ($user)
		{
			return view('authentication/resetPassword', ['token' => $token]);
		}
		else
		{
			$session = session();
			$session->setFlashdata('error', 'Le lien de réinitialisation est invalide ou a expiré.');
			return redirect()->to('forgotPassword');
		}
	}

	public function updatePassword()
	{
		$session = session();

		$token = $this->request->getPost('token');
		$password = $this->request->getPost('password');
		$confirmPassword = $this->request->getPost('confirmPassword');

		// Valider et traiter les données du formulaire
		$userModel = new UserModel();
		$user = $userModel->getUserByResetToken($token);

		if ($user && $password === $confirmPassword)
		{
			// Mettre à jour le mot de passe et réinitialiser le jeton
			$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
			$userModel->updatePassword($user['idUser'], $hashedPassword);

			$session->setFlashdata('success', 'Votre mot de passe a été réinitialisé avec succès.');
			return redirect()->to('signin');
		}
		else
		{
			$session->setFlashdata('error', 'Les mots de passe ne correspondent pas ou le lien est invalide.');
			return redirect()->to('resetPassword/' . $token);
		}
	}
}