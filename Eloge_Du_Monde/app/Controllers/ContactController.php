<?php

namespace App\Controllers;

use Config\Email;
use Config\Services;

class ContactController extends BaseController
{
	public function index()
	{
		return view('contact');
	}

	public function send()
	{
		if ($this->request->getMethod() !== 'POST')
		{
			return redirect()->to('/contact');
		}

		$name = $this->request->getPost('name');
		$email = $this->request->getPost('email');
		$phone = $this->request->getPost('phone');
		$subject = $this->request->getPost('subject');
		$message = $this->request->getPost('message');

		// Validation
		if (empty($name) || empty($email) || empty($subject) || empty($message))
		{
			return redirect()->to('/contact')->with('error', 'Veuillez remplir tous les champs obligatoires.');
		}

		// Configuration de l'email
		$emailConfig = new Email();
		$emailService = Services::email();

		$emailService->setFrom($email, $name);
		$emailService->setTo($emailConfig->SMTPUser); // Utilise l'email configuré dans Email.php
		$emailService->setSubject('Contact Éloge du Monde - ' . $subject);
		
		$emailBody = "Nouveau message de contact\n\n";
		$emailBody .= "Nom: " . $name . "\n";
		$emailBody .= "Email: " . $email . "\n";
		$emailBody .= "Téléphone: " . ($phone ?: 'Non renseigné') . "\n\n";
		$emailBody .= "Message:\n" . $message;
		
		$emailService->setMessage($emailBody);

		try
		{
			if ($emailService->send())
			{
				return redirect()->to('/contact')->with('success', 'Votre message a été envoyé avec succès. Nous vous répondrons dans les plus brefs délais.');
			}
			else
			{
				log_message('error', 'Email sending failed: ' . $emailService->printDebugger());
				return redirect()->to('/contact')->with('error', 'Une erreur est survenue lors de l\'envoi du message. Veuillez réessayer.');
			}
		}
		catch (\Exception $e)
		{
			log_message('error', 'Email exception: ' . $e->getMessage());
			return redirect()->to('/contact')->with('error', 'Une erreur est survenue. Veuillez nous contacter par téléphone.');
		}
	}
}
