<?php
namespace App\Controllers;

use App\Models\Utilisateur;
use App\Models\Reserver;
use App\Models\Pays;
use App\Models\Voyage;
use App\Models\VoyagePrefait;
use App\Models\Avis;

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
		$utilisateurModel = new Utilisateur();
		if (!$utilisateurModel->estAdmin($session->get('idUtil'))) {
			return redirect()->to('/')->with('error', 'Accès refusé. Cette page est réservée aux administrateurs.');
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
		$reservations = $reserverModel->getAllReservations();

		return view('admin/reservations/liste', [
			'reservations' => $reservations
		]);
	}

	public function reservationDetail($idVoyage, $idUtil)
	{
		$check = $this->checkAdmin();
		if ($check) return $check;

		$reserverModel = new Reserver();
		$voyageModel = new Voyage();
		$utilisateurModel = new Utilisateur();

		$voyage = $voyageModel->getVoyageById($idVoyage);
		$utilisateur = $utilisateurModel->getUtilisateurById($idUtil);

		if (!$voyage || !$utilisateur) {
			return redirect()->to('/admin/reservations')->with('error', 'Réservation non trouvée.');
		}

		return view('admin/reservations/detail', [
			'voyage' => $voyage,
			'utilisateur' => $utilisateur
		]);
	}

	// Gestion des utilisateurs
	public function utilisateurs()
	{
				$utilisateurModel = new Utilisateur();
		$utilisateurs = $utilisateurModel->getAllUtilisateurs();

		return view('admin/utilisateurs/liste', [
			'utilisateurs' => $utilisateurs
		]);
	}

	public function utilisateurEdit($id)
	{
		$check = $this->checkAdmin();
		if ($check) return $check;

		$utilisateurModel = new Utilisateur();
		$utilisateur = $utilisateurModel->getUtilisateurById($id);

		if (!$utilisateur) {
			return redirect()->to('/admin/utilisateurs')->with('error', 'Utilisateur non trouvé.');
		}

		if ($this->request->getMethod() === 'post') {
			$data = $this->request->getPost();
			
			// Ne pas mettre à jour le mot de passe s'il est vide
			if (empty($data['mdp'])) {
				unset($data['mdp']);
			} else {
				$data['mdp'] = password_hash($data['mdp'], PASSWORD_DEFAULT);
			}
			
			$utilisateurModel->updateUtilisateur($id, $data);
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
		$utilisateurModel->deleteUtilisateur($id);

		return redirect()->to('/admin/utilisateurs')->with('success', 'Utilisateur supprimé avec succès.');
	}

	// Gestion des destinations
	public function destinations()
	{
		$check = $this->checkAdmin();
		if ($check) return $check;

		$paysModel = new Pays();
		$destinations = $paysModel->getAllPays();

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
			$paysModel->addPays($data);
			return redirect()->to('/admin/destinations')->with('success', 'Destination ajoutée avec succès.');
		}

		return view('admin/destinations/ajouter');
	}

	public function destinationEdit($id)
	{
		$check = $this->checkAdmin();
		if ($check) return $check;

		$paysModel = new Pays();
		$destination = $paysModel->getPaysById($id);

		if (!$destination) {
			return redirect()->to('/admin/destinations')->with('error', 'Destination non trouvée.');
		}

		if ($this->request->getMethod() === 'post') {
			$data = $this->request->getPost();
			$paysModel->updatePays($id, $data);
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
		$paysModel->deletePays($id);

		return redirect()->to('/admin/destinations')->with('success', 'Destination supprimée avec succès.');
	}

	// Gestion des voyages
	public function voyages()
	{
		$check = $this->checkAdmin();
		if ($check) return $check;

		$voyageModel = new Voyage();
		$voyagePrefaitModel = new VoyagePrefait();
		
		$voyages = $voyageModel->getAllVoyages();
		$voyagesPrefaits = $voyagePrefaitModel->getAllVoyagesPrefaits();

		return view('admin/voyages/liste', [
			'voyages' => $voyages,
			'voyagesPrefaits' => $voyagesPrefaits
		]);
	}

	public function voyageEdit($id)
	{
		$check = $this->checkAdmin();
		if ($check) return $check;

		$voyageModel = new Voyage();
		$voyage = $voyageModel->getVoyageById($id);

		if (!$voyage) {
			return redirect()->to('/admin/voyages')->with('error', 'Voyage non trouvé.');
		}

		if ($this->request->getMethod() === 'post') {
			$data = $this->request->getPost();
			$voyageModel->updateVoyage($id, $data);
			return redirect()->to('/admin/voyages')->with('success', 'Voyage mis à jour avec succès.');
		}

		return view('admin/voyages/edit', [
			'voyage' => $voyage
		]);
	}

	public function voyageDelete($id)
	{
		$check = $this->checkAdmin();
		if ($check) return $check;

		$voyageModel = new Voyage();
		$voyageModel->deleteVoyage($id);

		return redirect()->to('/admin/voyages')->with('success', 'Voyage supprimé avec succès.');
	}

	// Gestion des témoignages (avis)
	public function temoignages()
	{
		$check = $this->checkAdmin();
		if ($check) return $check;

		$avisModel = new Avis();
		$temoignages = $avisModel->getAllAvis();

		return view('admin/temoignages/liste', [
			'temoignages' => $temoignages
		]);
	}

	public function temoignageVerifier($id)
	{
		$check = $this->checkAdmin();
		if ($check) return $check;

		$avisModel = new Avis();
		$avis = $avisModel->getAvisById($id);

		if (!$avis) {
			return redirect()->to('/admin/temoignages')->with('error', 'Témoignage non trouvé.');
		}

		$avisModel->updateAvis($id, ['verified' => 1]);
		return redirect()->to('/admin/temoignages')->with('success', 'Témoignage vérifié avec succès.');
	}

	public function temoignageDelete($id)
	{
		$check = $this->checkAdmin();
		if ($check) return $check;

		$avisModel = new Avis();
		$avisModel->deleteAvisById($id);

		return redirect()->to('/admin/temoignages')->with('success', 'Témoignage supprimé avec succès.');
	}
}
