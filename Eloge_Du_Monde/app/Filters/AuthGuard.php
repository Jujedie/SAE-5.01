<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthGuard implements FilterInterface
{
	public function before(RequestInterface $request, $arguments = null)
	{
		helper('cookie');
		if (get_cookie('user_id_cookie'))
		{
			log_message('info', 'Cookie trouvé, connexion automatique de l\'utilisateur ID : ' . get_cookie('user_id_cookie'));
			session()->set('isLoggedIn', true);
			session()->set('idUtil', get_cookie('user_id_cookie'));
		}

		if (!session()->get('isLoggedIn'))
		{
			return redirect()->to('connexion');
		}
	}

	public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
	{
		
	}
}