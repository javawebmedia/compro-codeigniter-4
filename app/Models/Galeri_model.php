<?php namespace App\Models;

use CodeIgniter\Model;

class Galeri_model extends Model
{

	protected $table = 'galeri';
    protected $primaryKey = 'id_galeri';
    protected $allowedFields = [];

    // Listing
    public function listing()
    {
        $builder = $this->db->table('galeri');
        $builder->select('galeri.*, kategori_galeri.nama_kategori_galeri, kategori_galeri.slug_kategori_galeri, users.nama');
        $builder->join('kategori_galeri','kategori_galeri.id_kategori_galeri = galeri.id_kategori_galeri','LEFT');
        $builder->join('users','users.id_user = galeri.id_user','LEFT');
        $builder->orderBy('galeri.id_galeri','DESC');
        $query = $builder->get();
        return $query->getResultArray();
    }

    // total
    public function total()
    {
        $builder = $this->db->table('galeri');
        $query = $builder->get();
        return $query->getNumRows();
    }

    // detail
    public function detail($id_galeri)
    {
        $builder = $this->db->table('galeri');
        $builder->select('galeri.*, kategori_galeri.nama_kategori_galeri, kategori_galeri.slug_kategori_galeri, users.nama');
        $builder->join('kategori_galeri','kategori_galeri.id_kategori_galeri = galeri.id_kategori_galeri','LEFT');
        $builder->join('users','users.id_user = galeri.id_user','LEFT');
        $builder->where('galeri.id_galeri',$id_galeri);
        $builder->orderBy('galeri.id_galeri','DESC');
        $query = $builder->get();
        return $query->getRowArray();
    }

    // tambah
    public function tambah($data)
    {
        $builder = $this->db->table('galeri');
        $builder->insert($data);
    }

    // tambah
    public function edit($data)
    {
        $builder = $this->db->table('galeri');
        $builder->where('id_galeri',$data['id_galeri']);
        $builder->update($data);
    }
    
    // slider
    public function slider()
    {
        $builder = $this->db->table('galeri');
        $builder->where('jenis_galeri','Homepage');
        $builder->orderBy('galeri.id_galeri','DESC');
        $query = $builder->get();
        return $query->getResultArray();
    }

    // galeri
    public function galeri()
    {
        $builder = $this->db->table('galeri');
        $builder->where('jenis_galeri','Galeri');
        $builder->orderBy('galeri.id_galeri','DESC');
        $query = $builder->get();
        return $query->getResultArray();
    }
}