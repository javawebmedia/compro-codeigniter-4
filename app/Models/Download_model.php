<?php 
namespace App\Models;

use CodeIgniter\Model;

class Download_model extends Model
{

	protected $table = 'download';
    protected $primaryKey = 'id_download';
    protected $allowedFields = [];

    // Listing
    public function listing()
    {
        $builder = $this->db->table('download');
        $builder->select('download.*, kategori_download.nama_kategori_download, kategori_download.slug_kategori_download, users.nama');
        $builder->join('kategori_download','kategori_download.id_kategori_download = download.id_kategori_download','LEFT');
        $builder->join('users','users.id_user = download.id_user','LEFT');
        $builder->orderBy('download.id_download','DESC');
        $query = $builder->get();
        return $query->getResultArray();
    }

    // Listing
    public function jenis_download($jenis_download)
    {
        $builder = $this->db->table('download');
        $builder->select('download.*, kategori_download.nama_kategori_download, kategori_download.slug_kategori_download, users.nama');
        $builder->join('kategori_download','kategori_download.id_kategori_download = download.id_kategori_download','LEFT');
        $builder->join('users','users.id_user = download.id_user','LEFT');
        $builder->where('download.jenis_download',$jenis_download);
        $builder->orderBy('download.id_download','DESC');
        $query = $builder->get();
        return $query->getResultArray();
    }

    // total
    public function total()
    {
        $builder = $this->db->table('download');
        $query = $builder->get();
        return $query->getNumRows();
    }

    // detail
    public function detail($id_download)
    {
        $builder = $this->db->table('download');
        $builder->select('download.*, kategori_download.nama_kategori_download, kategori_download.slug_kategori_download, users.nama');
        $builder->join('kategori_download','kategori_download.id_kategori_download = download.id_kategori_download','LEFT');
        $builder->join('users','users.id_user = download.id_user','LEFT');
        $builder->where('download.id_download',$id_download);
        $builder->orderBy('download.id_download','DESC');
        $query = $builder->get();
        return $query->getRowArray();
    }

    // tambah
    public function tambah($data)
    {
        $builder = $this->db->table('download');
        $builder->insert($data);
    }

    // tambah
    public function edit($data)
    {
        $builder = $this->db->table('download');
        $builder->where('id_download',$data['id_download']);
        $builder->update($data);
    }
    
    // slider
    public function slider()
    {
        $builder = $this->db->table('download');
        $builder->where('jenis_download','Homepage');
        $builder->orderBy('download.id_download','DESC');
        $query = $builder->get();
        return $query->getResultArray();
    }

    
}