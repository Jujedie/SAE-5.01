<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogPostModel extends Model
{
	protected $table            = 'blogPost';
	protected $primaryKey       = 'idBlogPost';
	protected $useAutoIncrement = true;
	protected $returnType       = 'array';
	protected $useSoftDeletes   = false;
	protected $protectFields    = true;
	protected $allowedFields    = ['title', 'type', 'content', 'image', 'idUser'];

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

	public function getAllPosts()
	{
		return $this->findAll();
	}

	public function getPostById($idBlogPost)
	{
		return $this->where('idBlogPost', $idBlogPost)->first();
	}

	public function getPostsByUser($idUser)
	{
		return $this->where('idUser', $idUser)->findAll();
	}

	public function addPost($title, $type, $content, $image, $idUser)
	{
		$data =
		[
			'title'   => $title,
			'type'    => $type,
			'content' => $content,
			'image'   => $image,
			'idUser'  => $idUser
		];

		return $this->insert($data);
	}

	public function updatePost($idBlogPost, $data)
	{
		return $this->update($idBlogPost, $data);
	}

	public function deletePost($idBlogPost)
	{
		return $this->where('idBlogPost', $idBlogPost)->delete();
	}
}