<?php

namespace App\Models;

use CodeIgniter\Model;

class HostModel extends Model
{
	protected $table            = 'host';
	protected $primaryKey       = null;
	protected $useAutoIncrement = false;
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

	protected function doInsert(array $row)
	{
		$escape       = $this->escape;
		$this->escape = [];

		// Skip primary key check for composite keys
		$builder = $this->builder();

		// Must use the set() method to ensure to set the correct escape flag
		foreach ($row as $key => $val) {
			$builder->set($key, $val, $escape[$key] ?? null);
		}

		$result = $builder->insert();

		// If insertion succeeded then save the insert ID
		if ($result) {
			$this->insertID = null; // No auto-increment for composite keys
		}

		return $result;
	}

	public function addHostsForPrebuiltTrip($idTrip, $tripSteps)
	{
		$prebuiltModel = new PrebuiltTripModel();
		if (!in_array($idTrip, $prebuiltModel->idInTable($idTrip))) {
			return [];
		}

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

	public function getStepsByTrip($idTrip)
	{
		return (new TripStepModel())
			->join('host h', 'h."idTripStep" = "tripStep"."idTripStep"')
			->where('h."idTrip"', $idTrip)
			->findAll();
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
		$tripModel = new TripModel();
		if (!in_array($idTrip, $tripModel->idInTable($idTrip)))
		{
			return;
		}

		return $this->where(['idTrip' => $idTrip, 'idTripStep' => $idTripStep])->set($data)->update();
	}

	public function updateHostsForPrebuiltTrip($idTrip, $tripSteps)
	{
		$prebuiltModel = new PrebuiltTripModel();
		$extension = new ExtensionModel();
		// Exclure les extensions - on ne veut que les prebuilt trips
		if (in_array($idTrip, $extension->idInTable($idTrip)))
		{
			return [];
		}
		// Vérifier que c'est bien un prebuilt trip
		if (!in_array($idTrip, $prebuiltModel->idInTable($idTrip)))
		{
			return [];
		}

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
		$prebuiltModel = new PrebuiltTripModel();
		$extension = new ExtensionModel();
		// Exclure les extensions - on ne veut que les prebuilt trips
		if (in_array($idTrip, $extension->idInTable($idTrip)))
		{
			return [];
		}
		// Vérifier que c'est bien un prebuilt trip
		if (!in_array($idTrip, $prebuiltModel->idInTable($idTrip)))
		{
			return [];
		}

		return $this->db->table('host h')
			->select('h.*, ts.name, ts.cost, ts."idCountry", c.name as country, c.continent')
			->join('"tripStep" ts', 'ts."idTripStep" = h."idTripStep"')
			->join('country c', 'c."idCountry" = ts."idCountry"', 'left')
			->where('h."idTrip"', $idTrip)
			->orderBy('h."idTripStep"', 'ASC')
			->get()
			->getResultArray();
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

	public function getTripsByContinent($continent)
	{
		$trips = $this->db->table('prebuilttrip pt')
			->distinct()
			->select('pt.*')
			->join('host h', 'h."idTrip" = pt."idTrip"')
			->join('"tripStep" ts', 'ts."idTripStep" = h."idTripStep"')
			->join('country c', 'c."idCountry" = ts."idCountry"')
			->where('LOWER(c.continent)', strtolower($continent))
			->get()
			->getResultArray();

		log_message('debug', 'Trips in continent ' . $continent . ': ' . print_r($trips, true));

		return $trips;
	}

	public function getTripsByCountryName($countryName)
	{
		$trips = $this->db->table('prebuilttrip pt')
			->distinct()
			->select('pt.*')
			->join('host h', 'h."idTrip" = pt."idTrip"')
			->join('"tripStep" ts', 'ts."idTripStep" = h."idTripStep"')
			->join('country c', 'c."idCountry" = ts."idCountry"')
			->where('LOWER(c.name)', strtolower($countryName))
			->get()
			->getResultArray();

		log_message('debug', 'Trips in country ' . $countryName . ': ' . print_r($trips, true));

		return $trips;
	}
}