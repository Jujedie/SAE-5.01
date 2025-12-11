<?php

namespace App\Models;

use CodeIgniter\Model;

class PrebuiltTripModel extends Model
{
	protected $table            = 'prebuilttrip';
	protected $primaryKey       = 'idTrip';
	protected $useAutoIncrement = true;
	protected $returnType       = 'array';
	protected $useSoftDeletes   = false;
	protected $protectFields    = true;
	protected $allowedFields    = ['departureDate', 'type', 'idUser', 'title', 'programdesc', 'hostingdesc', 'conditiondesc', 'formalitiesdesc', 'thematic', 'amount', 'attachment', 'image'];

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

	public function idInTable($idTrip)
	{
		$result = $this->select('idTrip')
					   ->where('idTrip', $idTrip)
					   ->findAll();

		return array_column($result, 'idTrip');
	}

	public function getAllPrebuiltTrips()
	{
		return $this->findAll();
	}

	public function getPrebuiltTripById($idTrip)
	{
		return $this->where('idTrip', $idTrip)->first();
	}

	public function getPrebuiltTripsByUser($idUser)
	{
		return $this->where('idUser', $idUser)->findAll();
	}

	public function addPrebuiltTrip($data)
	{
		return $this->insert($data);
	}

	public function updatePrebuiltTrip($idTrip, $data)
	{
		return $this->update($idTrip, $data);
	}

	public function deletePrebuiltTrip($idTrip)
	{
		return $this->delete($idTrip);
	}
	public function getPrebuiltsByFilter($filter)
	{
		foreach ($filter as $key => $value)
		{
			if ($key == 'continent'){
				$hostModel = new HostModel();
				$tripsInContinent = $hostModel->getTripsByContinent($value);

				log_message('debug', 'Filter continent value: ' . $value);
				log_message('debug', 'Trips in continent ' . $value . ': ' . print_r($tripsInContinent, true));
				
				return $tripsInContinent;
			} elseif ($key == 'country') {
				$hostModel = new HostModel();
				$tripsInCountry = $hostModel->getTripsByCountryName($value);

				return $tripsInCountry;
			} elseif ($key == 'thematic') {
				// Mapping des slugs vers les vraies valeurs
				$thematicMap = [
					'bien-etre-spa' => 'Bien-être & Spa',
					'aventure-nature' => 'Aventure & Nature',
					'gastronomie' => 'Gastronomie',
					'culture-art' => 'Culture & Art'
				];
				
				$thematicValue = $thematicMap[$value] ?? $value;
				return $this->where('thematic', $thematicValue)->findAll();
			}
		}
		return $this->findAll();
	}

	public function createPrebuiltTripWithSteps($data, $steps)
	{
		$this->insert($data);
		$idTrip = $this->getInsertID();

		if (!empty($steps)) {
			$hostModel = new HostModel();
			$hostModel->addHostsForTrip($idTrip, $steps);
		}

		return $idTrip;
	}

	public function getPrebuiltTripWithSteps($idTrip)
	{
		$trip = $this->getPrebuiltTripById($idTrip);
		
		if ($trip) {
			$hostModel = new HostModel();
			$trip['steps'] = $hostModel->getHostsByTripWithDetails($idTrip);
		}

		return $trip;
	}
}