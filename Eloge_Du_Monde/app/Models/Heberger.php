<?php

namespace App\Models;

use CodeIgniter\Model;

class Heberger extends Model
{
    protected $table            = 'heberger';
    protected $primaryKey       = ['idVoyage', 'idEtapeVoyage'];
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['idVoyage', 'idEtapeVoyage', 'nbJours', 'nbNuits'];

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

	public function getAllHebergements()
	{
		return $this->findAll();
	}

	public function getHebergementByVoyage($idVoyage)
	{
		return $this->where('idVoyage', $idVoyage)->findAll();
	}

	public function getHebergementByEtape($idEtapeVoyage)
	{
		return $this->where('idEtapeVoyage', $idEtapeVoyage)->findAll();
	}

	public function getHebergement($idVoyage, $idEtapeVoyage)
	{
		return $this->where(['idVoyage' => $idVoyage, 'idEtapeVoyage' => $idEtapeVoyage])->first();
	}

	public function addHebergement($data)
	{
		return $this->insert($data);
	}

	public function updateHebergement($idVoyage, $idEtapeVoyage, $data)
	{
		return $this->where(['idVoyage' => $idVoyage, 'idEtapeVoyage' => $idEtapeVoyage])->set($data)->update();
	}

	public function deleteHebergement($idVoyage, $idEtapeVoyage)
	{
		return $this->where(['idVoyage' => $idVoyage, 'idEtapeVoyage' => $idEtapeVoyage])->delete();
	}
}
