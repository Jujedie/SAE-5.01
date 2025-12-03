<?php
namespace App\Controllers;

use App\Models\Utilisateur;
use App\Models\Reserver;
use App\Models\Pays;
use App\Models\Voyage;

class AdminController extends BaseController
{
	private function checkAdmin()
	{
		$session = session();
		
		// Vérifier si l'utilisateur est connecté
		if (!$session->get('isLoggedIn')) {
			return redirect()->to('/connexion')->with('error', 'Vous devez être connecté pour accéder à cette page.');
		}

		// Vérifier si l'utilisateur est administrateur
		$utilisateur = new Utilisateur();
		if (!$utilisateur->estAdmin($session->get('idUtil'))) {
			return redirect()->to('/accueil')->with('error', 'Accès refusé. Cette page est réservée aux administrateurs.');
		}
		
		return null;
	}

	public function index()
	{
		$check = $this->checkAdmin();
		if ($check) return $check;

		// Afficher le tableau de bord admin
		return view('admin/HomeAdmin');
	}

	public function dashboard()
	{
		return $this->index();
	}

	// Gestion des réservations
	public function reservations()
	{
		$check = $this->checkAdmin();
		if ($check) return $check;

		$reserverModel = new Reserver();
		$reservations = $reserverModel->findAll();

		return view('admin/reservations/liste', [
			'reservations' => $reservations
		]);
	}

	public function reservationDetail($id)
	{
		$check = $this->checkAdmin();
		if ($check) return $check;

		$reserverModel = new Reserver();
		$reservation = $reserverModel->find($id);

		if (!$reservation) {
			return redirect()->to('/admin/reservations')->with('error', 'Réservation non trouvée.');
		}

		return view('admin/reservations/detail', [
			'reservation' => $reservation
		]);
	}

	// Gestion des utilisateurs
	public function utilisateurs()
	{
		$check = $this->checkAdmin();
		if ($check) return $check;

		$utilisateurModel = new Utilisateur();
		$utilisateurs = $utilisateurModel->findAll();

		return view('admin/utilisateurs/liste', [
			'utilisateurs' => $utilisateurs
		]);
	}

	public function utilisateurEdit($id)
	{
		$check = $this->checkAdmin();
		if ($check) return $check;

		$utilisateurModel = new Utilisateur();
		$utilisateur = $utilisateurModel->find($id);

		if (!$utilisateur) {
			return redirect()->to('/admin/utilisateurs')->with('error', 'Utilisateur non trouvé.');
		}

		if ($this->request->getMethod() === 'post') {
			$data = $this->request->getPost();
			$utilisateurModel->update($id, $data);
			return redirect()->to('/admin/utilisateurs')->with('success', 'Utilisateur mis à jour avec succès.');
		}

		return view('admin/utilisateurs/edit', [
			'utilisateur' => $utilisateur
		]);
	}

	public function utilisateurDelete($id)
	{
		$check = $this->checkAdmin();
		if ($check) return $check;

		$utilisateurModel = new Utilisateur();
		$utilisateurModel->delete($id);

		return redirect()->to('/admin/utilisateurs')->with('success', 'Utilisateur supprimé avec succès.');
	}

	// Gestion des destinations
	public function destinations()
	{
		$check = $this->checkAdmin();
		if ($check) return $check;

		$paysModel = new Pays();
		$destinations = $paysModel->findAll();

		return view('admin/destinations/liste', [
			'destinations' => $destinations
		]);
	}

	public function destinationAjouter()
	{
		$check = $this->checkAdmin();
		if ($check) return $check;

		if ($this->request->getMethod() === 'post') {
			$paysModel = new Pays();
			$data = $this->request->getPost();
			$paysModel->insert($data);
			return redirect()->to('/admin/destinations')->with('success', 'Destination ajoutée avec succès.');
		}

		return view('admin/destinations/ajouter');
	}

	public function destinationEdit($id)
	{
		$check = $this->checkAdmin();
		if ($check) return $check;

		$paysModel = new Pays();
		$destination = $paysModel->find($id);

		if (!$destination) {
			return redirect()->to('/admin/destinations')->with('error', 'Destination non trouvée.');
		}

		if ($this->request->getMethod() === 'post') {
			$data = $this->request->getPost();
			$paysModel->update($id, $data);
			return redirect()->to('/admin/destinations')->with('success', 'Destination mise à jour avec succès.');
		}

		return view('admin/destinations/edit', [
			'destination' => $destination
		]);
	}

	public function destinationDelete($id)
	{
		$check = $this->checkAdmin();
		if ($check) return $check;

		$paysModel = new Pays();
		$paysModel->delete($id);

		return redirect()->to('/admin/destinations')->with('success', 'Destination supprimée avec succès.');
	}

	// Gestion des voyages
	public function voyages()
	{
		$check = $this->checkAdmin();
		if ($check) return $check;

		$voyageModel = new Voyage();
		$voyages = $voyageModel->findAll();

		return view('admin/voyages/liste', [
			'voyages' => $voyages
		]);
	}
}
