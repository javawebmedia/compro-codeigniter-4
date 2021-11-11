<?php

namespace App\Controllers\Admin;

use App\Models\Kategori_staff_model;

class Kategori_staff extends BaseController
{
    // mainpage
    public function index()
    {
        checklogin();
        $m_kategori_staff = new Kategori_staff_model();
        $kategori_staff   = $m_kategori_staff->listing();
        $total            = $m_kategori_staff->total();

        // Start validasi
        if ($this->request->getMethod() === 'post' && $this->validate(
            [
                'nama_kategori_staff' => 'required|min_length[3]|is_unique[kategori_staff.nama_kategori_staff]',
            ]
        )) {
            // masuk database
            $slug = url_title($this->request->getPost('nama_kategori_staff'), '-', true);
            $data = ['id_user'        => $this->session->get('id_user'),
                'nama_kategori_staff' => $this->request->getPost('nama_kategori_staff'),
                'slug_kategori_staff' => $slug,
                'urutan'              => $this->request->getPost('urutan'),
            ];
            $m_kategori_staff->save($data);
            // masuk database
            $this->session->setFlashdata('sukses', 'Data telah ditambah');

            return redirect()->to(base_url('admin/kategori_staff'));
        }
        $data = ['title'     => 'Kategori Staff: ' . $total['total'],
            'kategori_staff' => $kategori_staff,
            'content'        => 'admin/kategori_staff/index',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // edit
    public function edit($id_kategori_staff)
    {
        checklogin();
        $m_kategori_staff = new Kategori_staff_model();
        $kategori_staff   = $m_kategori_staff->detail($id_kategori_staff);
        $total            = $m_kategori_staff->total();

        // Start validasi
        if ($this->request->getMethod() === 'post' && $this->validate(
            [
                'nama_kategori_staff' => 'required|min_length[3]',
            ]
        )) {
            // masuk database
            $slug = url_title($this->request->getPost('nama_kategori_staff'), '-', true);
            $data = ['id_user'        => $this->session->get('id_user'),
                'nama_kategori_staff' => $this->request->getPost('nama_kategori_staff'),
                'slug_kategori_staff' => $slug,
                'urutan'              => $this->request->getPost('urutan'),
            ];
            $m_kategori_staff->update($id_kategori_staff, $data);
            // masuk database
            $this->session->setFlashdata('sukses', 'Data telah diedit');

            return redirect()->to(base_url('admin/kategori_staff'));
        }
        $data = ['title'     => 'Edit Kategori Staff: ' . $kategori_staff['nama_kategori_staff'],
            'kategori_staff' => $kategori_staff,
            'content'        => 'admin/kategori_staff/edit',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // delete
    public function delete($id_kategori_staff)
    {
        checklogin();
        $m_kategori_staff = new Kategori_staff_model();
        $data             = ['id_kategori_staff' => $id_kategori_staff];
        $m_kategori_staff->delete($data);
        // masuk database
        $this->session->setFlashdata('sukses', 'Data telah dihapus');

        return redirect()->to(base_url('admin/kategori_staff'));
    }
}
