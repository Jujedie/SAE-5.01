<?php

namespace App\Models;

use CodeIgniter\Model;

class PrebuiltTripModel extends Model
{
	protected $table            = 'prebuiltTrip';
	protected $primaryKey       = 'idTrip';
	protected $useAutoIncrement = true;
	protected $returnType       = 'array';
	protected $useSoftDeletes   = false;
	protected $protectFields    = true;
	protected $allowedFields    = ['idTrip', 'departureDate', 'type', 'idUser', 'title', 'programDesc', 'accommodationDesc', 'conditionDesc', 'formalitiesDesc', 'thematic', 'amount', 'attachment'];

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
}