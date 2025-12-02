<?php

namespace App\Models;

use CodeIgniter\Model;

class Avis extends Model
{
	protected $table            = 'avis';
	protected $primaryKey       = 'idAvis';
	protected $useAutoIncrement = true;
	protected $returnType       = 'array';
	protected $useSoftDeletes   = false;
	protected $protectFields    = true;
	protected $allowedFields    = ['idAvis', 'note', 'date', 'contenu', 'verified', 'idUtilisateur'];

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

	public function getAllAvis()
	{
		return $this->findAll();
	}

	public function getAvisById($idAvis)
	{
		return $this->where('idAvis', $idAvis)->first();
	}

	public function getAvisByIdUtilisateur($idUtilisateur)
	{
		return $this->where('idUtilisateur', $idUtilisateur)->findAll();
	}

	public function getAverageNote()
	{
		return $this->selectAvg('note')->first();
	}

	public function getCertifiedAvis()
	{
		return $this->where('verified', 1)->findAll();
	}

	public function addAvis($data)
	{
		return $this->insert($data);
	}

	public function updateAvis($idAvis, $data)
	{
		return $this->where('idAvis', $idAvis)->set($data)->update();
	}

	public function deleteAvisById($idAvis)
	{
		return $this->where('idAvis', $idAvis)->delete();
	}


}
