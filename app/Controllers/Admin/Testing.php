<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;

class Testing extends Controller
{
    public function index()
    {
        $pager = \Config\Services::pager();
        $model = new \App\Models\Pmodel();

        $data = [
            'users' => $model->paginate(2),
            'pager' => $model->pager,
        ];
        echo $pager->links();
        //echo view('admin/dasbor/testing', $data);
    }
}
