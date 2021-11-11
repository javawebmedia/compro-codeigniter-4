<?php

namespace App\Models;

use CodeIgniter\Model;

class Kategori_model extends Model
{
    protected $table              = 'kategori';
    protected $primaryKey         = 'id_kategori';
    protected $returnType         = 'array';
    protected $useSoftDeletes     = false;
    protected $allowedFields      = ['id_kategori', 'id_user', 'nama_kategori', 'slug_kategori', 'urutan', 'hits'];
    protected $useTimestamps      = false;
    protected $createdField       = 'created_at';
    protected $updatedField       = 'updated_at';
    protected $deletedField       = 'deleted_at';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    // listing
    public function listing()
    {
        $builder = $this->db->table('kategori');
        $builder->orderBy('kategori.id_kategori', 'DESC');
        $query = $builder->get();

        return $query->getResultArray();
    }

    // total
    public function total()
    {
        $builder = $this->db->table('kategori');
        $builder->select('COUNT(*) AS total');
        $builder->orderBy('kategori.id_kategori', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

    // detail
    public function detail($id_kategori)
    {
        $builder = $this->db->table('kategori');
        $builder->where('id_kategori', $id_kategori);
        $builder->orderBy('kategori.id_kategori', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

    // read
    public function read($slug_kategori)
    {
        $builder = $this->db->table('kategori');
        $builder->where('slug_kategori', $slug_kategori);
        $builder->orderBy('kategori.id_kategori', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

    // edit
    public function edit($data)
    {
        $builder = $this->db->table('kategori');
        $builder->where('id_kategori', $data['id_kategori']);
        $builder->update($data);
    }
}
