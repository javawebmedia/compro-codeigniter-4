<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Konfigurasi_model;
use App\Models\Staff_model;

class Staff extends BaseController
{
	// Staff
	public function index()
	{
		$m_konfigurasi 	= new Konfigurasi_model();
		$m_staff		= new Staff_model();
		$konfigurasi 	= $m_konfigurasi->listing();
		$staff 		= $m_staff->home();

		$data = [	'title'			=> 'Staff Kami',
					'description'	=> 'Staff Kami '.$konfigurasi['namaweb'].', '.$konfigurasi['tentang'],
					'keywords'		=> 'Staff Kami '.$konfigurasi['namaweb'].', '.$konfigurasi['keywords'],
					'staff'		=> $staff,
					'konfigurasi'	=> $konfigurasi,
					'content'		=> 'staff/index'
				];
		echo view('layout/wrapper',$data);
	}
}