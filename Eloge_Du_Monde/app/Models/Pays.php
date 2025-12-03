<?php

namespace App\Models;

use CodeIgniter\Model;

class Pays extends Model
{
	protected $table            = 'pays';
	protected $primaryKey       = 'id';
	protected $useAutoIncrement = true;
	protected $returnType       = 'array';
	protected $useSoftDeletes   = false;
	protected $protectFields    = true;
	protected $allowedFields    = [];

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

	public function getAllPays()
	{
		return $this->findAll();
	}

	public function getPaysById($id)
	{
		return $this->where('id', $id)->first();
	}

	public function getPaysByNom($nom)
	{
		return $this->where('nom', $nom)->first();
	}

	public function getPaysByContinent($continent)
	{
		return $this->where('continent', $continent)->findAll();
	}
	
	public function addPays($data)
	{
		return $this->insert($data);
	}

	public function updatePays($id, $data)
	{
		return $this->update($id, $data);
	}

	public function deletePays($id)
	{
		return $this->delete($id);
	}
}
