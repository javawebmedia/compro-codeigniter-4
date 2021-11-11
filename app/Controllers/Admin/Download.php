<?php

namespace App\Controllers\Admin;

use App\Models\Download_model;
use App\Models\Kategori_download_model;

class Download extends BaseController
{
    // index
    public function index()
    {
        checklogin();
        $m_download          = new Download_model();
        $m_kategori_download = new Kategori_download_model();
        $download            = $m_download->listing();
        $total               = $m_download->total();

        $data = ['title' => 'Data File Download (' . $total . ')',
            'download'   => $download,
            'content'    => 'admin/download/index',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // Tambah
    public function tambah()
    {
        checklogin();
        $m_download          = new Download_model();
        $m_kategori_download = new Kategori_download_model();
        $kategori_download   = $m_kategori_download->listing();

        // Start validasi
        if ($this->request->getMethod() === 'post' && $this->validate(
            [
                'judul_download' => 'required',
                'gambar' => [
                    'uploaded[gambar]',
                    'mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png,application/pdf,application/doc,application/msword,application/xls,application/xlsx,application/ppt,application/pptx]',
                    'max_size[gambar,4096]',
                ],
            ]
        )) {
            if (! empty($_FILES['gambar']['name'])) {
                // Image upload
                $avatar   = $this->request->getFile('gambar');
                $namabaru = str_replace(' ', '-', $avatar->getName());
                $avatar->move(WRITEPATH . '../assets/upload/file/', $namabaru);
                // masuk database
                $data = [
                    'id_user'              => $this->session->get('id_user'),
                    'id_kategori_download' => $this->request->getVar('id_kategori_download'),
                    'judul_download'       => $this->request->getVar('judul_download'),
                    'jenis_download'       => $this->request->getVar('jenis_download'),
                    'isi'                  => $this->request->getVar('isi'),
                    'gambar'               => $namabaru,
                    'website'              => $this->request->getVar('website'),
                    'tanggal_post'         => date('Y-m-d H:i:s'),
                ];
                $m_download->tambah($data);

                return redirect()->to(base_url('admin/download'))->with('sukses', 'Data Berhasil di Simpan');
            }
            $data = [
                'id_user'              => $this->session->get('id_user'),
                'id_kategori_download' => $this->request->getVar('id_kategori_download'),
                'judul_download'       => $this->request->getVar('judul_download'),
                'jenis_download'       => $this->request->getVar('jenis_download'),
                'isi'                  => $this->request->getVar('isi'),
                'website'              => $this->request->getVar('website'),
                'tanggal_post'         => date('Y-m-d H:i:s'),
            ];
            $m_download->tambah($data);

            return redirect()->to(base_url('admin/download'))->with('sukses', 'Data Berhasil di Simpan');
        }

        $data = ['title'        => 'Tambah Download',
            'kategori_download' => $kategori_download,
            'content'           => 'admin/download/tambah',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // edit
    public function edit($id_download)
    {
        checklogin();
        $m_kategori_download = new Kategori_download_model();
        $m_download          = new Download_model();
        $kategori_download   = $m_kategori_download->listing();
        $download            = $m_download->detail($id_download);
        // Start validasi
        if ($this->request->getMethod() === 'post' && $this->validate(
            [
                'judul_download' => 'required',
                'gambar' => [
                    'uploaded[gambar]',
                    'mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png,application/pdf,document/doc,application/msword,application/xls,application/xlsx,application/ppt,application/pptx]',
                    'max_size[gambar,4096]',
                ],
            ]
        )) {
            if (! empty($_FILES['gambar']['name'])) {
                // Image upload
                $avatar   = $this->request->getFile('gambar');
                $namabaru = str_replace(' ', '-', $avatar->getName());
                $avatar->move(WRITEPATH . '../assets/upload/file/', $namabaru);
                // masuk database
                $data = [
                    'id_download'          => $id_download,
                    'id_user'              => $this->session->get('id_user'),
                    'id_kategori_download' => $this->request->getVar('id_kategori_download'),
                    'judul_download'       => $this->request->getVar('judul_download'),
                    'jenis_download'       => $this->request->getVar('jenis_download'),
                    'isi'                  => $this->request->getVar('isi'),
                    'gambar'               => $namabaru,
                    'website'              => $this->request->getVar('website'),
                ];
                $m_download->edit($data);

                return redirect()->to(base_url('admin/download'))->with('sukses', 'Data Berhasil di Simpan');
            }
            $data = [
                'id_download'          => $id_download,
                'id_user'              => $this->session->get('id_user'),
                'id_kategori_download' => $this->request->getVar('id_kategori_download'),
                'judul_download'       => $this->request->getVar('judul_download'),
                'jenis_download'       => $this->request->getVar('jenis_download'),
                'isi'                  => $this->request->getVar('isi'),
                'website'              => $this->request->getVar('website'),
            ];
            $m_download->edit($data);

            return redirect()->to(base_url('admin/download'))->with('sukses', 'Data Berhasil di Simpan');
        }

        $data = ['title'        => 'Edit Download: ' . $download['judul_download'],
            'kategori_download' => $kategori_download,
            'download'          => $download,
            'content'           => 'admin/download/edit',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // unduh
    public function unduh($id_download)
    {
        checklogin();
        $m_kategori_download = new Kategori_download_model();
        $m_download          = new Download_model();
        $kategori_download   = $m_kategori_download->listing();
        $download            = $m_download->detail($id_download);

        return $this->response->download('../assets/upload/file/' . $download['gambar'], null);
    }

    // Delete
    public function delete($id_download)
    {
        checklogin();
        $m_download = new Download_model();
        $data       = ['id_download' => $id_download];
        $m_download->delete($data);
        // masuk database
        $this->session->setFlashdata('sukses', 'Data telah dihapus');

        return redirect()->to(base_url('admin/download'));
    }
}
