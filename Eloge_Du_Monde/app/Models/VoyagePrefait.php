<?php

namespace App\Models;

use CodeIgniter\Model;

class VoyagePrefait extends Model
{
	protected $table            = 'voyage_prefait';
	protected $primaryKey       = 'idVoyage';
	protected $useAutoIncrement = true;
	protected $returnType       = 'array';
	protected $useSoftDeletes   = false;
	protected $protectFields    = true;
	protected $allowedFields    = ['idVoyage', 'datedepart', 'type', 'idUtilisateur', 'titre', 'programmeDesc', 'hebergementDesc', 'conditionDesc', 'formalitésDesc', 'thematique', 'montant', 'pieceJointe'];

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

	public function getAllVoyagesPrefaits()
	{
		return $this->findAll();
	}

	public function getVoyagePrefaitById($idVoyage)
	{
		return $this->where('idVoyage', $idVoyage)->first();
	}

	public function getVoyagesPrefaitsByUtilisateur($idUtilisateur)
	{
		return $this->where('idUtilisateur', $idUtilisateur)->findAll();
	}

	public function addVoyagePrefait($data)
	{
		return $this->insert($data);
	}

	public function updateVoyagePrefait($idVoyage, $data)
	{
		return $this->update($idVoyage, $data);
	}

	public function deleteVoyagePrefait($idVoyage)
	{
		return $this->delete($idVoyage);
	}
}
