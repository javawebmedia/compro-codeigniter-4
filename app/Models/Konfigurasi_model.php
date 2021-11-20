<?php

namespace App\Models;

use CodeIgniter\Model;

class Konfigurasi_model extends Model
{
    protected $table         = 'konfigurasi';
    protected $primaryKey    = 'id_konfigurasi';
    protected $allowedFields = [];

    // Listing
    public function listing()
    {
        return $this->asArray()
            ->first();
    }

    // tambah
    public function edit($data)
    {
        $builder = $this->db->table('konfigurasi');
        $builder->where('id_konfigurasi', $data['id_konfigurasi']);
        $builder->update($data);
    }
}
