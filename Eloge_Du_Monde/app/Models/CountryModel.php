<?php

namespace App\Models;

use CodeIgniter\Model;

class CountryModel extends Model
{
	protected $table            = 'country';
	protected $primaryKey       = 'idCountry';
	protected $useAutoIncrement = true;
	protected $returnType       = 'array';
	protected $useSoftDeletes   = false;
	protected $protectFields    = true;
	protected $allowedFields    = ['name', 'continent', 'cost'];

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

	public function getAllCountries()
	{
		return $this->findAll();
	}

	public function getCountryById($idCountry)
	{
		return $this->where('idCountry', $idCountry)->first();
	}

	public function getCountryByName($name)
	{
		return $this->where('name', $name)->first();
	}

	public function getCountriesByContinent($continent)
	{
		return $this->where('continent', $continent)->findAll();
	}

	public function getCountriesCount()
	{
		return $this->countAllResults();
	}

	public function getContinentsCount()
	{
		return $this->select('continent')->distinct()->countAllResults();
	}
	
	public function addCountry($data)
	{
		return $this->insert($data);
	}

	public function updateCountry($idCountry, $data)
	{
		return $this->update($idCountry, $data);
	}

	public function deleteCountry($idCountry)
	{
		return $this->delete($idCountry);
	}
}