<?php 
namespace App\Controllers\Siswa;

use CodeIgniter\Controller;
use App\Models\Siswa_model;

class Akun extends BaseController
{
	public function index()
	{
		checksiswa();
		$id_siswa 	= $this->session->get('id_siswa');
		$m_siswa 	= new Siswa_model();
		$siswa 		= $m_siswa->detail($id_siswa);

		// Redirect
		if(isset($_POST['password']) && $_POST['password'] != $_POST['konfirmasi_password']) {
			$this->session->setFlashdata('warning','Oops, Password Salah... Data password dan Konfirmasi Password '.$siswa['nama_lengkap']. '(NISN: '.$siswa['nisn'].') tidak sama. Silakan ketik kembali dengan password yang benar.');
			return redirect()->to(base_url('siswa/akun'));
		}
		// end redirect

		// Start validasi
		if($this->request->getMethod() === 'post' && $this->validate(
			[
            'id_siswa' 	=> 'required',
            'gambar'	=> [
                'mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[gambar,4096]'
            ],
        	])) {
			if(!empty($_FILES['gambar']['name'])) {
				// Image upload
				$avatar  	= $this->request->getFile('gambar');
				$nama_file 	= $avatar->getRandomName();
	            $avatar->move(WRITEPATH . '../assets/upload/siswa/',$nama_file);
	            // Create thumb
	            $image = \Config\Services::image()
			    ->withFile(WRITEPATH . '../assets/upload/siswa/'.$nama_file)
			    ->fit(100, 100, 'center')
			    ->save(WRITEPATH . '../assets/upload/siswa/thumbs/'.$nama_file);
	        	// masuk database
	        	// masuk database
				if(strlen($this->request->getPost('password')) >= 6 && strlen($this->request->getPost('password')) <= 32 ) {
					$data = [	'id_siswa'		=> $siswa['id_siswa'],
								'password'		=> sha1($this->request->getPost('password')),
								'password_hint'	=> $this->request->getPost('password'),
								'gambar'		=> $nama_file
						];
				}else{
					$data = [	'id_siswa'		=> $siswa['id_siswa'],
								'gambar'		=> $nama_file
						];
				}
			}else{
				// masuk database
				if(strlen($this->request->getPost('password')) >= 6 && strlen($this->request->getPost('password')) <= 32 ) {
					$data = [	'id_siswa'		=> $siswa['id_siswa'],
								'password'		=> sha1($this->request->getPost('password')),
								'password_hint'	=> $this->request->getPost('password')
						];
				}else{
					$data = [	'id_siswa'		=> $siswa['id_siswa'],
								'nama_lengkap'	=> $siswa['nama_lengkap'],
						];
				}
			}
			$m_siswa->edit($data);
			// masuk database
			$this->session->setFlashdata('sukses','Data telah diedit');
			return redirect()->to(base_url('siswa/akun'));
	    }else{
			$data = [	'title'			=> 'Update Profile',
						'siswa'			=> $siswa,
						'content'		=> 'siswa/akun/index'
					];
			echo view('siswa/layout/wrapper',$data);
		}
	}
}