<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
	protected $table            = 'user';
	protected $primaryKey       = 'idUser';
	protected $useAutoIncrement = true;
	protected $returnType       = 'array';
	protected $useSoftDeletes   = false;
	protected $protectFields    = true;
	protected $allowedFields    = ['idUser', 'lastName', 'firstName', 'phone', 'email', 'role', 'password', 'isSubscribed', 'resetToken', 'resetTokenExpiration'];

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

	public function getAllUsers()
	{
		return $this->findAll();
	}

	public function getUserById($idUser)
	{
		return $this->where('idUser', $idUser)->first();
	}

	public function getUserByEmail($email)
	{
		return $this->where('email', $email)->first();
	}

	public function getUsersByRole($role)
	{
		return $this->where('role', $role)->findAll();
	}

	public function getUserByResetToken($token)
	{
		return $this->where('resetToken', $token)->where('resetTokenExpiration >=', date('Y-m-d H:i:s'))->first();
	}

	public function getUsersCount()
	{
		return $this->countAllResults();
	}

	public function isAdmin($idUser)
	{
		return $this->where('idUser', $idUser)->where('role', 'admin')->first() !== null;
	}

	public function addUser($data)
	{
		return $this->insert($data);
	}

	public function updateUser($idUser, $data)
	{
		return $this->update($idUser, $data);
	}

	public function updatePassword($idUser, $newPassword)
	{
		return $this->update($idUser, ['password' => $newPassword]);
	}

	public function deleteUser($idUser)
	{
		return $this->delete($idUser);
	}
}