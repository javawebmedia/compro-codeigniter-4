<?php 
namespace App\Models;

use CodeIgniter\Model;

class Pmodel extends Model
{
    protected $table      = 'berita';
    protected $primaryKey = 'id_berita';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['judul_berita'];

    protected $useTimestamps = false;
    protected $createdField  = 'tanggal';
    protected $updatedField  = 'tanggal';
    protected $deletedField  = 'tanggal';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}