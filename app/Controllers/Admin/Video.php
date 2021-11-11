<?php

namespace App\Controllers\Admin;

use App\Models\Video_model;

class Video extends BaseController
{
    // mainpage
    public function index()
    {
        checklogin();
        $m_video = new Video_model();
        $video   = $m_video->listing();
        $total   = $m_video->total();

        // Start validasi
        if ($this->request->getMethod() === 'post' && $this->validate(
            [
                'judul' => 'required',
            ]
        )) {
            // masuk database
            $data = ['id_user' => $this->session->get('id_user'),
                'judul'        => $this->request->getPost('judul'),
                'keterangan'   => $this->request->getPost('keterangan'),
                'video'        => $this->request->getPost('video'),
                'tanggal_post' => date('Y-m-d H:i:s'),
            ];
            $m_video->save($data);
            // masuk database
            $this->session->setFlashdata('sukses', 'Data telah ditambah');

            return redirect()->to(base_url('admin/video'));
        }
        $data = ['title' => 'Video Youtube: ' . $total['total'],
            'video'      => $video,
            'content'    => 'admin/video/index',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // edit
    public function edit($id_video)
    {
        checklogin();
        $m_video = new Video_model();
        $video   = $m_video->detail($id_video);

        // Start validasi
        if ($this->request->getMethod() === 'post' && $this->validate(
            [
                'judul' => 'required|min_length[3]',
            ]
        )) {
            $data = ['id_video' => $id_video,
                'id_user'       => $this->session->get('id_user'),
                'judul'         => $this->request->getPost('judul'),
                'keterangan'    => $this->request->getPost('keterangan'),
                'video'         => $this->request->getPost('video'),
            ];
            $m_video->update($id_video, $data);
            // masuk database
            $this->session->setFlashdata('sukses', 'Data telah diedit');

            return redirect()->to(base_url('admin/video'));
        }
        $data = ['title' => 'Edit Video: ' . $video['judul'],
            'video'      => $video,
            'content'    => 'admin/video/edit',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // delete
    public function delete($id_video)
    {
        checklogin();
        $m_video = new Video_model();
        $data    = ['id_video' => $id_video];
        $m_video->delete($data);
        // masuk database
        $this->session->setFlashdata('sukses', 'Data telah dihapus');

        return redirect()->to(base_url('admin/video'));
    }
}
