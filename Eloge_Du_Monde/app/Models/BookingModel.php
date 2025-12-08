<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
	protected $table            = 'booking';
	protected $primaryKey       = ['idTrip', 'idTripStep'];
	protected $useAutoIncrement = false;
	protected $returnType       = 'array';
	protected $useSoftDeletes   = false;
	protected $protectFields    = true;
	protected $allowedFields    = ['idTrip', 'idTripStep'];

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
		// Get all trips for a user, then get their bookings
		$tripModel = new TripModel();
		$trips = $tripModel->where('idUser', $idUser)->findAll();
		$bookings = [];
		foreach ($trips as $trip) {
			$tripBookings = $this->where('idTrip', $trip['idTrip'])->findAll();
			$bookings = array_merge($bookings, $tripBookings);
		}
		return $bookings;
	}

	public function getBookingsCount()
	{
		return $this->countAllResults();
	}

	public function addBooking($idTrip, $idTripStep)
	{
		$sql = "INSERT INTO booking (\"idTrip\", \"idTripStep\") VALUES (?, ?)";
		return $this->db->query($sql, [$idTrip, $idTripStep]);
	}

	public function updateBooking($idTrip, $idTripStep, $data)
	{
		return $this->update(['idTrip' => $idTrip, 'idTripStep' => $idTripStep], $data);
	}

	public function deleteBooking($idTrip, $idTripStep)
	{
		return $this->delete(['idTrip' => $idTrip, 'idTripStep' => $idTripStep]);
	}
}