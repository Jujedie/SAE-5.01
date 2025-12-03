<?php

namespace App\Models;

use CodeIgniter\Model;

class Utilisateur extends Model
{
	protected $table            = 'utilisateur';
	protected $primaryKey       = 'idUtil';
	protected $useAutoIncrement = true;
	protected $returnType       = 'array';
	protected $useSoftDeletes   = false;
	protected $protectFields    = true;
	protected $allowedFields    = ['idUtil', 'nom', 'prenom', 'telephone', 'email', 'role', 'mdp', 'estAbonne', 'resetToken', 'resetTokenExpiration'];

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

	public function getAllUtilisateurs()
	{
		return $this->findAll();
	}

	public function getUtilisateurById($idUtil)
	{
		return $this->where('idUtil', $idUtil)->first();
	}

	public function getUtilisateurByEmail($email)
	{
		return $this->where('email', $email)->first();
	}

	public function getUtilisateursByRole($role)
	{
		return $this->where('role', $role)->findAll();
	}

	public function getUtilisateurByResetToken($token)
	{
		return $this->where('resetToken', $token)
					->where('resetTokenExpiration >=', date('Y-m-d H:i:s'))
					->first();
	}

	public function estAdmin($idUtil)
	{
		return $this->where('idUtil', $idUtil)->where('role', 'admin')->first() !== null;
	}

	public function addUtilisateur($data)
	{
		return $this->insert($data);
	}

	public function updateUtilisateur($idUtil, $data)
	{
		return $this->update($idUtil, $data);
	}

	public function updatePasswordUtilisateur($idUtil, $newPassword)
	{
		return $this->update($idUtil, ['mdp' => $newPassword]);
	}

	public function deleteUtilisateur($idUtil)
	{
		return $this->delete($idUtil);
	}
}
