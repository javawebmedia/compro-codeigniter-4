<?php use App\Models\Konfigurasi_model;
use App\Models\Menu_model;

$konfigurasi  = new Konfigurasi_model();
$menu         = new Menu_model();
$site         = $konfigurasi->listing();
$menu_berita  = $menu->berita();
$menu_profil  = $menu->profil();
$menu_layanan = $menu->layanan();
?>
<!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
      <div class="align-items-center d-none d-md-flex">
        <i class="fa fa-home"></i> <?= tagline(); ?>
      </div>
      <div class="d-flex align-items-center">
        <i class="bi bi-phone"></i> <?= telepon() ?>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <a href="index.html" class="logo me-auto"><img src="<?= base_url('assets/upload/image/' . $site['logo']) ?>" alt="<?= $site['namaweb'] ?>"></a>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <h1 class="logo me-auto"><a href="index.html">Medicio</a></h1> -->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto " href="<?= base_url() ?>">Home</a></li>
          <li class="dropdown"><a href="#"><span>Profil</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <?php foreach ($menu_profil as $menu_profil) { ?>
              <li><a href="<?= base_url('berita/profil/' . $menu_profil['slug_berita']) ?>"><?= $menu_profil['judul_berita'] ?></a></li>
              <?php } ?>
              <li><a href="<?= base_url('staff') ?>">Our Team</a></li>
            </ul>
          </li>

          <li class="dropdown"><a href="<?= base_url('berita') ?>"><span>Berita</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <?php foreach ($menu_berita as $menu_berita) { ?>
              <li><a href="<?= base_url('berita/kategori/' . $menu_berita['slug_kategori']) ?>"><?= $menu_berita['nama_kategori'] ?></a></li>
              <?php } ?>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Layanan</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <?php foreach ($menu_layanan as $menu_layanan) { ?>
              <li><a href="<?= base_url('berita/layanan/' . $menu_layanan['slug_berita']) ?>"><?= $menu_layanan['judul_berita'] ?></a></li>
              <?php } ?>
            </ul>
          </li>

          <li class="dropdown"><a href="#"><span>Galeri &amp; Video</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="<?= base_url('galeri') ?>">Galeri Gambar</a></li>
              <li><a href="<?= base_url('video') ?>">Galeri Video</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="<?= base_url('download') ?>">Download</a></li>
          <li><a class="nav-link scrollto" href="<?= base_url('kontak') ?>">Kontak</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="<?= base_url('login') ?>" class="appointment-btn scrollto">
        Login <span class="d-none d-md-inline">Admin</span>
      </a>

    </div>
  </header><!-- End Header -->