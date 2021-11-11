<?php

namespace App\Controllers\Admin;

use App\Models\Kategori_galeri_model;

class Kategori_galeri extends BaseController
{
    // mainpage
    public function index()
    {
        checklogin();
        $m_kategori_galeri = new Kategori_galeri_model();
        $kategori_galeri   = $m_kategori_galeri->listing();
        $total             = $m_kategori_galeri->total();

        // Start validasi
        if ($this->request->getMethod() === 'post' && $this->validate(
            [
                'nama_kategori_galeri' => 'required|min_length[3]|is_unique[kategori_galeri.nama_kategori_galeri]',
            ]
        )) {
            // masuk database
            $slug = url_title($this->request->getPost('nama_kategori_galeri'), '-', true);
            $data = ['id_user'         => $this->session->get('id_user'),
                'nama_kategori_galeri' => $this->request->getPost('nama_kategori_galeri'),
                'slug_kategori_galeri' => $slug,
                'urutan'               => $this->request->getPost('urutan'),
            ];
            $m_kategori_galeri->save($data);
            // masuk database
            $this->session->setFlashdata('sukses', 'Data telah ditambah');

            return redirect()->to(base_url('admin/kategori_galeri'));
        }
        $data = ['title'      => 'Kategori Galeri: ' . $total['total'],
            'kategori_galeri' => $kategori_galeri,
            'content'         => 'admin/kategori_galeri/index',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // edit
    public function edit($id_kategori_galeri)
    {
        checklogin();
        $m_kategori_galeri = new Kategori_galeri_model();
        $kategori_galeri   = $m_kategori_galeri->detail($id_kategori_galeri);
        $total             = $m_kategori_galeri->total();

        // Start validasi
        if ($this->request->getMethod() === 'post' && $this->validate(
            [
                'nama_kategori_galeri' => 'required|min_length[3]',
            ]
        )) {
            // masuk database
            $slug = url_title($this->request->getPost('nama_kategori_galeri'), '-', true);
            $data = ['id_user'         => $this->session->get('id_user'),
                'nama_kategori_galeri' => $this->request->getPost('nama_kategori_galeri'),
                'slug_kategori_galeri' => $slug,
                'urutan'               => $this->request->getPost('urutan'),
            ];
            $m_kategori_galeri->update($id_kategori_galeri, $data);
            // masuk database
            $this->session->setFlashdata('sukses', 'Data telah diedit');

            return redirect()->to(base_url('admin/kategori_galeri'));
        }
        $data = ['title'      => 'Edit Kategori Galeri: ' . $kategori_galeri['nama_kategori_galeri'],
            'kategori_galeri' => $kategori_galeri,
            'content'         => 'admin/kategori_galeri/edit',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // delete
    public function delete($id_kategori_galeri)
    {
        checklogin();
        $m_kategori_galeri = new Kategori_galeri_model();
        $data              = ['id_kategori_galeri' => $id_kategori_galeri];
        $m_kategori_galeri->delete($data);
        // masuk database
        $this->session->setFlashdata('sukses', 'Data telah dihapus');

        return redirect()->to(base_url('admin/kategori_galeri'));
    }
}
