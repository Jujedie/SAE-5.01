<?php

namespace App\Models;

use CodeIgniter\Model;

class Voyage extends Model
{
    protected $table            = 'voyage';
    protected $primaryKey       = 'idVoyage';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['idVoyage', 'datedepart', 'type', 'idUtilisateur'];

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

	public function getAllVoyages()
	{
		return $this->findAll();
	}

	public function getVoyagesByUtilisateur($idUtilisateur)
	{
		return $this->where('idUtilisateur', $idUtilisateur)->findAll();
	}

	public function getVoyageById($idVoyage)
	{
		return $this->where('idVoyage', $idVoyage)->first();
	}

	public function getVoyagesByType($type)
	{
		return $this->where('type', $type)->findAll();
	}

	public function addVoyage($data)
	{
		return $this->insert($data);
	}

	public function updateVoyage($idVoyage, $data)
	{
		return $this->where('idVoyage', $idVoyage)->set($data)->update();
	}

	public function deleteVoyage($idVoyage)
	{
		return $this->delete($idVoyage);
	}
}
