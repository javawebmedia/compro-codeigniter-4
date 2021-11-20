<?php

namespace App\Models;

use CodeIgniter\Model;

class Kategori_staff_model extends Model
{
    protected $table              = 'kategori_staff';
    protected $primaryKey         = 'id_kategori_staff';
    protected $returnType         = 'array';
    protected $useSoftDeletes     = false;
    protected $allowedFields      = ['id_kategori_staff', 'id_user', 'nama_kategori_staff', 'slug_kategori_staff', 'urutan', 'hits'];
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
        $builder = $this->db->table('kategori_staff');
        $builder->orderBy('kategori_staff.urutan', 'ASC');
        $query = $builder->get();

        return $query->getResultArray();
    }

    // total
    public function total()
    {
        $builder = $this->db->table('kategori_staff');
        $builder->select('COUNT(*) AS total');
        $builder->orderBy('kategori_staff.id_kategori_staff', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

    // detail
    public function detail($id_kategori_staff)
    {
        $builder = $this->db->table('kategori_staff');
        $builder->where('id_kategori_staff', $id_kategori_staff);
        $builder->orderBy('kategori_staff.id_kategori_staff', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

    // read
    public function read($slug_kategori_staff)
    {
        $builder = $this->db->table('kategori_staff');
        $builder->where('slug_kategori_staff', $slug_kategori_staff);
        $builder->orderBy('kategori_staff.id_kategori_staff', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }
}
