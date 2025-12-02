<?php

namespace App\Models;

use CodeIgniter\Model;

class Posteblog extends Model
{
    protected $table            = 'posteblog';
    protected $primaryKey       = 'idPoste';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['idPoste', 'titre', 'type', 'contenu', 'image', 'idUtilisateur'];

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

	public function getAllPosts()
	{
		return $this->findAll();
	}

	public function getPostById($idPoste)
	{
		return $this->where('idPoste', $idPoste)->first();
	}

	public function getPostsByUtilisateur($idUtilisateur)
	{
		return $this->where('idUtilisateur', $idUtilisateur)->findAll();
	}

	public function addPost($titre, $type, $contenu, $image, $idUtilisateur)
	{
		$data = [
			'titre' => $titre,
			'type' => $type,
			'contenu' => $contenu,
			'image' => $image,
			'idUtilisateur' => $idUtilisateur
		];

		return $this->insert($data);
	}

	public function updatePost($idPoste, $data)
	{
		return $this->update($idPoste, $data);
	}

	public function deletePost($idPoste)
	{
		return $this->where('idPoste', $idPoste)->delete();
	}
}
