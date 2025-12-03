<?php

namespace App\Models;

use CodeIgniter\Model;

class ReviewModel extends Model
{
	protected $table            = 'review';
	protected $primaryKey       = 'idReview';
	protected $useAutoIncrement = true;
	protected $returnType       = 'array';
	protected $useSoftDeletes   = false;
	protected $protectFields    = true;
	protected $allowedFields    = ['idReview', 'rating', 'date', 'content', 'verified', 'idUser'];

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

	public function getAllReviews()
	{
		return $this->findAll();
	}

	public function getReviewById($idReview)
	{
		return $this->where('idReview', $idReview)->first();
	}

	public function getReviewsByUserId($idUser)
	{
		return $this->where('idUser', $idUser)->findAll();
	}

	public function getAverageRating()
	{
		return $this->selectAvg('rating')->first();
	}

	public function getVerifiedReviews()
	{
		return $this->where('verified', 1)->findAll();
	}

	public function addReview($data)
	{
		return $this->insert($data);
	}

	public function updateReview($idReview, $data)
	{
		return $this->where('idReview', $idReview)->set($data)->update();
	}

	public function deleteReviewById($idReview)
	{
		return $this->where('idReview', $idReview)->delete();
	}
}