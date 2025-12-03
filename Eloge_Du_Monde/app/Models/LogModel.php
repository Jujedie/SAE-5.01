<?php

namespace App\Models;

use CodeIgniter\Model;

class LogModel extends Model
{
	protected $table            = 'log';
	protected $primaryKey       = 'idLog';
	protected $useAutoIncrement = true;
	protected $returnType       = 'array';
	protected $useSoftDeletes   = false;
	protected $protectFields    = true;
	protected $allowedFields    = ['idLog', 'message', 'date', 'idUser'];

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

	public function getAllLogEntries()
	{
		return $this->findAll();
	}

	public function getLogEntriesByUser($idUser)
	{
		return $this->where('idUser', $idUser)->findAll();
	}
	
	public function addLogEntry($message, $idUser)
	{
		$data =
		[
			'message' => $message,
			'date'    => date('Y-m-d H:i:s'),
			'idUser'  => $idUser
		];

		return $this->insert($data);
	}

	public function updateLogEntry($idLog, $data)
	{
		return $this->update($idLog, $data);
	}

	public function deleteLogEntry($idLog)
	{
		return $this->delete($idLog);
	}
}