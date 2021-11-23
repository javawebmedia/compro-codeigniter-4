<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dasbor extends BaseController
{
    public function index()
    {
        checklogin();
        $data = ['title' => 'Dashboard Aplikasi',
            'content'    => 'admin/dasbor/index',
        ];
        echo view('admin/layout/wrapper', $data);
    }
}
