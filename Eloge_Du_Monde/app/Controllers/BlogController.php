<?php

namespace App\Controllers;

use App\Models\BlogPostModel;
use App\Models\UserModel;

class BlogController extends BaseController
{
	public function index()
	{
		$blogModel = new BlogPostModel();
		$userModel = new UserModel();

		$posts = $blogModel->getAllPosts();

		$data =
		[
			'posts' => $posts,
			'users' => $userModel->getUsersByPosts(),
			'count' => $blogModel->getPostCount(),
		];

		return view('blog', $data);
	}
}