<?php

namespace App\Controllers;

use App\Models\UserModel;

class ForgotPasswordController extends BaseController
{
	public function index()
	{
		helper(['form']);
		return view('authentication/forgotPassword');
	}

	public function sendResetLink()
	{
		$email = $this->request->getPost('email');

		$userModel = new UserModel();
		$user = $userModel->getUserByEmail($email);

		if ($user)
		{
			// Générer un jeton de réinitialisation de MDP et enregistrer-le dans BD
			$token = bin2hex(random_bytes(16));
			$expiration = date('Y-m-d H:i:s', strtotime('+1 hour'));
			$userModel->set('resetToken', $token)->set('resetTokenExpiration', $expiration)->update($user['idUser']);

			// Envoyer l'e-mail avec le lien de réinitialisation
			$resetLink = site_url("resetPassword/$token");

			// Générer le message HTML depuis la vue
			$message = view('emails/emailResetPassword', ['resetLink' => $resetLink]);

			$emailService = service('email');

			$emailService->setTo($email);
			$emailService->setFrom('louisagullo.05@gmail.com', 'Eloge Du Monde');
			$emailService->setSubject('Réinitialisation de votre mot de passe');
			$emailService->setMailType('html');
			$emailService->setMessage($message);

			if (!$emailService->send())
			{
				return redirect()->to('forgotPassword')->with('error', 'Erreur lors de l\'envoi de l\'email.');
			}
			else
			{
				return redirect()->to('signin')->with('success', 'Si l\'email inscrit est correct, un email de réinitialisation a été envoyé.');
			}
		}
		else
		{
			return redirect()->to('signin')->with('success', 'Si l\'email inscrit est correct, un email de réinitialisation a été envoyé.');
		}
	}
}