<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\BlogPostModel;

class HomeController extends BaseController
{
	public function index()
	{
		$session = session();

		$userModel = new UserModel();
		return view('home', ["isAdmin" => $userModel->isAdmin($session->get('idUser'))]);
	}

	public function blog()
	{
		$blogModel = new BlogPostModel();
		$posts = $blogModel->getAllPosts();
		
		return view('blog', ['posts' => $posts]);
	}

	public function reviews()
	{
		return view('reviews');
	}

	public function error403()
	{
		return view('errors/html/error_403');
	}

	public function contact()
	{
		return view('contact');
	}
}