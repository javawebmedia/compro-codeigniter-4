<?php

namespace App\Controllers\Admin;

use App\Models\Prestasi_model;

class Prestasi extends BaseController
{
    // mainpage
    public function index()
    {
        checklogin();
        $m_prestasi = new Prestasi_model();
        $prestasi   = $m_prestasi->listing();
        $total      = $m_prestasi->total();

        $data = ['title' => 'Data Prestasi: ' . $total['total'],
            'prestasi'   => $prestasi,
            'content'    => 'admin/prestasi/index',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // tambah
    public function tambah()
    {
        checklogin();
        $m_prestasi = new Prestasi_model();

        // Start validasi
        if ($this->request->getMethod() === 'post' && $this->validate(
            [
                'nama_prestasi' => 'required',
                'gambar' => [
                    'mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]',
                    'max_size[gambar,4096]',
                ],
            ]
        )) {
            if (! empty($_FILES['gambar']['name'])) {
                // Image upload
                $avatar   = $this->request->getFile('gambar');
                $namabaru = str_replace(' ', '-', $avatar->getName());
                $avatar->move(WRITEPATH . '../assets/upload/prestasi/', $namabaru);
                // Create thumb
                $image = \Config\Services::image()
                    ->withFile(WRITEPATH . '../assets/upload/prestasi/' . $namabaru)
                    ->fit(100, 100, 'center')
                    ->save(WRITEPATH . '../assets/upload/prestasi/thumbs/' . $namabaru);
                // masuk database
                $slug_prestasi = strtolower(url_title($this->request->getVar('nama_prestasi') . '-' . $this->request->getVar('tingkat') . '-' . $this->request->getVar('tahun')));

                $data = ['id_user'       => $this->session->get('id_user'),
                    'prestasi_oleh'      => $this->request->getPost('prestasi_oleh'),
                    'slug_prestasi'      => $slug_prestasi,
                    'nama_prestasi'      => $this->request->getPost('nama_prestasi'),
                    'tingkat'            => $this->request->getPost('tingkat'),
                    'tahun'              => $this->request->getPost('tahun'),
                    'nama_kegiatan'      => $this->request->getPost('nama_kegiatan'),
                    'hadiah_penghargaan' => $this->request->getPost('hadiah_penghargaan'),
                    'penyelenggara'      => $this->request->getPost('penyelenggara'),
                    'bidang_prestasi'    => $this->request->getPost('bidang_prestasi'),
                    'keterangan'         => $this->request->getPost('keterangan'),
                    'status_prestasi'    => $this->request->getPost('status_prestasi'),
                    'gambar'             => $namabaru,
                    'tanggal_post'       => date('Y-m-d H:i:s'),
                ];
                $m_prestasi->tambah($data);
                // masuk database
                $this->session->setFlashdata('sukses', 'Data telah ditambah');

                return redirect()->to(base_url('admin/prestasi'));
            }
            // masuk database
            $slug_prestasi = strtolower(url_title($this->request->getVar('nama_prestasi') . '-' . $this->request->getVar('tingkat') . '-' . $this->request->getVar('tahun')));
            $data          = ['id_user' => $this->session->get('id_user'),
                'prestasi_oleh'         => $this->request->getPost('prestasi_oleh'),
                'slug_prestasi'         => $slug_prestasi,
                'nama_prestasi'         => $this->request->getPost('nama_prestasi'),
                'tingkat'               => $this->request->getPost('tingkat'),
                'tahun'                 => $this->request->getPost('tahun'),
                'nama_kegiatan'         => $this->request->getPost('nama_kegiatan'),
                'hadiah_penghargaan'    => $this->request->getPost('hadiah_penghargaan'),
                'penyelenggara'         => $this->request->getPost('penyelenggara'),
                'bidang_prestasi'       => $this->request->getPost('bidang_prestasi'),
                'keterangan'            => $this->request->getPost('keterangan'),
                'status_prestasi'       => $this->request->getPost('status_prestasi'),
                // 'gambar'			=> $namabaru,
                'tanggal_post' => date('Y-m-d H:i:s'),
            ];
            $m_prestasi->tambah($data);
            // masuk database
            $this->session->setFlashdata('sukses', 'Data telah ditambah');

            return redirect()->to(base_url('admin/prestasi'));
        }
        $data = ['title' => 'Tambah Prestasi',
            'content'    => 'admin/prestasi/tambah',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // edit
    public function edit($id_prestasi)
    {
        checklogin();
        $m_prestasi = new Prestasi_model();
        $prestasi   = $m_prestasi->detail($id_prestasi);

        // Start validasi
        if ($this->request->getMethod() === 'post' && $this->validate(
            [
                'nama_prestasi' => 'required',
                'gambar' => [
                    'mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]',
                    'max_size[gambar,4096]',
                ],
            ]
        )) {
            if (! empty($_FILES['gambar']['name'])) {
                // Image upload
                $avatar   = $this->request->getFile('gambar');
                $namabaru = str_replace(' ', '-', $avatar->getName());
                $avatar->move(WRITEPATH . '../assets/upload/prestasi/', $namabaru);
                // Create thumb
                $image = \Config\Services::image()
                    ->withFile(WRITEPATH . '../assets/upload/prestasi/' . $namabaru)
                    ->fit(100, 100, 'center')
                    ->save(WRITEPATH . '../assets/upload/prestasi/thumbs/' . $namabaru);
                // masuk database
                $slug_prestasi = strtolower(url_title($this->request->getVar('nama_prestasi') . '-' . $this->request->getVar('tingkat') . '-' . $this->request->getVar('tahun')));
                $data          = ['id_prestasi' => $id_prestasi,
                    'id_user'                   => $this->session->get('id_user'),
                    'prestasi_oleh'             => $this->request->getPost('prestasi_oleh'),
                    'slug_prestasi'             => $slug_prestasi,
                    'nama_prestasi'             => $this->request->getPost('nama_prestasi'),
                    'tingkat'                   => $this->request->getPost('tingkat'),
                    'tahun'                     => $this->request->getPost('tahun'),
                    'nama_kegiatan'             => $this->request->getPost('nama_kegiatan'),
                    'hadiah_penghargaan'        => $this->request->getPost('hadiah_penghargaan'),
                    'penyelenggara'             => $this->request->getPost('penyelenggara'),
                    'bidang_prestasi'           => $this->request->getPost('bidang_prestasi'),
                    'keterangan'                => $this->request->getPost('keterangan'),
                    'status_prestasi'           => $this->request->getPost('status_prestasi'),
                    'gambar'                    => $namabaru,
                ];
                $m_prestasi->edit($data);
                // masuk database
                $this->session->setFlashdata('sukses', 'Data telah disimpan');

                return redirect()->to(base_url('admin/prestasi'));
            }
            // masuk database
            $slug_prestasi = strtolower(url_title($this->request->getVar('nama_prestasi') . '-' . $this->request->getVar('tingkat') . '-' . $this->request->getVar('tahun')));
            $data          = ['id_prestasi' => $id_prestasi,
                'id_user'                   => $this->session->get('id_user'),
                'prestasi_oleh'             => $this->request->getPost('prestasi_oleh'),
                'slug_prestasi'             => $slug_prestasi,
                'nama_prestasi'             => $this->request->getPost('nama_prestasi'),
                'tingkat'                   => $this->request->getPost('tingkat'),
                'tahun'                     => $this->request->getPost('tahun'),
                'nama_kegiatan'             => $this->request->getPost('nama_kegiatan'),
                'hadiah_penghargaan'        => $this->request->getPost('hadiah_penghargaan'),
                'penyelenggara'             => $this->request->getPost('penyelenggara'),
                'bidang_prestasi'           => $this->request->getPost('bidang_prestasi'),
                'keterangan'                => $this->request->getPost('keterangan'),
                'status_prestasi'           => $this->request->getPost('status_prestasi'),
                // 'gambar'			=> $namabaru
            ];
            $m_prestasi->edit($data);
            // masuk database
            $this->session->setFlashdata('sukses', 'Data telah disimpan');

            return redirect()->to(base_url('admin/prestasi'));
        }
        $data = ['title' => 'Edit Data Prestasi: ' . $prestasi['nama_prestasi'],
            'prestasi'   => $prestasi,
            'content'    => 'admin/prestasi/edit',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // delete
    public function delete($id_prestasi)
    {
        checklogin();
        $m_prestasi = new Prestasi_model();
        $data       = ['id_prestasi' => $id_prestasi];
        $m_prestasi->delete($data);
        // masuk database
        $this->session->setFlashdata('sukses', 'Data telah dihapus');

        return redirect()->to(base_url('admin/prestasi'));
    }
}
