<?php

namespace App\Controllers;

use App\Models\Client_model;
use App\Models\Konfigurasi_model;

class Client extends BaseController
{
    // Client
    public function index()
    {
        $m_konfigurasi = new Konfigurasi_model();
        $m_client      = new Client_model();
        $konfigurasi   = $m_konfigurasi->listing();
        $client        = $m_client->home();

        $data = ['title'  => 'Client Kami',
            'description' => 'Client Kami ' . $konfigurasi['namaweb'] . ', ' . $konfigurasi['tentang'],
            'keywords'    => 'Client Kami ' . $konfigurasi['namaweb'] . ', ' . $konfigurasi['keywords'],
            'client'      => $client,
            'konfigurasi' => $konfigurasi,
            'content'     => 'client/index',
        ];
        echo view('layout/wrapper', $data);
    }
}
