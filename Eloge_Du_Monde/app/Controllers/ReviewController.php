<?php

namespace App\Controllers;

use App\Models\ReviewModel;

class ReviewController extends BaseController
{
	/**
	 * Affiche les avis vérifiés et l'information de note moyenne.
	 */
	public function index()
	{
		$reviewModel = new ReviewModel();

		$reviews = $reviewModel->getVerifiedReviews();

		$avgRow = $reviewModel->getAverageRating();
		$average = 0.0;
		if (is_array($avgRow))
		{
			if (isset($avgRow['rating']))
			{
				$average = (float) $avgRow['rating'];
			}
			elseif (isset($avgRow['rating_avg']))
			{
				$average = (float) $avgRow['rating_avg'];
			}
		}

		$data = [
			'reviews' => $reviews,
			'average' => $average,
			'count'   => is_array($reviews) ? count($reviews) : 0,
		];

		return view('reviews', $data);
	}

	/**
	 * Enregistre un nouvel avis (POST).
	 * - Utilisateur doit être connecté (session 'isLoggedIn').
	 * - Valide `rating` (1-5) et `content` (min 10).
	 * Retourne JSON si requête AJAX, sinon redirige avec flashdata.
	 */
	public function store()
	{
		helper(['form']);

		$session = session();

		if (! $session->get('isLoggedIn'))
		{
			if ($this->request->isAJAX())
			{
				return $this->response->setJSON(['status' => false, 'message' => 'Vous devez être connecté pour laisser un avis.']);
			}

			return redirect()->to('signin')->with('error', 'Vous devez être connecté pour laisser un avis.');
		}

		if ($this->request->getMethod() !== 'post')
		{
			return redirect()->to('reviews');
		}

		$rules = [
			'rating'  => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[5]',
			'content' => 'required|min_length[10]|max_length[2000]',
		];

		if (! $this->validate($rules))
		{
			$errors = $this->validator->getErrors();
			if ($this->request->isAJAX())
			{
				return $this->response->setJSON(['status' => false, 'errors' => $errors]);
			}

			return redirect()->back()->withInput()->with('error', array_values($errors)[0]);
		}

		$reviewModel = new ReviewModel();

		$data = [
			'rating'  => (int) $this->request->getPost('rating'),
			'content' => $this->request->getPost('content'),
			'verified' => 0,
			'idUser'  => $session->get('idUser'),
		];

		$insertId = $reviewModel->addReview($data);

		if ($insertId)
		{
			$message = 'Merci, votre avis a été soumis et sera publié après vérification.';
			if ($this->request->isAJAX())
			{
				return $this->response->setJSON(['status' => true, 'message' => $message]);
			}

			return redirect()->to('reviews')->with('success', $message);
		}

		if ($this->request->isAJAX())
		{
			return $this->response->setJSON(['status' => false, 'message' => 'Impossible d\'enregistrer l\'avis.']);
		}

		return redirect()->back()->withInput()->with('error', 'Impossible d\'enregistrer l\'avis.');
	}
}
