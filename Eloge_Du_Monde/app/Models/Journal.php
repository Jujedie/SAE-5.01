<?php

namespace App\Models;

use CodeIgniter\Model;

class Journal extends Model
{
	protected $table            = 'journaux';
	protected $primaryKey       = 'idJournaux';
	protected $useAutoIncrement = true;
	protected $returnType       = 'array';
	protected $useSoftDeletes   = false;
	protected $protectFields    = true;
	protected $allowedFields    = ['idJournaux', 'message', 'date', 'idUtilisateur'];

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

	public function getAllLogEntries()
	{
		return $this->findAll();
	}

	public function getLogEntriesByUser($idUtilisateur)
	{
		return $this->where('idUtilisateur', $idUtilisateur)->findAll();
	}
	
	public function addLogEntry($message, $idUtilisateur)
	{
		$data = [
			'message' => $message,
			'date' => date('Y-m-d H:i:s'),
			'idUtilisateur' => $idUtilisateur
		];

		return $this->insert($data);
	}

	public function updateLogEntry($idJournaux, $data)
	{
		return $this->update($idJournaux, $data);
	}

	public function deleteLogEntry($idJournaux)
	{
		return $this->delete($idJournaux);
	}
}
