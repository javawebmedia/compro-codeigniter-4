<?php

namespace App\Controllers\Siswa;

use App\Models\Siswa_model;

class Dasbor extends BaseController
{
    public function index()
    {
        checksiswa();
        $m_siswa = new Siswa_model();
        $siswa   = $m_siswa->detail($this->session->get('id_siswa'));

        $data = ['title' => 'Dashboard Aplikasi',
            'siswa'      => $siswa,
            'content'    => 'siswa/dasbor/index',
        ];
        echo view('siswa/layout/wrapper', $data);
    }
}
