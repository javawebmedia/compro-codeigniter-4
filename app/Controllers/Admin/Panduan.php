<?php

namespace App\Controllers\Admin;

use App\Models\Download_model;

class Panduan extends BaseController
{
    public function index()
    {
        checklogin();
        $m_download = new Download_model();
        $download   = $m_download->jenis_download('Panduan');

        $data = ['title' => 'Panduan Penggunaan Website',
            'download'   => $download,
            'content'    => 'admin/panduan/index',
        ];
        echo view('admin/layout/wrapper', $data);
    }
}
