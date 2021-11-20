<?php

namespace App\Controllers;

use App\Models\Galeri_model;
use App\Models\Konfigurasi_model;

class Galeri extends BaseController
{
    // Galeri
    public function index()
    {
        $m_konfigurasi = new Konfigurasi_model();
        $m_galeri      = new Galeri_model();
        $konfigurasi   = $m_konfigurasi->listing();
        $galeri        = $m_galeri->galeri();

        $data = ['title'  => 'Galeri Gambar',
            'description' => 'Galeri Gambar ' . $konfigurasi['namaweb'] . ', ' . $konfigurasi['tentang'],
            'keywords'    => 'Galeri Gambar ' . $konfigurasi['namaweb'] . ', ' . $konfigurasi['keywords'],
            'galeri'      => $galeri,
            'konfigurasi' => $konfigurasi,
            'content'     => 'galeri/index',
        ];
        echo view('layout/wrapper', $data);
    }
}
