<?php

namespace App\Models;

use CodeIgniter\Model;

class Kategori_galeri_model extends Model
{
    protected $table              = 'kategori_galeri';
    protected $primaryKey         = 'id_kategori_galeri';
    protected $returnType         = 'array';
    protected $useSoftDeletes     = false;
    protected $allowedFields      = ['id_kategori_galeri', 'id_user', 'nama_kategori_galeri', 'slug_kategori_galeri', 'urutan', 'hits'];
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
        $builder = $this->db->table('kategori_galeri');
        $builder->orderBy('kategori_galeri.id_kategori_galeri', 'DESC');
        $query = $builder->get();

        return $query->getResultArray();
    }

    // total
    public function total()
    {
        $builder = $this->db->table('kategori_galeri');
        $builder->select('COUNT(*) AS total');
        $builder->orderBy('kategori_galeri.id_kategori_galeri', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

    // detail
    public function detail($id_kategori_galeri)
    {
        $builder = $this->db->table('kategori_galeri');
        $builder->where('id_kategori_galeri', $id_kategori_galeri);
        $builder->orderBy('kategori_galeri.id_kategori_galeri', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

    // read
    public function read($slug_kategori_galeri)
    {
        $builder = $this->db->table('kategori_galeri');
        $builder->where('slug_kategori_galeri', $slug_kategori_galeri);
        $builder->orderBy('kategori_galeri.id_kategori_galeri', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }
}
