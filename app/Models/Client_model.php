<?php

namespace App\Models;

use CodeIgniter\Model;

class Client_model extends Model
{
    protected $table              = 'client';
    protected $primaryKey         = 'id_client';
    protected $returnType         = 'array';
    protected $useSoftDeletes     = false;
    protected $allowedFields      = [''];
    protected $useTimestamps      = false;
    protected $createdField       = 'tanggal_post';
    protected $updatedField       = 'tanggal';
    protected $deletedField       = 'deleted_at';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    // listing
    public function listing()
    {
        $builder = $this->db->table('client');
        $builder->orderBy('client.id_client', 'DESC');
        $query = $builder->get();

        return $query->getResultArray();
    }

    // home
    public function home()
    {
        $builder = $this->db->table('client');
        $builder->where('status_client', 'Publish');
        $builder->orderBy('client.id_client', 'DESC');
        $query = $builder->get();

        return $query->getResultArray();
    }

    // testimoni
    public function testimoni()
    {
        $builder = $this->db->table('client');
        $builder->where('status_client', 'Publish');
        $builder->orderBy('client.id_client', 'DESC');
        $builder->limit(10);
        $query = $builder->get();

        return $query->getResultArray();
    }

    // total
    public function total()
    {
        $builder = $this->db->table('client');
        $builder->select('COUNT(*) AS total');
        $builder->orderBy('client.id_client', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

    // detail
    public function detail($id_client)
    {
        $builder = $this->db->table('client');
        $builder->where('id_client', $id_client);
        $builder->orderBy('client.id_client', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

    // read
    public function read($slug_client)
    {
        $builder = $this->db->table('client');
        $builder->where('slug_client', $slug_client);
        $builder->orderBy('client.id_client', 'DESC');
        $query = $builder->get();

        return $query->getRowArray();
    }

    // tambah
    public function tambah($data)
    {
        $builder = $this->db->table('client');
        $builder->insert($data);
    }

    // tambah
    public function edit($data)
    {
        $builder = $this->db->table('client');
        $builder->where('id_client', $data['id_client']);
        $builder->update($data);
    }
}
