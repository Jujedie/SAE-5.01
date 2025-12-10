<?php

namespace App\Models;

use CodeIgniter\Model;

class HostModel extends Model
{
	protected $table            = 'host';
	protected $primaryKey       = ['idTrip', 'idTripStep'];
	protected $useAutoIncrement = true;
	protected $returnType       = 'array';
	protected $useSoftDeletes   = false;
	protected $protectFields    = true;
	protected $allowedFields    = ['idTrip', 'idTripStep', 'nbDays', 'nbNights'];

	protected bool $allowEmptyInserts = false;
	protected bool $updateOnlyChanged = true;

	protected array $casts        = [];
	protected array $castHandlers = [];

	// Dates
	protected $useTimestamps = false;
	protected $dateFormat    = 'datetime';
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';

	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks = true;
	protected $beforeInsert   = [];
	protected $afterInsert    = [];
	protected $beforeUpdate   = [];
	protected $afterUpdate    = [];
	protected $beforeFind     = [];
	protected $afterFind      = [];
	protected $beforeDelete   = [];
	protected $afterDelete    = [];

	public function addHostsForPrebuiltTrip($idTrip, $tripSteps)
	{
		foreach ($tripSteps as $step) {
			$this->insert([
				'idTrip'     => $idTrip,
				'idTripStep' => $step['idTripStep'],
				'nbDays'     => $step['nbDays'],
				'nbNights'   => $step['nbNights'],
			]);
		}
	}
	public function getAllHosts()
	{
		return $this->findAll();
	}

	public function getHostsByTrip($idTrip)
	{
		return $this->where('idTrip', $idTrip)->findAll();
	}

	public function getHostsByStep($idTripStep)
	{
		return $this->where('idTripStep', $idTripStep)->findAll();
	}

	public function getHost($idTrip, $idTripStep)
	{
		return $this->where(['idTrip' => $idTrip, 'idTripStep' => $idTripStep])->first();
	}

	public function addHost($data)
	{
		return $this->insert($data);
	}

	public function updateHost($idTrip, $idTripStep, $data)
	{
		return $this->where(['idTrip' => $idTrip, 'idTripStep' => $idTripStep])->set($data)->update();
	}

	public function updateHostsForPrebuiltTrip($idTrip, $tripSteps)
	{
		// Supprimer les anciennes étapes
		$this->where('idTrip', $idTrip)->delete();
		if (empty($tripSteps) || !$idTrip) {
			return;
		}
		
		// Ajouter les nouvelles étapes
		foreach ($tripSteps as $step) {
			$this->insert([
				'idTrip'     => $idTrip,
				'idTripStep' => $step['idTripStep'],
				'nbDays'     => $step['nbDays'],
				'nbNights'   => $step['nbNights'],
			]);
		}
	}

	public function deleteHost($idTrip, $idTripStep)
	{
		return $this->where(['idTrip' => $idTrip, 'idTripStep' => $idTripStep])->delete();
	}

	public function getHostsByTripWithDetails($idTrip)
	{
		$db = \Config\Database::connect();
		$query = $db->query('
			SELECT h.*, ts.name, ts.cost, ts."idCountry", c.name as country, c.continent
			FROM host h
			JOIN "tripStep" ts ON ts."idTripStep" = h."idTripStep"
			LEFT JOIN country c ON c."idCountry" = ts."idCountry"
			WHERE h."idTrip" = ?
			ORDER BY h."idTripStep" ASC
		', [$idTrip]);
		return $query->getResultArray();
	}

	public function updateHostsForTrip($idTrip, $steps)
	{
		// Supprimer les anciennes étapes
		$this->deleteHostsByTrip($idTrip);
		
		// Ajouter les nouvelles étapes
		if (!empty($steps)) {
			$this->addHostsForPrebuiltTrip($idTrip, $steps);
		}
		
		return true;
	}

	public function deleteHostsByTrip($idTrip)
	{
		$db = \Config\Database::connect();
		return $db->query('DELETE FROM host WHERE "idTrip" = ?', [$idTrip]);
	}
}