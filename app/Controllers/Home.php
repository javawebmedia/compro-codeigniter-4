<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Konfigurasi_model;
use App\Models\Galeri_model;
use App\Models\Client_model;

class Home extends BaseController
{

	// Homepage
	public function index()
	{
		$m_konfigurasi 	= new Konfigurasi_model();
		$m_galeri		= new Galeri_model();
		$m_client		= new Client_model();
		$konfigurasi 	= $m_konfigurasi->listing();
		$slider 		= $m_galeri->slider();
		$client 		= $m_client->testimoni();
		
		$data = [	'title'			=> $konfigurasi['namaweb'].' | '.$konfigurasi['tagline'],
					'description'	=> $konfigurasi['namaweb'].', '.$konfigurasi['tentang'],
					'keywords'		=> $konfigurasi['namaweb'].', '.$konfigurasi['keywords'],
					'slider'		=> $slider,
					'konfigurasi'	=> $konfigurasi,
					'client'		=> $client,
					'content'		=> 'home/index'
				];
		echo view('layout/wrapper',$data);
	}
}