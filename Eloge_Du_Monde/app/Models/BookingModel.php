<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
	protected $table            = 'booking';
	protected $primaryKey       = ['idTrip', 'idUser'];
	protected $useAutoIncrement = true;
	protected $returnType       = 'array';
	protected $useSoftDeletes   = false;
	protected $protectFields    = true;
	protected $allowedFields    = ['idTrip', 'idUser'];

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

	public function getAllBookings()
	{
		return $this->findAll();
	}

	public function getBookingsByTrip($idTrip)
	{
		return $this->where('idTrip', $idTrip)->findAll();
	}

	public function getBookingsByUser($idUser)
	{
		return $this->where('idUser', $idUser)->findAll();
	}

	public function getBookingsCount()
	{
		return $this->countAllResults();
	}

	public function addBooking($idTrip, $idUser)
	{
		$data =
		[
			'idTrip' => $idTrip,
			'idUser' => $idUser,
		];

		return $this->insert($data);
	}

	public function updateBooking($idTrip, $idUser, $data)
	{
		return $this->update(['idTrip' => $idTrip, 'idUser' => $idUser], $data);
	}

	public function deleteBooking($idTrip, $idUser)
	{
		return $this->delete(['idTrip' => $idTrip, 'idUser' => $idUser]);
	}
}