<?php 
namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\Kategori_download_model;

class Kategori_download extends BaseController
{

	// mainpage
	public function index()
	{
		checklogin();
		$m_kategori_download = new Kategori_download_model();
		$kategori_download 	= $m_kategori_download->listing();
		$total 		= $m_kategori_download->total();

		// Start validasi
		if($this->request->getMethod() === 'post' && $this->validate(
			[
            'nama_kategori_download' 	=> 'required|min_length[3]|is_unique[kategori_download.nama_kategori_download]',
        	])) {
			// masuk database
			$slug = url_title($this->request->getPost('nama_kategori_download'), '-', TRUE); 
			$data = [	'id_user'					=> $this->session->get('id_user'),
						'nama_kategori_download'	=> $this->request->getPost('nama_kategori_download'),
						'slug_kategori_download'	=> $slug,
						'urutan'					=> $this->request->getPost('urutan')
					];
			$m_kategori_download->save($data);
			// masuk database
			$this->session->setFlashdata('sukses','Data telah ditambah');
			return redirect()->to(base_url('admin/kategori_download'));
	    }else{
			$data = [	'title'			=> 'Kategori Download: '.$total['total'],
						'kategori_download'		=> $kategori_download,
						'content'		=> 'admin/kategori_download/index'
					];
			echo view('admin/layout/wrapper',$data);
		}
	}

	// edit
	public function edit($id_kategori_download)
	{
		checklogin();
		$m_kategori_download = new Kategori_download_model();
		$kategori_download 	= $m_kategori_download->detail($id_kategori_download);
		$total 		= $m_kategori_download->total();

		// Start validasi
		if($this->request->getMethod() === 'post' && $this->validate(
			[
            'nama_kategori_download' 	=> 'required|min_length[3]',
        	])) {
			// masuk database
			$slug = url_title($this->request->getPost('nama_kategori_download'), '-', TRUE); 
			$data = [	'id_user'		=> $this->session->get('id_user'),
						'nama_kategori_download'	=> $this->request->getPost('nama_kategori_download'),
						'slug_kategori_download'	=> $slug,
						'urutan'		=> $this->request->getPost('urutan')
					];
			$m_kategori_download->update($id_kategori_download,$data);
			// masuk database
			$this->session->setFlashdata('sukses','Data telah diedit');
			return redirect()->to(base_url('admin/kategori_download'));
	    }else{
			$data = [	'title'					=> 'Edit Kategori Download: '.$kategori_download['nama_kategori_download'],
						'kategori_download'		=> $kategori_download,
						'content'				=> 'admin/kategori_download/edit'
					];
			echo view('admin/layout/wrapper',$data);
		}
	}

	// delete
	public function delete($id_kategori_download)
	{
		checklogin();
		$m_kategori_download = new Kategori_download_model();
		$data = ['id_kategori_download'	=> $id_kategori_download];
		$m_kategori_download->delete($data);
		// masuk database
		$this->session->setFlashdata('sukses','Data telah dihapus');
		return redirect()->to(base_url('admin/kategori_download'));
	}
}