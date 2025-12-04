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
		$session = session();
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

			// Message HTML
			$message = "
				<!DOCTYPE html>
				<html lang='fr'>
				<head>
					<meta charset='UTF-8'>
					<style>
						body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
						.container { max-width: 600px; margin: 0 auto; padding: 20px; }
						.header { background-color: #243342; color: white; padding: 20px; text-align: center; border-radius: 5px 5px 0 0; }
						.content { background-color: #f9f9f9; padding: 30px; border: 1px solid #ddd; }
						.button { display: inline-block; padding: 12px 30px; background-color: #28a745; color: white; text-decoration: none; border-radius: 5px; margin: 20px 0; }
						.footer { text-align: center; padding: 20px; font-size: 12px; color: #777; }
					</style>
				</head>
				<body>
					<div class='container'>
						<div class='header'>
							<h2>Réinitialisation de mot de passe</h2>
						</div>
						<div class='content'>
							<p>Bonjour,</p>
							<p>Vous avez demandé à réinitialiser votre mot de passe pour votre compte sur Eloge du monde.</p>
							<p>Pour créer un nouveau mot de passe, cliquez sur le bouton ci-dessous :</p>
							<p style='text-align: center;'>
								<a href='$resetLink' style='color: #ffffffff;' class='button'>Réinitialiser mon mot de passe</a>
							</p>
							<p><strong>Important :</strong> Ce lien est valable pendant 1 heure seulement.</p>
							<p>Si vous n'avez pas demandé cette réinitialisation, vous pouvez ignorer cet email en toute sécurité.</p>
							<p>Cordialement,<br>L'équipe Eloge Du Monde</p>
						</div>
						<div class='footer'>
							<p>Département Informatique - IUT du Havre - Groupe 1<br>&copy; " . date('Y') . " - Tous droits réservés</p>
						</div>
					</div>
				</body>
				</html>
			";

			// Utilisez la classe Email de CodeIgniter pour envoyer l'e-mail
			$emailService = \Config\Services::email();

			//paramètres du mail
			$from ='louisagullo.05@gmail.com';

			//envoi du mail
			$emailService->setTo($email);
			$emailService->setFrom($from, 'Eloge Du Monde');
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