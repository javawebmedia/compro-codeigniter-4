<?php

namespace App\Models;

use CodeIgniter\Model;

class Dasbor_model extends Model
{
    // berita
    public function berita()
    {
        $builder = $this->db->table('berita');
        $query   = $builder->get();

        return $query->getNumRows();
    }

    // user
    public function user()
    {
        $builder = $this->db->table('users');
        $query   = $builder->get();

        return $query->getNumRows();
    }

    // client
    public function client()
    {
        $builder = $this->db->table('client');
        $query   = $builder->get();

        return $query->getNumRows();
    }

    // galeri
    public function galeri()
    {
        $builder = $this->db->table('galeri');
        $query   = $builder->get();

        return $query->getNumRows();
    }

    // video
    public function video()
    {
        $builder = $this->db->table('video');
        $query   = $builder->get();

        return $query->getNumRows();
    }

    // download
    public function download()
    {
        $builder = $this->db->table('download');
        $query   = $builder->get();

        return $query->getNumRows();
    }

    // staff
    public function staff()
    {
        $builder = $this->db->table('staff');
        $query   = $builder->get();

        return $query->getNumRows();
    }

    // kategori_download
    public function kategori_download()
    {
        $builder = $this->db->table('kategori_download');
        $query   = $builder->get();

        return $query->getNumRows();
    }

    // kategori
    public function kategori()
    {
        $builder = $this->db->table('kategori');
        $query   = $builder->get();

        return $query->getNumRows();
    }

    // kategori_staff
    public function kategori_staff()
    {
        $builder = $this->db->table('kategori_staff');
        $query   = $builder->get();

        return $query->getNumRows();
    }
}
