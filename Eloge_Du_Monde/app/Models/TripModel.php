<?php

namespace App\Models;

use CodeIgniter\Model;

class TripModel extends Model
{
	protected $table            = 'trip';
	protected $primaryKey       = 'idTrip';
	protected $useAutoIncrement = true;
	protected $returnType       = 'array';
	protected $useSoftDeletes   = false;
	protected $protectFields    = true;
	protected $allowedFields    = ['departureDate', 'type', 'idUser'];

	protected bool $allowEmptyInserts = true;
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

	public function getAllTrips()
	{
		return $this->whereNotIn('idTrip', function($query) 
			{$query->select('idTrip')->from('prebuilttrip');})->findAll();
	}

	public function getTripsByUser($idUser)
	{
		return $this->where('idUser', $idUser)->whereNotIn('idTrip', function($query) 
			{$query->select('idTrip')->from('prebuilttrip');})->findAll();
	}

	public function getTripById($idTrip)
	{
		return $this->where('idTrip', $idTrip)->whereNotIn('idTrip', function($query) 
			{$query->select('idTrip')->from('prebuilttrip');})->first();
	}

	public function getTripsByType($type)
	{
		return $this->where('type', $type)->whereNotIn('idTrip', function($query) 
			{$query->select('idTrip')->from('prebuilttrip');})->findAll();
	}


	public function getTripsCount()
	{
		return $this->whereNotIn('idTrip', function($query) 
			{$query->select('idTrip')->from('prebuilttrip');})->countAllResults();
	}

	public function addTrip($data)
	{
		return $this->insert($data);
	}

	public function createTrip($dataTrip, $steps)
	{
		$this->insert($dataTrip);
		$idTrip = $this->getInsertID();

		$bookingModel = new BookingModel();

		foreach ($steps as $step)
		{
			$bookingModel->addBooking($idTrip, $step['idTripStep']);
		}

		return $idTrip;
	}

	public function idInTable($idTrip)
	{
		return $this->where('idTrip', $idTrip)->whereNotIn('idTrip', function($query) 
			{$query->select('idTrip')->from('prebuilttrip');})->first() !== null;
	}

	public function updateTrip($idTrip, $data)
	{
		return $this->where('idTrip', $idTrip)->whereNotIn('idTrip', function($query) 
			{$query->select('idTrip')->from('prebuilttrip');})->set($data)->update();
	}

	public function deleteTrip($idTrip)
	{
		return $this->delete($idTrip);
	}
}