<?php

namespace App\Controllers;

use App\Models\Galeri_model;
use App\Models\Konfigurasi_model;

class Kontak extends BaseController
{
    // Kontak
    public function index()
    {
        $m_konfigurasi = new Konfigurasi_model();
        $m_galeri      = new Galeri_model();
        $konfigurasi   = $m_konfigurasi->listing();
        $slider        = $m_galeri->slider();

        $data = ['title'  => 'Kontak Kami',
            'description' => 'Kontak Kami ' . $konfigurasi['namaweb'] . ', ' . $konfigurasi['tentang'],
            'keywords'    => 'Kontak Kami ' . $konfigurasi['namaweb'] . ', ' . $konfigurasi['keywords'],
            'slider'      => $slider,
            'konfigurasi' => $konfigurasi,
            'content'     => 'kontak/index',
        ];
        echo view('layout/wrapper', $data);
    }
}
