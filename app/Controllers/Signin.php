<?php 
namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\Konfigurasi_model;
use App\Models\Siswa_model;

class Signin extends BaseController
{

	public function __construct()
	{
		helper('form');
	}

	// Homepage
	public function index()
	{
		$session 		= \Config\Services::session();
		$m_konfigurasi 	= new Konfigurasi_model();
		$m_siswa 		= new Siswa_model();
		$konfigurasi 	= $m_konfigurasi->listing();

		// Start validasi
		if($this->request->getMethod() === 'post' && $this->validate(
			[
            'username' 	=> 'required|min_length[3]',
            'password'  => 'required|min_length[3]',
        	])) {
			$username 	= $this->request->getPost('username');
			$password 	= $this->request->getPost('password');
			$siswa 		= $m_siswa->login($username,$password);
			// Proses signin
			if($siswa) {
				// Jika username password benar
				$this->session->set('username_siswa',$username);
				$this->session->set('id_siswa',$siswa['id_siswa']);
				$this->session->set('nisn',$siswa['nisn']);
				$this->session->set('nama_lengkap',$siswa['nama_lengkap']);
				$this->session->setFlashdata('sukses', 'Hai '.$siswa['nama_lengkap'].', Anda berhasil login');
				return redirect()->to(base_url('siswa/dasbor'));
			}else{
				// jika username password salah
				$this->session->setFlashdata('warning','Username atau password salah');
				return redirect()->to(base_url('signin'));
			}
	    }else{
			// End validasi
			$data = [	'title'			=> 'Login Siswa',
						'description'	=> $konfigurasi['namaweb'].', '.$konfigurasi['tentang'],
						'keywords'		=> $konfigurasi['namaweb'].', '.$konfigurasi['keywords'],
						'session'		=> $session
					];
			echo view('signin/index',$data);
		}
		// End proses
	}

	// lupa
	public function lupa()
	{
		$session = \Config\Services::session();
		$m_konfigurasi 	= new Konfigurasi_model();
		$m_user 		= new User_model();
		$konfigurasi 	= $m_konfigurasi->listing();

		$data = [	'title'			=> 'Lupa Password',
					'description'	=> $konfigurasi['namaweb'].', '.$konfigurasi['tentang'],
					'keywords'		=> $konfigurasi['namaweb'].', '.$konfigurasi['keywords'],
					'session'		=> $session
				];
		echo view('signin/lupa',$data);
	}

	// Logout
	public function logout()
	{
		$this->session->destroy();
		return redirect()->to(base_url('signin?logout=sukses'));
	}
}