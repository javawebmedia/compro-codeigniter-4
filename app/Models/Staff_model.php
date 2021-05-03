<?php 
namespace App\Models;

use CodeIgniter\Model;

class Staff_model extends Model
{

	protected $table = 'staff';
    protected $primaryKey = 'id_staff';
    protected $allowedFields = [];

    // Listing
    public function listing()
    {
        $builder = $this->db->table('staff');
        $builder->select('staff.*, kategori_staff.nama_kategori_staff, kategori_staff.slug_kategori_staff, users.nama AS nama_admin');
        $builder->join('kategori_staff','kategori_staff.id_kategori_staff = staff.id_kategori_staff','LEFT');
        $builder->join('users','users.id_user = staff.id_user','LEFT');
        $builder->orderBy('staff.id_staff','DESC');
        $query = $builder->get();
        return $query->getResultArray();
    }

    // staff
    public function kategori_staff($id_kategori_staff)
    {
        $builder = $this->db->table('staff');
        $builder->select('staff.*, kategori_staff.nama_kategori_staff, kategori_staff.slug_kategori_staff, users.nama AS nama_admin');
        $builder->join('kategori_staff','kategori_staff.id_kategori_staff = staff.id_kategori_staff','LEFT');
        $builder->join('users','users.id_user = staff.id_user','LEFT');
        $builder->where('staff.id_kategori_staff',$id_kategori_staff);
        $builder->orderBy('staff.urutan','ASC');
        $query = $builder->get();
        return $query->getResultArray();
    }

    // home
    public function home()
    {
        $builder = $this->db->table('staff');
        $builder->select('staff.*, kategori_staff.nama_kategori_staff, kategori_staff.slug_kategori_staff, users.nama AS nama_admin');
        $builder->join('kategori_staff','kategori_staff.id_kategori_staff = staff.id_kategori_staff','LEFT');
        $builder->join('users','users.id_user = staff.id_user','LEFT');
        $builder->where('staff.status_staff','Publish');
        $builder->orderBy('staff.id_staff','DESC');
        $query = $builder->get();
        return $query->getResultArray();
    }

    // total
    public function total()
    {
        $builder = $this->db->table('staff');
        $query = $builder->get();
        return $query->getNumRows();
    }

    // detail
    public function detail($id_staff)
    {
        $builder = $this->db->table('staff');
        $builder->select('staff.*, kategori_staff.nama_kategori_staff, kategori_staff.slug_kategori_staff, users.nama AS nama_admin');
        $builder->join('kategori_staff','kategori_staff.id_kategori_staff = staff.id_kategori_staff','LEFT');
        $builder->join('users','users.id_user = staff.id_user','LEFT');
        $builder->where('staff.id_staff',$id_staff);
        $builder->orderBy('staff.id_staff','DESC');
        $query = $builder->get();
        return $query->getRowArray();
    }

    // tambah
    public function tambah($data)
    {
        $builder = $this->db->table('staff');
        $builder->insert($data);
    }

    // tambah
    public function edit($data)
    {
        $builder = $this->db->table('staff');
        $builder->where('id_staff',$data['id_staff']);
        $builder->update($data);
    }
    
    // slider
    public function slider()
    {
        $builder = $this->db->table('staff');
        $builder->where('jenis_staff','Homepage');
        $builder->orderBy('staff.id_staff','DESC');
        $query = $builder->get();
        return $query->getResultArray();
    }

    
}