<?php

namespace App\Controllers\Admin;

use App\Models\Kategori_model;

class Kategori extends BaseController
{
    // mainpage
    public function index()
    {
        checklogin();
        $m_kategori = new Kategori_model();
        $kategori   = $m_kategori->listing();
        $total      = $m_kategori->total();

        // Start validasi
        if ($this->request->getMethod() === 'post' && $this->validate(
            [
                'nama_kategori' => 'required|min_length[3]|is_unique[kategori.nama_kategori]',
            ]
        )) {
            // masuk database
            $slug = url_title($this->request->getPost('nama_kategori'), '-', true);
            $data = ['id_user'  => $this->session->get('id_user'),
                'nama_kategori' => $this->request->getPost('nama_kategori'),
                'slug_kategori' => $slug,
                'urutan'        => $this->request->getPost('urutan'),
            ];
            $m_kategori->save($data);
            // masuk database
            $this->session->setFlashdata('sukses', 'Data telah ditambah');

            return redirect()->to(base_url('admin/kategori'));
        }
        $data = ['title' => 'Kategori Berita, Profil &amp; Layanan: ' . $total['total'],
            'kategori'   => $kategori,
            'content'    => 'admin/kategori/index',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // edit
    public function edit($id_kategori)
    {
        checklogin();
        $m_kategori = new Kategori_model();
        $kategori   = $m_kategori->detail($id_kategori);
        $total      = $m_kategori->total();

        // Start validasi
        if ($this->request->getMethod() === 'post' && $this->validate(
            [
                'nama_kategori' => 'required|min_length[3]',
            ]
        )) {
            // masuk database
            $slug = url_title($this->request->getPost('nama_kategori'), '-', true);
            $data = ['id_user'  => $this->session->get('id_user'),
                'nama_kategori' => $this->request->getPost('nama_kategori'),
                'slug_kategori' => $slug,
                'urutan'        => $this->request->getPost('urutan'),
            ];
            $m_kategori->update($id_kategori, $data);
            // masuk database
            $this->session->setFlashdata('sukses', 'Data telah diedit');

            return redirect()->to(base_url('admin/kategori'));
        }
        $data = ['title' => 'Edit kategori berita: ' . $kategori['nama_kategori'],
            'kategori'   => $kategori,
            'content'    => 'admin/kategori/edit',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // delete
    public function delete($id_kategori)
    {
        checklogin();
        $m_kategori = new Kategori_model();
        $data       = ['id_kategori' => $id_kategori];
        $m_kategori->delete($data);
        // masuk database
        $this->session->setFlashdata('sukses', 'Data telah dihapus');

        return redirect()->to(base_url('admin/kategori'));
    }
}
