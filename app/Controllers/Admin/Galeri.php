<?php 
namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\Galeri_model;
use App\Models\Kategori_galeri_model;

class Galeri extends BaseController
{
	
	// index
	public function index()
	{
		checklogin();
		$m_galeri 		= new Galeri_model();
		$m_kategori_galeri 	= new Kategori_galeri_model();
		$galeri 		= $m_galeri->listing();
		$total 			= $m_galeri->total();

		$data = [	'title'			=> 'Galeri dan Banner ('.$total.')',
					'galeri'		=> $galeri,
					'content'		=> 'admin/galeri/index'
				];
		echo view('admin/layout/wrapper',$data);
	}

	// Tambah
	public function tambah()
	{
		checklogin();
		$m_galeri 			= new Galeri_model();
		$m_kategori_galeri 	= new Kategori_galeri_model();
		$kategori_galeri 	= $m_kategori_galeri->listing();

		// Start validasi
		if($this->request->getMethod() === 'post' && $this->validate(
			[
				'judul_galeri' 	=> 'required',
				'gambar'	 	=> [
					                'uploaded[gambar]',
					                'mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]',
					                'max_size[gambar,4096]',
            					],
        	])) {
			if(!empty($_FILES['gambar']['name'])) {
				// Image upload
				$avatar  	= $this->request->getFile('gambar');
				$namabaru 	= str_replace(' ','-',$avatar->getName());
	            $avatar->move(WRITEPATH . '../assets/upload/image/',$namabaru);
	            // Create thumb
	            $image = \Config\Services::image()
			    ->withFile(WRITEPATH . '../assets/upload/image/'.$namabaru)
			    ->fit(100, 100, 'center')
			    ->save(WRITEPATH . '../assets/upload/image/thumbs/'.$namabaru);
	        	// masuk database
	        	$data = array(
	        		'id_user'			=> $this->session->get('id_user'),
					'id_kategori_galeri'=> $this->request->getVar('id_kategori_galeri'),
					'judul_galeri'		=> $this->request->getVar('judul_galeri'),
					'jenis_galeri'		=> $this->request->getVar('jenis_galeri'),
					'isi'				=> $this->request->getVar('isi'),
					'gambar' 			=> $namabaru,
					'website'			=> $this->request->getVar('website'),
					'status_text'		=> $this->request->getVar('status_text'),
					'tanggal_post'		=> date('Y-m-d H:i:s')
	        	);
	        	$m_galeri->tambah($data);
        		return redirect()->to(base_url('admin/galeri'))->with('sukses', 'Data Berhasil di Simpan');
        	}else{
        		$data = array(
	        		'id_user'			=> $this->session->get('id_user'),
					'id_kategori_galeri'=> $this->request->getVar('id_kategori_galeri'),
					'judul_galeri'		=> $this->request->getVar('judul_galeri'),
					'jenis_galeri'		=> $this->request->getVar('jenis_galeri'),
					'isi'				=> $this->request->getVar('isi'),
					'website'			=> $this->request->getVar('website'),
					'status_text'		=> $this->request->getVar('status_text'),
					'tanggal_post'		=> date('Y-m-d H:i:s')
	        	);
	        	$m_galeri->tambah($data);
        		return redirect()->to(base_url('admin/galeri'))->with('sukses', 'Data Berhasil di Simpan');
        	}
        }

		$data = [	'title'				=> 'Tambah Galeri',
					'kategori_galeri'	=> $kategori_galeri,
					'content'			=> 'admin/galeri/tambah'
				];
		echo view('admin/layout/wrapper',$data);
	}

	// edit
	public function edit($id_galeri)
	{
		checklogin();
		$m_kategori_galeri 	= new Kategori_galeri_model();
		$m_galeri 		= new Galeri_model();
		$kategori_galeri 		= $m_kategori_galeri->listing();
		$galeri 		= $m_galeri->detail($id_galeri);
		// Start validasi
		if($this->request->getMethod() === 'post' && $this->validate(
			[
				'judul_galeri' 	=> 'required',
				'gambar'	 	=> [
					                'mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]',
					                'max_size[gambar,4096]',
            					],
        	])) {
			if(!empty($_FILES['gambar']['name'])) {
				// Image upload
				$avatar  	= $this->request->getFile('gambar');
				$namabaru 	= str_replace(' ','-',$avatar->getName());
	            $avatar->move(WRITEPATH . '../assets/upload/image/',$namabaru);
	            // Create thumb
	            $image = \Config\Services::image()
			    ->withFile(WRITEPATH . '../assets/upload/image/'.$namabaru)
			    ->fit(100, 100, 'center')
			    ->save(WRITEPATH . '../assets/upload/image/thumbs/'.$namabaru);
	        	// masuk database
			    $data = array(
	        		'id_galeri'			=> $id_galeri,
	        		'id_user'			=> $this->session->get('id_user'),
					'id_kategori_galeri'=> $this->request->getVar('id_kategori_galeri'),
					'judul_galeri'		=> $this->request->getVar('judul_galeri'),
					'jenis_galeri'		=> $this->request->getVar('jenis_galeri'),
					'isi'				=> $this->request->getVar('isi'),
					'gambar' 			=> $namabaru,
					'website'			=> $this->request->getVar('website'),
					'status_text'		=> $this->request->getVar('status_text'),
	        	);
	        	$m_galeri->edit($data);
        		return redirect()->to(base_url('admin/galeri'))->with('sukses', 'Data Berhasil di Simpan');
			}else{
				$data = array(
	        		'id_galeri'			=> $id_galeri,
	        		'id_user'			=> $this->session->get('id_user'),
					'id_kategori_galeri'=> $this->request->getVar('id_kategori_galeri'),
					'judul_galeri'		=> $this->request->getVar('judul_galeri'),
					'jenis_galeri'		=> $this->request->getVar('jenis_galeri'),
					'isi'				=> $this->request->getVar('isi'),
					'website'			=> $this->request->getVar('website'),
					'status_text'		=> $this->request->getVar('status_text'),
	        	);
	        	$m_galeri->edit($data);
        		return redirect()->to(base_url('admin/galeri'))->with('sukses', 'Data Berhasil di Simpan');
			}
		}

		$data = [	'title'			=> 'Edit Galeri: '.$galeri['judul_galeri'],
					'kategori_galeri'		=> $kategori_galeri,
					'galeri'		=> $galeri,
					'content'		=> 'admin/galeri/edit'
				];
		echo view('admin/layout/wrapper',$data);
	}

	// Delete
	public function delete($id_galeri)
	{
		checklogin();
		$m_galeri = new Galeri_model();
		$data = ['id_galeri'	=> $id_galeri];
		$m_galeri->delete($data);
		// masuk database
		$this->session->setFlashdata('sukses','Data telah dihapus');
		return redirect()->to(base_url('admin/galeri'));
	}
}