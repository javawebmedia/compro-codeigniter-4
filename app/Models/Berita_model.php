<?php 
namespace App\Models;

use CodeIgniter\Model;

class Berita_model extends Model
{

    protected $table = 'berita';
    protected $primaryKey = 'id_berita';
    protected $allowedFields = [];

    // Listing
    public function listing()
    {
        $builder = $this->db->table('berita');
        $builder->select('berita.*, kategori.nama_kategori, kategori.slug_kategori, users.nama');
        $builder->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
        $builder->join('users','users.id_user = berita.id_user','LEFT');
        $builder->orderBy('berita.id_berita','DESC');
        $query = $builder->get();
        return $query->getResultArray();
    }

    // home
    public function home()
    {
        $builder = $this->db->table('berita');
        $builder->select('berita.*, kategori.nama_kategori, kategori.slug_kategori, users.nama');
        $builder->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
        $builder->join('users','users.id_user = berita.id_user','LEFT');
        $builder->where( [  'status_berita' => 'Publish',
                            'jenis_berita'  => 'Berita']);
        $builder->orderBy('berita.id_berita','DESC');
        $query = $builder->get();
        return $query->getResultArray();
    }

    // kategori
    public function kategori($id_kategori)
    {
        $builder = $this->db->table('berita');
        $builder->select('berita.*, kategori.nama_kategori, kategori.slug_kategori, users.nama');
        $builder->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
        $builder->join('users','users.id_user = berita.id_user','LEFT');
        $builder->where( [  'status_berita'         => 'Publish',
                            'jenis_berita'          => 'Berita',
                            'berita.id_kategori'    => $id_kategori]);
        $builder->orderBy('berita.id_berita','DESC');
        $query = $builder->get();
        return $query->getResultArray();
    }

    // total
    public function total()
    {
        $builder = $this->db->table('berita');
        $query = $builder->get();
        return $query->getNumRows();
    }

    // detail
    public function detail($id_berita)
    {
        $builder = $this->db->table('berita');
        $builder->select('berita.*, kategori.nama_kategori, kategori.slug_kategori, users.nama');
        $builder->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
        $builder->join('users','users.id_user = berita.id_user','LEFT');
        $builder->where('berita.id_berita',$id_berita);
        $builder->orderBy('berita.id_berita','DESC');
        $query = $builder->get();
        return $query->getRowArray();
    }

    // read
    public function read($slug_berita)
    {
        $builder = $this->db->table('berita');
        $builder->select('berita.*, kategori.nama_kategori, kategori.slug_kategori, users.nama');
        $builder->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
        $builder->join('users','users.id_user = berita.id_user','LEFT');
        $builder->where('berita.slug_berita',$slug_berita);
        $builder->where('berita.status_berita','Publish');
        $builder->orderBy('berita.id_berita','DESC');
        $query = $builder->get();
        return $query->getRowArray();
    }

    // tambah
    public function tambah($data)
    {
        $builder = $this->db->table('berita');
        $builder->insert($data);
    }

    // tambah
    public function edit($data)
    {
        $builder = $this->db->table('berita');
        $builder->where('id_berita',$data['id_berita']);
        $builder->update($data);
    }

}