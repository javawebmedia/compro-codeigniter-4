<?php 
namespace App\Controllers\Siswa;

use CodeIgniter\Controller;
use App\Models\Profil_model;
use App\Models\Siswa_model;

class Profil extends BaseController
{
	public function index()
	{
		checksiswa();		
		$m_siswa 	= new Siswa_model();
		$siswa 		= $m_siswa->detail($this->session->get('id_siswa'));

		$data = [	'title'			=> $siswa['nama_lengkap'],
					'siswa'			=> $siswa,
					'content'		=> 'siswa/profil/index'
				];
		echo view('siswa/layout/wrapper',$data);
	}
}