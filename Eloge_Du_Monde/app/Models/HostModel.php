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

	public function deleteHost($idTrip, $idTripStep)
	{
		return $this->where(['idTrip' => $idTrip, 'idTripStep' => $idTripStep])->delete();
	}
}