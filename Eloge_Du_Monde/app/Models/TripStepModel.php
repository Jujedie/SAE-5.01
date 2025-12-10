<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\CountryModel;
use App\Models\HostModel;
use App\Models\PrebuiltTripModel;

class TripStepModel extends Model
{
	protected $table            = 'tripStep';
	protected $primaryKey       = 'idTripStep';
	protected $useAutoIncrement = true;
	protected $returnType       = 'array';
	protected $useSoftDeletes   = false;
	protected $protectFields    = true;
	protected $allowedFields    = ['name', 'cost', 'idCountry'];

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

	public function getAllSteps()
	{
		return $this->findAll();
	}

	public function getStepById($idTripStep)
	{
		return $this->where('idTripStep', $idTripStep)->first();
	}

	public function getStepsByCountry($idCountry)
	{
		return $this->where('idCountry', $idCountry)->findAll();
	}

	public function getTripsByContinent($continent)
	{
		$CountryModel = new CountryModel();
		$countries    = $CountryModel->where('continent', $continent)->findAll();
		$steps        = [];

		foreach ($countries as $country)
		{
			$CountryModel = new CountryModel();
			$countrySteps = $this->getStepsByCountry($country['idCountry']);
			$steps        = array_merge($steps, $countrySteps);
		}

		$hostModel = new HostModel();
		$prebuiltTripModel = new PrebuiltTripModel();
		$trips     = [];
		foreach ($steps as $step)
		{
			$hosts = $hostModel->getHostsByTripStep($step['idTripStep']);
			foreach ($hosts as $host)
			{
				$trips[] = $prebuiltTripModel->getPrebuiltTripById($host['idTrip']);
			}
		}
		return $trips;
	}

	public function addStep($data)
	{
		return $this->insert($data);
	}

	public function updateStep($idTripStep, $data)
	{
		return $this->update($idTripStep, $data);
	}

	public function deleteStep($idTripStep)
	{
		return $this->delete($idTripStep);
	}

	public function stepsExists($steps)
	{
		$existingSteps = [];
		foreach ($steps as $stepId)
		{
			$step = $this->getStepById($stepId);
			if (!$step)
			{
				return false;
			}
		}
		return true;
	}

	public function getAllStepsWithCountry()
	{
		$db = \Config\Database::connect();
		$query = $db->query('
			SELECT ts.*, c.name as country, c.continent
			FROM "tripStep" ts
			LEFT JOIN country c ON c."idCountry" = ts."idCountry"
			ORDER BY c.name ASC, ts.name ASC
		');
		return $query->getResultArray();
	}
}