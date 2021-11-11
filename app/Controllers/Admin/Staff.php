<?php

namespace App\Controllers\Admin;

use App\Models\Kategori_staff_model;
use App\Models\Staff_model;

class Staff extends BaseController
{
    // mainpage
    public function index()
    {
        checklogin();
        $m_staff          = new Staff_model();
        $m_kategori_staff = new Kategori_staff_model();
        $staff            = $m_staff->listing();
        $total            = $m_staff->total();
        $kategori_staff   = $m_kategori_staff->listing();

        // Start validasi
        if ($this->request->getMethod() === 'post' && $this->validate(
            [
                'nama' => 'required',
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
                $avatar->move(WRITEPATH . '../assets/upload/staff/', $namabaru);
                // Create thumb
                $image = \Config\Services::image()
                    ->withFile(WRITEPATH . '../assets/upload/staff/' . $namabaru)
                    ->fit(100, 100, 'center')
                    ->save(WRITEPATH . '../assets/upload/staff/thumbs/' . $namabaru);
                // masuk database
                // masuk database
                $data = ['id_user'      => $this->session->get('id_user'),
                    'id_kategori_staff' => $this->request->getPost('id_kategori_staff'),
                    'urutan'            => $this->request->getPost('urutan'),
                    'nama'              => $this->request->getPost('nama'),
                    'jabatan'           => $this->request->getPost('jabatan'),
                    'alamat'            => $this->request->getPost('alamat'),
                    'telepon'           => $this->request->getPost('telepon'),
                    'website'           => $this->request->getPost('website'),
                    'email'             => $this->request->getPost('email'),
                    'keahlian'          => $this->request->getPost('keahlian'),
                    'gambar'            => $namabaru,
                    'status_staff'      => $this->request->getPost('status_staff'),
                    'tempat_lahir'      => $this->request->getPost('tempat_lahir'),
                    'tanggal_lahir'     => date('Y-m-d', strtotime($this->request->getPost('tanggal_lahir'))),
                    'tanggal_post'      => date('Y-m-d H:i:s'),
                ];
                $m_staff->tambah($data);
                // masuk database
                $this->session->setFlashdata('sukses', 'Data telah ditambah');

                return redirect()->to(base_url('admin/staff'));
            }
            // masuk database
            $data = ['id_user'      => $this->session->get('id_user'),
                'id_kategori_staff' => $this->request->getPost('id_kategori_staff'),
                'urutan'            => $this->request->getPost('urutan'),
                'nama'              => $this->request->getPost('nama'),
                'jabatan'           => $this->request->getPost('jabatan'),
                'alamat'            => $this->request->getPost('alamat'),
                'telepon'           => $this->request->getPost('telepon'),
                'website'           => $this->request->getPost('website'),
                'email'             => $this->request->getPost('email'),
                'keahlian'          => $this->request->getPost('keahlian'),
                // 'gambar'		=> $namabaru,
                'status_staff'  => $this->request->getPost('status_staff'),
                'tempat_lahir'  => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir' => date('Y-m-d', strtotime($this->request->getPost('tanggal_lahir'))),
                'tanggal_post'  => date('Y-m-d H:i:s'),
            ];
            $m_staff->tambah($data);
            // masuk database
            $this->session->setFlashdata('sukses', 'Data telah ditambah');

            return redirect()->to(base_url('admin/staff'));
        }
        $data = ['title'     => 'Data Staff: ' . $total['total'],
            'staff'          => $staff,
            'kategori_staff' => $kategori_staff,
            'content'        => 'admin/staff/index',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // edit
    public function edit($id_staff)
    {
        checklogin();
        $m_kategori_staff = new Kategori_staff_model();
        $m_staff          = new Staff_model();
        $staff            = $m_staff->detail($id_staff);
        $kategori_staff   = $m_kategori_staff->listing();

        // Start validasi
        if ($this->request->getMethod() === 'post' && $this->validate(
            [
                'nama' => 'required',
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
                $avatar->move(WRITEPATH . '../assets/upload/staff/', $namabaru);
                // Create thumb
                $image = \Config\Services::image()
                    ->withFile(WRITEPATH . '../assets/upload/staff/' . $namabaru)
                    ->fit(100, 100, 'center')
                    ->save(WRITEPATH . '../assets/upload/staff/thumbs/' . $namabaru);
                // masuk database
                // masuk database
                $data = ['id_staff'     => $id_staff,
                    'id_user'           => $this->session->get('id_user'),
                    'id_kategori_staff' => $this->request->getPost('id_kategori_staff'),
                    'urutan'            => $this->request->getPost('urutan'),
                    'nama'              => $this->request->getPost('nama'),
                    'jabatan'           => $this->request->getPost('jabatan'),
                    'alamat'            => $this->request->getPost('alamat'),
                    'telepon'           => $this->request->getPost('telepon'),
                    'website'           => $this->request->getPost('website'),
                    'email'             => $this->request->getPost('email'),
                    'keahlian'          => $this->request->getPost('keahlian'),
                    'gambar'            => $namabaru,
                    'status_staff'      => $this->request->getPost('status_staff'),
                    'tempat_lahir'      => $this->request->getPost('tempat_lahir'),
                    'tanggal_lahir'     => date('Y-m-d', strtotime($this->request->getPost('tanggal_lahir'))),
                ];
                $m_staff->edit($data);
                // masuk database
                $this->session->setFlashdata('sukses', 'Data telah disimpan');

                return redirect()->to(base_url('admin/staff'));
            }
            // masuk database
            $data = ['id_staff'     => $id_staff,
                'id_user'           => $this->session->get('id_user'),
                'id_kategori_staff' => $this->request->getPost('id_kategori_staff'),
                'urutan'            => $this->request->getPost('urutan'),
                'nama'              => $this->request->getPost('nama'),
                'jabatan'           => $this->request->getPost('jabatan'),
                'alamat'            => $this->request->getPost('alamat'),
                'telepon'           => $this->request->getPost('telepon'),
                'website'           => $this->request->getPost('website'),
                'email'             => $this->request->getPost('email'),
                'keahlian'          => $this->request->getPost('keahlian'),
                // 'gambar'		=> $namabaru,
                'status_staff'  => $this->request->getPost('status_staff'),
                'tempat_lahir'  => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir' => date('Y-m-d', strtotime($this->request->getPost('tanggal_lahir'))),
            ];
            $m_staff->edit($data);
            // masuk database
            $this->session->setFlashdata('sukses', 'Data telah disimpan');

            return redirect()->to(base_url('admin/staff'));
        }
        $data = ['title'     => 'Edit Data Staff: ' . $staff['nama'],
            'staff'          => $staff,
            'kategori_staff' => $kategori_staff,
            'content'        => 'admin/staff/edit',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // delete
    public function delete($id_staff)
    {
        checklogin();
        $m_staff = new Staff_model();
        $data    = ['id_staff' => $id_staff];
        $m_staff->delete($data);
        // masuk database
        $this->session->setFlashdata('sukses', 'Data telah dihapus');

        return redirect()->to(base_url('admin/staff'));
    }
}
