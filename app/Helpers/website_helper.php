<?php

use App\Models\Konfigurasi_model;
use App\Models\User_model;

// namaweb
function namaweb()
{
    $m_konfigurasi = new Konfigurasi_model();
    $konfigurasi   = $m_konfigurasi->listing();

    return $konfigurasi['namaweb'];
}

// title
function title()
{
    $m_konfigurasi = new Konfigurasi_model();
    $konfigurasi   = $m_konfigurasi->listing();

    return $konfigurasi['namaweb'] . ' | ' . $konfigurasi->tagline;
}

// tagline
function tagline()
{
    $m_konfigurasi = new Konfigurasi_model();
    $konfigurasi   = $m_konfigurasi->listing();

    return $konfigurasi['tagline'];
}

// logo
function logo()
{
    $m_konfigurasi = new Konfigurasi_model();
    $konfigurasi   = $m_konfigurasi->listing();

    return base_url('assets/upload/image/' . $konfigurasi['logo']);
}

// icon
function icon()
{
    $m_konfigurasi = new Konfigurasi_model();
    $konfigurasi   = $m_konfigurasi->listing();

    return base_url('assets/upload/image/' . $konfigurasi['icon']);
}

// metatext
function metatext()
{
    $m_konfigurasi = new Konfigurasi_model();
    $konfigurasi   = $m_konfigurasi->listing();

    return $konfigurasi['metatext'];
}

// keywords
function keywords()
{
    $m_konfigurasi = new Konfigurasi_model();
    $konfigurasi   = $m_konfigurasi->listing();

    return $konfigurasi['keywords'];
}

// telepon
function telepon()
{
    $m_konfigurasi = new Konfigurasi_model();
    $konfigurasi   = $m_konfigurasi->listing();

    return $konfigurasi['telepon'];
}

// google_map
function google_map()
{
    $m_konfigurasi = new Konfigurasi_model();
    $konfigurasi   = $m_konfigurasi->listing();

    return $konfigurasi['google_map'];
}

// hp
function hp()
{
    $m_konfigurasi = new Konfigurasi_model();
    $konfigurasi   = $m_konfigurasi->listing();

    return $konfigurasi['hp'];
}

// cheklogin
function checklogin()
{
    helper('url');
    $m_user  = new User_model();
    $session = \Config\Services::session();
    if ($session->get('username') === '' || $session->get('username') === null) {
        echo '<script>';
        echo 'window.location.href = "' . base_url('login') . '?login=belum";';
        echo '</script>';
    } else {
        //whether ip is from share internet
        if (! empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip_address = $_SERVER['HTTP_CLIENT_IP'];
        }
        //whether ip is from proxy
        elseif (! empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        //whether ip is from remote address
        else {
            $ip_address = $_SERVER['REMOTE_ADDR'];
        }

        $data = ['id_user' => $session->get('id_user'),
            'ip_address'   => $ip_address,
            'username'     => $session->get('username'),
            'url'          => base_url(uri_string()),
        ];

        $m_user->user_log($data);
    }
}

// checksiswa
function checksiswa()
{
    helper('url');
    $session = \Config\Services::session();
    if ($session->get('username_siswa') === '' || $session->get('username_siswa') === null) {
        echo '<script>';
        echo 'window.location.href = "' . base_url('signin') . '?login=belum";';
        echo '</script>';
    }
}

// tanggal_bulan
     function tanggal_id($tanggal)
     {
         if ($tanggal === '' || $tanggal === null || $tanggal === '0000-00-00' || $tanggal === '1970-01-01') {
             return false;
         }

         return date('d-m-Y', strtotime($tanggal));
     }

    // Tanggal input
     function tanggal_input($tanggal)
     {
         if ($tanggal === '' || $tanggal === null || $tanggal === '0000-00-00' || $tanggal === '1970-01-01') {
             return false;
         }

         return date('Y-m-d', strtotime($tanggal));
     }

    // Romawi
     function romawi($bulan)
     {
         if ($bulan === '01') {
             $romawi = 'I';
         } elseif ($bulan === '02') {
             $romawi = 'II';
         } elseif ($bulan === '03') {
             $romawi = 'III';
         } elseif ($bulan === '04') {
             $romawi = 'IV';
         } elseif ($bulan === '05') {
             $romawi = 'V';
         } elseif ($bulan === '06') {
             $romawi = 'VI';
         } elseif ($bulan === '07') {
             $romawi = 'VII';
         } elseif ($bulan === '08') {
             $romawi = 'VIII';
         } elseif ($bulan === '09') {
             $romawi = 'IX';
         } elseif ($bulan === '10') {
             $romawi = 'X';
         } elseif ($bulan === '11') {
             $romawi = 'XI';
         } elseif ($bulan === '12') {
             $romawi = 'XII';
         }

         return $romawi;
     }

    // Romawi
     function bulan($bulan)
     {
         if ($bulan === '01') {
             $nama_bulan = 'Januari';
         } elseif ($bulan === '02') {
             $nama_bulan = 'Februari';
         } elseif ($bulan === '03') {
             $nama_bulan = 'Maret';
         } elseif ($bulan === '04') {
             $nama_bulan = 'April';
         } elseif ($bulan === '05') {
             $nama_bulan = 'Mei';
         } elseif ($bulan === '06') {
             $nama_bulan = 'Juni';
         } elseif ($bulan === '07') {
             $nama_bulan = 'Juli';
         } elseif ($bulan === '08') {
             $nama_bulan = 'Agustus';
         } elseif ($bulan === '09') {
             $nama_bulan = 'September';
         } elseif ($bulan === '10') {
             $nama_bulan = 'Oktober';
         } elseif ($bulan === '11') {
             $nama_bulan = 'November';
         } elseif ($bulan === '12') {
             $nama_bulan = 'Desember';
         }

         return $nama_bulan;
     }

    // Romawi
     function bulan_pendek($bulan)
     {
         if ($bulan === '01') {
             $nama_bulan_pendek = 'Jan';
         } elseif ($bulan === '02') {
             $nama_bulan_pendek = 'Feb';
         } elseif ($bulan === '03') {
             $nama_bulan_pendek = 'Mar';
         } elseif ($bulan === '04') {
             $nama_bulan_pendek = 'Apr';
         } elseif ($bulan === '05') {
             $nama_bulan_pendek = 'Mei';
         } elseif ($bulan === '06') {
             $nama_bulan_pendek = 'Jun';
         } elseif ($bulan === '07') {
             $nama_bulan_pendek = 'Jul';
         } elseif ($bulan === '08') {
             $nama_bulan_pendek = 'Agus';
         } elseif ($bulan === '09') {
             $nama_bulan_pendek = 'Sep';
         } elseif ($bulan === '10') {
             $nama_bulan_pendek = 'Okt';
         } elseif ($bulan === '11') {
             $nama_bulan_pendek = 'Nov';
         } elseif ($bulan === '12') {
             $nama_bulan_pendek = 'Des';
         }

         return $nama_bulan_pendek;
     }

    // Romawi
     function hari($tanggal)
     {
         $bulan = date('m', strtotime($tanggal));
         $hari  = date('l', strtotime($tanggal));

         if ($hari === 'Sunday') {
             $nama_hari = 'Minggu';
         } elseif ($hari === 'Monday') {
             $nama_hari = 'Senin';
         } elseif ($hari === 'Tuesday') {
             $nama_hari = 'Selasa';
         } elseif ($hari === 'Wednesday') {
             $nama_hari = 'Rabu';
         } elseif ($hari === 'Thursday') {
             $nama_hari = 'Kamis';
         } elseif ($hari === 'Friday') {
             $nama_hari = 'Jumat';
         } elseif ($hari === 'Saturday') {
             $nama_hari = 'Sabtu';
         }

         if ($bulan === '01') {
             $nama_bulan = 'Januari';
         } elseif ($bulan === '02') {
             $nama_bulan = 'Februari';
         } elseif ($bulan === '03') {
             $nama_bulan = 'Maret';
         } elseif ($bulan === '04') {
             $nama_bulan = 'April';
         } elseif ($bulan === '05') {
             $nama_bulan = 'Mei';
         } elseif ($bulan === '06') {
             $nama_bulan = 'Juni';
         } elseif ($bulan === '07') {
             $nama_bulan = 'Juli';
         } elseif ($bulan === '08') {
             $nama_bulan = 'Agustus';
         } elseif ($bulan === '09') {
             $nama_bulan = 'September';
         } elseif ($bulan === '10') {
             $nama_bulan = 'Oktober';
         } elseif ($bulan === '11') {
             $nama_bulan = 'November';
         } elseif ($bulan === '12') {
             $nama_bulan = 'Desember';
         }

         return $nama_hari . ', ' . date('d', strtotime($tanggal)) . ' ' . $nama_bulan . ' ' . date('Y', strtotime($tanggal));
     }

    // tanggal_bulan
    function tanggal_bulan($tanggal)
    {
        $bulan = date('m', strtotime($tanggal));
        $hari  = date('l', strtotime($tanggal));

        if ($hari === 'Sunday') {
            $nama_hari = 'Minggu';
        } elseif ($hari === 'Monday') {
            $nama_hari = 'Senin';
        } elseif ($hari === 'Tuesday') {
            $nama_hari = 'Selasa';
        } elseif ($hari === 'Wednesday') {
            $nama_hari = 'Rabu';
        } elseif ($hari === 'Thursday') {
            $nama_hari = 'Kamis';
        } elseif ($hari === 'Friday') {
            $nama_hari = 'Jumat';
        } elseif ($hari === 'Saturday') {
            $nama_hari = 'Sabtu';
        }

        if ($bulan === '01') {
            $nama_bulan = 'Januari';
        } elseif ($bulan === '02') {
            $nama_bulan = 'Februari';
        } elseif ($bulan === '03') {
            $nama_bulan = 'Maret';
        } elseif ($bulan === '04') {
            $nama_bulan = 'April';
        } elseif ($bulan === '05') {
            $nama_bulan = 'Mei';
        } elseif ($bulan === '06') {
            $nama_bulan = 'Juni';
        } elseif ($bulan === '07') {
            $nama_bulan = 'Juli';
        } elseif ($bulan === '08') {
            $nama_bulan = 'Agustus';
        } elseif ($bulan === '09') {
            $nama_bulan = 'September';
        } elseif ($bulan === '10') {
            $nama_bulan = 'Oktober';
        } elseif ($bulan === '11') {
            $nama_bulan = 'November';
        } elseif ($bulan === '12') {
            $nama_bulan = 'Desember';
        }

        return date('d', strtotime($tanggal)) . ' ' . $nama_bulan . ' ' . date('Y', strtotime($tanggal));
    }

    // tanggal_bulan
    function tanggal_bulan_menit($tanggal)
    {
        $bulan = date('m', strtotime($tanggal));
        $hari  = date('l', strtotime($tanggal));

        if ($hari === 'Sunday') {
            $nama_hari = 'Minggu';
        } elseif ($hari === 'Monday') {
            $nama_hari = 'Senin';
        } elseif ($hari === 'Tuesday') {
            $nama_hari = 'Selasa';
        } elseif ($hari === 'Wednesday') {
            $nama_hari = 'Rabu';
        } elseif ($hari === 'Thursday') {
            $nama_hari = 'Kamis';
        } elseif ($hari === 'Friday') {
            $nama_hari = 'Jumat';
        } elseif ($hari === 'Saturday') {
            $nama_hari = 'Sabtu';
        }

        if ($bulan === '01') {
            $nama_bulan = 'Januari';
        } elseif ($bulan === '02') {
            $nama_bulan = 'Februari';
        } elseif ($bulan === '03') {
            $nama_bulan = 'Maret';
        } elseif ($bulan === '04') {
            $nama_bulan = 'April';
        } elseif ($bulan === '05') {
            $nama_bulan = 'Mei';
        } elseif ($bulan === '06') {
            $nama_bulan = 'Juni';
        } elseif ($bulan === '07') {
            $nama_bulan = 'Juli';
        } elseif ($bulan === '08') {
            $nama_bulan = 'Agustus';
        } elseif ($bulan === '09') {
            $nama_bulan = 'September';
        } elseif ($bulan === '10') {
            $nama_bulan = 'Oktober';
        } elseif ($bulan === '11') {
            $nama_bulan = 'November';
        } elseif ($bulan === '12') {
            $nama_bulan = 'Desember';
        }

        return date('d', strtotime($tanggal)) . ' ' . $nama_bulan . ' ' . date('Y', strtotime($tanggal)) . ' jam ' . date('H:i:s', strtotime($tanggal));
    }

    // tanggal_bulan
    function tanggal_singkat($tanggal)
    {
        $bulan = date('m', strtotime($tanggal));
        $hari  = date('l', strtotime($tanggal));

        if ($hari === 'Sunday') {
            $nama_hari = 'Minggu';
        } elseif ($hari === 'Monday') {
            $nama_hari = 'Senin';
        } elseif ($hari === 'Tuesday') {
            $nama_hari = 'Selasa';
        } elseif ($hari === 'Wednesday') {
            $nama_hari = 'Rabu';
        } elseif ($hari === 'Thursday') {
            $nama_hari = 'Kamis';
        } elseif ($hari === 'Friday') {
            $nama_hari = 'Jumat';
        } elseif ($hari === 'Saturday') {
            $nama_hari = 'Sabtu';
        }

        if ($bulan === '01') {
            $nama_bulan = 'Jan';
        } elseif ($bulan === '02') {
            $nama_bulan = 'Feb';
        } elseif ($bulan === '03') {
            $nama_bulan = 'Mar';
        } elseif ($bulan === '04') {
            $nama_bulan = 'Apr';
        } elseif ($bulan === '05') {
            $nama_bulan = 'Mei';
        } elseif ($bulan === '06') {
            $nama_bulan = 'Jun';
        } elseif ($bulan === '07') {
            $nama_bulan = 'Jul';
        } elseif ($bulan === '08') {
            $nama_bulan = 'Agus';
        } elseif ($bulan === '09') {
            $nama_bulan = 'Sep';
        } elseif ($bulan === '10') {
            $nama_bulan = 'Okt';
        } elseif ($bulan === '11') {
            $nama_bulan = 'Nov';
        } elseif ($bulan === '12') {
            $nama_bulan = 'Des';
        }

        return date('d', strtotime($tanggal)) . ' ' . $nama_bulan . ' ' . date('Y', strtotime($tanggal));
    }

    // Nomor
     function angka($angka)
     {
         return number_format($angka, '0', ',', '.');
     }
