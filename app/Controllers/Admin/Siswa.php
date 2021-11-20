<?php

namespace App\Controllers\Admin;

use App\Models\Siswa_model;

// Excel
require '/excel/vendor/autoload.php';

class Siswa extends BaseController
{
    // mainpage
    public function index()
    {
        checklogin();
        $m_siswa = new Siswa_model();
        $siswa   = $m_siswa->listing();
        $total   = $m_siswa->total();
        $data    = ['title' => 'Data Siswa: ' . $total['total'],
            'siswa'         => $siswa,
            'content'       => 'admin/siswa/index',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // Update file
    public function update_skl($jurusan)
    {
        checklogin();
        helper('filesystem');
        $m_siswa = new Siswa_model();
        $siswa   = $m_siswa->jurusan($jurusan);
        if ($jurusan === 'IPA') {
            foreach ($siswa as $siswa) {
                $nama_kelas = str_replace(' ', '', $siswa['kelas']);
                if ($nama_kelas === 'XIIMIPA01') {
                    $nama_file = 'XIIA1';
                } elseif ($nama_kelas === 'XIIMIPA02') {
                    $nama_file = 'XIIA2';
                } elseif ($nama_kelas === 'XIIMIPA03') {
                    $nama_file = 'XIIA3';
                } elseif ($nama_kelas === 'XIIMIPA04') {
                    $nama_file = 'XIIA4';
                } elseif ($nama_kelas === 'XIIMIPA05') {
                    $nama_file = 'XIIA5';
                } elseif ($nama_kelas === 'XIIMIPA06') {
                    $nama_file = 'XIIA6';
                }
                // Filename
                $filename = $nama_file . '-' . $siswa['abs'];

                $data = ['id_siswa' => $siswa['id_siswa'],
                    'id_user'       => $this->session->get('id_user'),
                    'nama_file'     => $filename,
                ];
                $m_siswa->edit($data);
                echo $siswa['nisn'] . ' - ' . $siswa['nama_lengkap'] . ' dengan nama file <strong>' . $filename . '</strong><br>';
            }
            // GET NEW
        } else {
            foreach ($siswa as $siswa) {
                $nama_kelas = str_replace(' ', '', $siswa['kelas']);
                if ($nama_kelas === 'XIIIPS01') {
                    $nama_file = 'XII IPS1';
                } elseif ($nama_kelas === 'XIIIPS02') {
                    $nama_file = 'XII IPS2';
                } elseif ($nama_kelas === 'XIIIPS03') {
                    $nama_file = 'XII IPS3';
                } elseif ($nama_kelas === 'XIIIPS04') {
                    $nama_file = 'XII IPS4';
                } elseif ($nama_kelas === 'XIIIPS05') {
                    $nama_file = 'XII IPS5';
                } elseif ($nama_kelas === 'XIIIPS06') {
                    $nama_file = 'XII IPS6';
                }
                // Filename
                $filename = $nama_file . '-' . $siswa['abs'];

                $data = ['id_siswa' => $siswa['id_siswa'],
                    'id_user'       => $this->session->get('id_user'),
                    'nama_file'     => $filename,
                ];
                $m_siswa->edit($data);
                echo $siswa['nisn'] . ' - ' . $siswa['nama_lengkap'] . ' dengan nama file <strong>' . $filename . '</strong><br>';
            }
            // GET NEW
        }
        // return redirect()->to(base_url('admin/siswa/maps/'.$jurusan));
    }

    // Map
    public function maps($jurusan)
    {
        checklogin();
        helper('filesystem');
        $m_siswa = new Siswa_model();

        if ($jurusan === 'IPA') {
            $dir = '../assets/upload/siswa';
            if (is_dir($dir)) {
                if ($dh = opendir($dir)) {
                    while (($file = readdir($dh)) !== false) {
                        // echo $file."-".substr($file,0,8)."<br>";"<br />";
                        $nama_file = substr($file, 0, 8);
                        $siswa     = $m_siswa->nama_file($nama_file);
                        if ($siswa) {
                            $data = ['id_siswa' => $siswa['id_siswa'],
                                'id_user'       => $this->session->get('id_user'),
                                'skl'           => $file,
                            ];
                            $m_siswa->edit($data);
                            echo $siswa['nisn'] . ' - ' . $siswa['nama_lengkap'] . ' dengan nama file <strong>' . $siswa['skl'] . '</strong><br>';
                        }
                    }
                    closedir($dh);
                }
            }
        } else {
            $dir = '../assets/upload/siswa';
            if (is_dir($dir)) {
                if ($dh = opendir($dir)) {
                    while (($file = readdir($dh)) !== false) {
                        // echo $file."-".substr($file,0,8)."<br>";"<br />";
                        $nama_file = substr($file, 0, 11);
                        $siswa     = $m_siswa->nama_file($nama_file);
                        if ($siswa) {
                            $data = ['id_siswa' => $siswa['id_siswa'],
                                'id_user'       => $this->session->get('id_user'),
                                'skl'           => $file,
                            ];
                            $m_siswa->edit($data);
                            echo $siswa['nisn'] . ' - ' . $siswa['nama_lengkap'] . ' dengan nama file <strong>' . $nama_file . '//////' . $siswa['skl'] . '</strong><br>';
                        }
                    }
                    closedir($dh);
                }
            }
        }
    }

    // detail
    public function detail($id_siswa)
    {
        checklogin();
        $m_siswa = new Siswa_model();
        $siswa   = $m_siswa->detail($id_siswa);

        $data = ['title' => $siswa['nama_lengkap'],
            'siswa'      => $siswa,
            'content'    => 'admin/siswa/detail',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // skl
    public function skl($id_siswa)
    {
        checklogin();
        $m_siswa = new Siswa_model();
        $siswa   = $m_siswa->detail($id_siswa);

        // Start validasi
        if ($this->request->getMethod() === 'post' && $this->validate([
            'id_siswa' => 'required',
            'logo' => [
                'uploaded[skl]',
                'mime_in[skl,image/jpg,image/jpeg,image/gif,image/png,application/pdf]',
                'max_size[skl,4096]',
            ],
        ])) {
            // Image upload
            $avatar   = $this->request->getFile('skl');
            $namabaru = $avatar->getRandomName();
            $avatar->move(WRITEPATH . '../assets/upload/siswa/', $namabaru);

            $data = ['id_siswa' => $id_siswa,
                'id_user'       => $this->session->get('id_user'),
                'skl'           => $namabaru,
            ];
            $m_siswa->edit($data);
            // masuk database
            $this->session->setFlashdata('sukses', 'Data SKL telah disimpan');

            return redirect()->to(base_url('admin/siswa'));
        }
        $data = ['title' => 'Upload SKL',
            'siswa'      => $siswa,
            'content'    => 'admin/siswa/skl',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // Import
    public function import()
    {
        checklogin();
        $m_siswa = new Siswa_model();

        // Start validasi
        if ($this->request->getMethod() === 'post' && $this->validate([
            'id_user' => 'required',
            'file_excel' => [
                'uploaded[file_excel]',
                //'mime_in[application/msexcel,application/vnd.ms-excel,application/msword]',
                'max_size[file_excel,4096]',
            ],
        ])) {
            // File upload
            $avatar   = $this->request->getFile('file_excel');
            $namabaru = $avatar->getName();
            $avatar->move(WRITEPATH . '../assets/upload/file/', $namabaru);
            // Masuk database
            $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
            $reader->setReadDataOnly(true);
            $spreadsheet = $reader->load('../assets/upload/file/' . $namabaru);
            $worksheet   = $spreadsheet->getActiveSheet();
            $i           = 1;
            $rows[]      = '';

            foreach ($worksheet->getRowIterator() as $row) {
                $cellIterator = $row->getCellIterator();
                $hasil        = $cellIterator->setIterateOnlyExistingCells(false);

                $cells = [];

                foreach ($cellIterator as $cell) {
                    $cells[] = $cell->getValue();
                }
                $rows[] = $cells;
                if ($i > 3) {
                    $nisn  = $rows[$i][4];
                    $check = $m_siswa->nisn($nisn);
                    // Get data
                    $data = [
                        'id_user'        => $this->session->get('id_user'),
                        'jurusan'        => $rows[$i][1],
                        'nis'            => $rows[$i][2],
                        'nisn'           => $rows[$i][3],
                        'no_peserta'     => $rows[$i][4],
                        'kelas'          => $rows[$i][5],
                        'abs'            => $rows[$i][6],
                        'nama_lengkap'   => strtoupper($rows[$i][7]),
                        'nama_panggilan' => strtoupper($rows[$i][7]),
                        'jenis_kelamin'  => $rows[$i][8],
                        'tempat_lahir'   => $rows[$i][9],
                        'tanggal_lahir'  => $rows[$i][10],
                        'nama_wali'      => strtoupper($rows[$i][11]),
                        'password'       => sha1($rows[$i][3]),
                        'tanggal_post'   => date('Y-m-d H:i:s'),
                    ];
                    if ($check) {
                    } else {
                        $m_siswa->tambah($data);
                    }
                }
                $i++;
            }
            // masuk database
            $this->session->setFlashdata('sukses', 'Data telah diupdate');

            return redirect()->to(base_url('admin/siswa'));
        }

        $data = ['title' => 'Import Data Siswa',
            'id_user'    => $this->session->get('id_user'),
            'content'    => 'admin/siswa/import',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // tambah
    public function tambah()
    {
        checklogin();
        $m_siswa = new Siswa_model();
        $siswa   = $m_siswa->listing();

        // Start validasi
        if ($this->request->getMethod() === 'post' && $this->validate(
            [
                'nama_lengkap' => 'required',
                'nisn' => 'required|is_unique[siswa.nisn]',
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
                $avatar->move(WRITEPATH . '../assets/upload/siswa/', $namabaru);
                // Create thumb
                $image = \Config\Services::image()
                    ->withFile(WRITEPATH . '../assets/upload/siswa/' . $namabaru)
                    ->fit(100, 100, 'center')
                    ->save(WRITEPATH . '../assets/upload/siswa/thumbs/' . $namabaru);
                // masuk database
                // masuk database
                $data = ['id_user'   => $this->session->get('id_user'),
                    'jurusan'        => $this->request->getPost('jurusan'),
                    'nis'            => $this->request->getPost('nis'),
                    'nisn'           => $this->request->getPost('nisn'),
                    'no_peserta'     => $this->request->getPost('no_peserta'),
                    'kelas'          => $this->request->getPost('kelas'),
                    'abs'            => $this->request->getPost('abs'),
                    'nama_lengkap'   => $this->request->getPost('nama_lengkap'),
                    'nama_panggilan' => $this->request->getPost('nama_panggilan'),
                    'jenis_kelamin'  => $this->request->getPost('jenis_kelamin'),
                    'tempat_lahir'   => $this->request->getPost('tempat_lahir'),
                    'tanggal_lahir'  => date('Y-m-d', strtotime($this->request->getPost('tanggal_lahir'))),
                    'nama_wali'      => $this->request->getPost('nama_wali'),
                    'nama_ibu'       => $this->request->getPost('nama_ibu'),
                    'nama_ayah'      => $this->request->getPost('nama_ayah'),
                    'status_siswa'   => $this->request->getPost('status_siswa'),
                    'password'       => sha1($this->request->getPost('nisn')),
                    'password_hint'  => $this->request->getPost('nisn'),
                    'telepon'        => $this->request->getPost('telepon'),
                    'email'          => $this->request->getPost('email'),
                    'alamat'         => $this->request->getPost('alamat'),
                    'keterangan'     => $this->request->getPost('keterangan'),
                    'gambar'         => $namabaru,
                    'tanggal_post'   => date('Y-m-d H:i:s'),
                ];
                $m_siswa->tambah($data);
                // masuk database
                $this->session->setFlashdata('sukses', 'Data telah ditambah');

                return redirect()->to(base_url('admin/siswa'));
            }
            // masuk database
            $data = ['id_user'   => $this->session->get('id_user'),
                'jurusan'        => $this->request->getPost('jurusan'),
                'nis'            => $this->request->getPost('nis'),
                'nisn'           => $this->request->getPost('nisn'),
                'no_peserta'     => $this->request->getPost('no_peserta'),
                'kelas'          => $this->request->getPost('kelas'),
                'abs'            => $this->request->getPost('abs'),
                'nama_lengkap'   => $this->request->getPost('nama_lengkap'),
                'nama_panggilan' => $this->request->getPost('nama_panggilan'),
                'jenis_kelamin'  => $this->request->getPost('jenis_kelamin'),
                'tempat_lahir'   => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir'  => date('Y-m-d', strtotime($this->request->getPost('tanggal_lahir'))),
                'nama_wali'      => $this->request->getPost('nama_wali'),
                'nama_ibu'       => $this->request->getPost('nama_ibu'),
                'nama_ayah'      => $this->request->getPost('nama_ayah'),
                'status_siswa'   => $this->request->getPost('status_siswa'),
                'password'       => sha1($this->request->getPost('nisn')),
                'password_hint'  => $this->request->getPost('nisn'),
                'telepon'        => $this->request->getPost('telepon'),
                'email'          => $this->request->getPost('email'),
                'alamat'         => $this->request->getPost('alamat'),
                'keterangan'     => $this->request->getPost('keterangan'),
                // 'gambar'		=> $namabaru,
                'tanggal_post' => date('Y-m-d H:i:s'),
            ];
            $m_siswa->tambah($data);
            // masuk database
            $this->session->setFlashdata('sukses', 'Data telah ditambah');

            return redirect()->to(base_url('admin/siswa'));
        }
        $data = ['title' => 'Tambah Siswa',
            'siswa'      => $siswa,
            'content'    => 'admin/siswa/tambah',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // edit
    public function edit($id_siswa)
    {
        checklogin();
        $m_siswa = new Siswa_model();
        $siswa   = $m_siswa->detail($id_siswa);

        // Start validasi
        if ($this->request->getMethod() === 'post' && $this->validate(
            [
                'nama_lengkap' => 'required',
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
                $avatar->move(WRITEPATH . '../assets/upload/siswa/', $namabaru);
                // Create thumb
                $image = \Config\Services::image()
                    ->withFile(WRITEPATH . '../assets/upload/siswa/' . $namabaru)
                    ->fit(100, 100, 'center')
                    ->save(WRITEPATH . '../assets/upload/siswa/thumbs/' . $namabaru);
                // masuk database
                // masuk database
                $data = ['id_siswa'  => $id_siswa,
                    'id_user'        => $this->session->get('id_user'),
                    'jurusan'        => $this->request->getPost('jurusan'),
                    'nis'            => $this->request->getPost('nis'),
                    'nisn'           => $this->request->getPost('nisn'),
                    'no_peserta'     => $this->request->getPost('no_peserta'),
                    'kelas'          => $this->request->getPost('kelas'),
                    'abs'            => $this->request->getPost('abs'),
                    'nama_lengkap'   => $this->request->getPost('nama_lengkap'),
                    'nama_panggilan' => $this->request->getPost('nama_panggilan'),
                    'jenis_kelamin'  => $this->request->getPost('jenis_kelamin'),
                    'tempat_lahir'   => $this->request->getPost('tempat_lahir'),
                    'tanggal_lahir'  => date('Y-m-d', strtotime($this->request->getPost('tanggal_lahir'))),
                    'nama_wali'      => $this->request->getPost('nama_wali'),
                    'nama_ibu'       => $this->request->getPost('nama_ibu'),
                    'nama_ayah'      => $this->request->getPost('nama_ayah'),
                    'status_siswa'   => $this->request->getPost('status_siswa'),
                    'telepon'        => $this->request->getPost('telepon'),
                    'email'          => $this->request->getPost('email'),
                    'alamat'         => $this->request->getPost('alamat'),
                    'keterangan'     => $this->request->getPost('keterangan'),
                    'gambar'         => $namabaru,
                    // 'tanggal_post'	=> date('Y-m-d H:i:s')
                ];
                $m_siswa->edit($data);
                // masuk database
                $this->session->setFlashdata('sukses', 'Data telah disimpan');

                return redirect()->to(base_url('admin/siswa'));
            }
            // masuk database
            $data = ['id_siswa'  => $id_siswa,
                'id_user'        => $this->session->get('id_user'),
                'jurusan'        => $this->request->getPost('jurusan'),
                'nis'            => $this->request->getPost('nis'),
                'nisn'           => $this->request->getPost('nisn'),
                'no_peserta'     => $this->request->getPost('no_peserta'),
                'kelas'          => $this->request->getPost('kelas'),
                'abs'            => $this->request->getPost('abs'),
                'nama_lengkap'   => $this->request->getPost('nama_lengkap'),
                'nama_panggilan' => $this->request->getPost('nama_panggilan'),
                'jenis_kelamin'  => $this->request->getPost('jenis_kelamin'),
                'tempat_lahir'   => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir'  => date('Y-m-d', strtotime($this->request->getPost('tanggal_lahir'))),
                'nama_wali'      => $this->request->getPost('nama_wali'),
                'nama_ibu'       => $this->request->getPost('nama_ibu'),
                'nama_ayah'      => $this->request->getPost('nama_ayah'),
                'status_siswa'   => $this->request->getPost('status_siswa'),
                'telepon'        => $this->request->getPost('telepon'),
                'email'          => $this->request->getPost('email'),
                'alamat'         => $this->request->getPost('alamat'),
                'keterangan'     => $this->request->getPost('keterangan'),
                // 'gambar'		=> $namabaru,
            ];
            $m_siswa->edit($data);
            // masuk database
            $this->session->setFlashdata('sukses', 'Data telah disimpan');

            return redirect()->to(base_url('admin/siswa'));
        }
        $data = ['title' => 'Edit Data Siswa: ' . $siswa['nama_lengkap'],
            'siswa'      => $siswa,
            'content'    => 'admin/siswa/edit',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // Password
    public function password($id_siswa)
    {
        checklogin();
        $m_siswa = new Siswa_model();
        $siswa   = $m_siswa->detail($id_siswa);
        // Redirect
        if (isset($_POST['password']) && $_POST['password'] !== $_POST['konfirmasi_password']) {
            $this->session->setFlashdata('warning', 'Oops, Password Salah... Data password dan Konfirmasi Password ' . $siswa['nama_lengkap'] . '(NISN: ' . $siswa['nisn'] . ') tidak sama. Silakan ketik kembali dengan password yang benar.');

            return redirect()->to(base_url('admin/siswa/password/' . $id_siswa));
        }
        // end redirect
        // Start validasi
        if ($this->request->getMethod() === 'post' && $this->validate(
            [
                'password' => 'required|min_length[6]|max_length[32]',
            ]
        )) {
            // masuk database
            $data = ['id_siswa' => $id_siswa,
                'id_user'       => $this->session->get('id_user'),
                'password'      => sha1($this->request->getPost('password')),
                'password_hint' => $this->request->getPost('password'),
            ];
            $m_siswa->edit($data);
            // masuk database
            $this->session->setFlashdata('sukses', 'Data password ' . $siswa['nama_lengkap'] . '(NISN: ' . $siswa['nisn'] . ') telah disimpan');

            return redirect()->to(base_url('admin/siswa/password/' . $id_siswa));
        }
        $data = ['title' => 'Update Password Siswa: ' . $siswa['nama_lengkap'],
            'siswa'      => $siswa,
            'content'    => 'admin/siswa/password',
        ];
        echo view('admin/layout/wrapper', $data);
    }

    // delete
    public function delete($id_siswa)
    {
        checklogin();
        $m_siswa = new Siswa_model();
        $data    = ['id_siswa' => $id_siswa];
        $m_siswa->delete($data);
        // masuk database
        $this->session->setFlashdata('sukses', 'Data telah dihapus');

        return redirect()->to(base_url('admin/siswa'));
    }
}
