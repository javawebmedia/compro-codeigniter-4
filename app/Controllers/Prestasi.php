<?php

namespace App\Controllers;

use App\Models\Konfigurasi_model;
use App\Models\Prestasi_model;

class Prestasi extends BaseController
{
    // Prestasi
    public function index()
    {
        $m_konfigurasi = new Konfigurasi_model();
        $m_prestasi    = new Prestasi_model();
        $konfigurasi   = $m_konfigurasi->listing();
        $prestasi      = $m_prestasi->home();

        $data = ['title'  => 'Prestasi ' . $konfigurasi['namaweb'],
            'description' => 'Prestasi ' . $konfigurasi['namaweb'],
            'keywords'    => 'Prestasi ' . $konfigurasi['namaweb'],
            'prestasi'    => $prestasi,
            'konfigurasi' => $konfigurasi,
            'content'     => 'prestasi/index',
        ];
        echo view('layout/wrapper', $data);
    }

    // oleh
    public function oleh($prestasi_oleh)
    {
        $m_konfigurasi = new Konfigurasi_model();
        $m_prestasi    = new Prestasi_model();
        $konfigurasi   = $m_konfigurasi->listing();
        $prestasi      = $m_prestasi->prestasi_oleh($prestasi_oleh);

        $data = ['title'  => 'Prestasi ' . $prestasi_oleh,
            'description' => 'Prestasi ' . $prestasi_oleh,
            'keywords'    => 'Prestasi ' . $prestasi_oleh,
            'prestasi'    => $prestasi,
            'konfigurasi' => $konfigurasi,
            'content'     => 'prestasi/index',
        ];
        echo view('layout/wrapper', $data);
    }

    // read
    public function read($slug_prestasi)
    {
        $m_prestasi = new Prestasi_model();
        $prestasi   = $m_prestasi->read($slug_prestasi);
        // Update hits
        $data = ['id_prestasi' => $prestasi['id_prestasi'],
            'hits'             => $prestasi['hits'] + 1,
        ];
        $m_prestasi->edit($data);
        // Update hits
        $data = ['title'  => $prestasi['nama_prestasi'],
            'description' => $prestasi['nama_prestasi'],
            'keywords'    => $prestasi['nama_prestasi'],
            'prestasi'    => $prestasi,
            'content'     => 'prestasi/read',
        ];
        echo view('layout/wrapper', $data);
    }
}
