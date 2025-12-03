<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

use App\Models\UserModel;

class RoleGuard implements FilterInterface
{
	public function before(RequestInterface $request, $arguments = null)
	{

		$userModel = new UserModel();
		$idUser = session()->get('idUser');

		if (!$idUser || $userModel->isAdmin($idUser) === false)
		{
			return redirect()->to('/errors/html/error_403')->with('error', 'Accès refusé : vous devez être directeur pour accéder à cette page.');
		}
	}

	public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
	{
		
	}
}