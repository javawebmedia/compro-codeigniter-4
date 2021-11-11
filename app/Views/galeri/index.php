<main id="main">
  <!-- ======= Breadcrumbs Section ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <h2><?= $title ?></h2>
        <ol>
          <li><a href="<?= base_url() ?>">Home</a></li>
          <li><?= $title ?></li>
        </ol>
      </div>
    </div>
  </section><!-- End Breadcrumbs Section -->

 <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2><?= $title ?></h2>
          <p><?= $konfigurasi['tentang'] ?></p>
        </div>

        <div class="gallery-slider swiper-container">
          <div class="swiper-wrapper align-items-center">
            <?php foreach ($galeri as $galeri) { ?>
            <div class="swiper-slide">
              <a class="gallery-lightbox" href="<?= base_url('assets/upload/image/' . $galeri['gambar']) ?>">
                <img src="<?= base_url('assets/upload/image/' . $galeri['gambar']) ?>" class="img-fluid" alt="<?= $galeri['judul_galeri'] ?>">
              </a>
            </div>
           <?php } ?>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Gallery Section -->