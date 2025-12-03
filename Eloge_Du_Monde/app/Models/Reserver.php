<?php

namespace App\Models;

use CodeIgniter\Model;

class Reserver extends Model
{
	protected $table            = 'reserver';
	protected $primaryKey       = ['idVoyage', 'idUtil'];
	protected $useAutoIncrement = true;
	protected $returnType       = 'array';
	protected $useSoftDeletes   = false;
	protected $protectFields    = true;
	protected $allowedFields    = ['idVoyage', 'idUtil'];

	protected bool $allowEmptyInserts = false;
	protected bool $updateOnlyChanged = true;

	protected array $casts = [];
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

	public function getAllReservations()
	{
		return $this->findAll();
	}

	public function getReservationsByVoyage($idVoyage)
	{
		return $this->where('idVoyage', $idVoyage)->findAll();
	}

	public function getReservationsByUtilisateur($idUtil)
	{
		return $this->where('idUtil', $idUtil)->findAll();
	}

	public function addReservation($idVoyage, $idUtil)
	{
		$data = [
			'idVoyage' => $idVoyage,
			'idUtil' => $idUtil,
		];

		return $this->insert($data);
	}

	public function updateReservation($idVoyage, $idUtil, $data)
	{
		return $this->update(['idVoyage' => $idVoyage, 'idUtil' => $idUtil], $data);
	}

	public function deleteReservation($idVoyage, $idUtil)
	{
		return $this->delete(['idVoyage' => $idVoyage, 'idUtil' => $idUtil]);
	}
}
