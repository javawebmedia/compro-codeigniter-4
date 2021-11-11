<?php

namespace App\Models;

use CodeIgniter\Model;

class Kategori_download_model extends Model
{
    protected $table              = 'kategori_download';
    protected $primaryKey         = 'id_kategori_download';
    protected $returnType         = 'array';
    protected $useSoftDeletes     = false;
    protected $allowedFields      = ['id_kategori_download', 'id_user', 'nama_kategori_download', 'slug_kategori_download', 'urutan', 'hits'];
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
        $builder = $this->db->table('kategori_download');
        $builder->orderBy('kategori_download.id_kategori_download', 'DESC');
        $query = $builder->get();

        return $query->getResultArray();
    }

    // total
    public function total()
    {
        $builder = $this->db->table('kategori_download');
        $builder->select('COUNT(*) AS total');
        $builder->orderBy('kategori_download.id_kategori_download', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

    // detail
    public function detail($id_kategori_download)
    {
        $builder = $this->db->table('kategori_download');
        $builder->where('id_kategori_download', $id_kategori_download);
        $builder->orderBy('kategori_download.id_kategori_download', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

    // read
    public function read($slug_kategori_download)
    {
        $builder = $this->db->table('kategori_download');
        $builder->where('slug_kategori_download', $slug_kategori_download);
        $builder->orderBy('kategori_download.id_kategori_download', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }
}
