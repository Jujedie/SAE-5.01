<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

use App\Models\Utilisateur;

class RoleGuard implements FilterInterface
{
	public function before(RequestInterface $request, $arguments = null)
	{

		$utilisateurModel = new Utilisateur();
		$idUtil = session()->get('idUtil');

		if (!$idUtil || $utilisateurModel->estAdmin($idUtil) === false)
		{
			return redirect()->to('/errors/html/error_403')->with('error', 'Accès refusé : vous devez être directeur pour accéder à cette page.');
		}
	}

	public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
	{
		
	}
}