<?php

namespace App\Controllers;

use App\Models\ReviewModel;
use App\Models\UserModel;

class ReviewController extends BaseController
{
	// Affiche les avis vérifiés et l'information de note moyenne.
	public function index()
	{
		$reviewModel = new ReviewModel();
		$userModel   = new UserModel();

		$reviews = $reviewModel->getVerifiedReviews();

		$avgRow  = $reviewModel->getAverageRating();
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

		$data =
		[
			'reviews' => $reviews,
			'average' => $average,
			'count'   => $reviewModel->getReviewsCount(),
			'users'   => $userModel->getUsersByVerifiedReviews(),
		];

		return view('reviews', $data);
	}

	// Enregistre un nouvel avis
	public function store()
	{
		helper(['form']);

		$session = session();

		if (!$session->get('isLoggedIn'))
		{
			return redirect()->to('signin')->with('error', 'Vous devez être connecté pour laisser un avis.');
		}

		if ($this->request->getMethod() !== 'POST')
		{
			return redirect()->to('reviews');
		}

		$rules =
		[
			'rating'  => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[5]',
			'content' => 'required|min_length[10]|max_length[2000]',
		];

		if (!$this->validate($rules))
		{
			$errors = $this->validator->getErrors();

			return redirect()->back()->withInput()->with('error', array_values($errors)[0]);
		}

		$reviewModel = new ReviewModel();

		$data =
		[
			'rating'   => (int) $this->request->getPost('rating'),
			'content'  => $this->request->getPost('content'),
			'verified' => false,
			'idUser'   => $session->get('idUser'),
		];

		$insertId = $reviewModel->addReview($data);

		if ($insertId)
		{
			$message = 'Merci, votre avis a été soumis et sera publié après vérification.';
			return redirect()->to('reviews')->with('success', $message);
		}

		return redirect()->back()->withInput()->with('error', 'Impossible d\'enregistrer l\'avis.');
	}
}