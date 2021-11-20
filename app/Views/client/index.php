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

  <!-- ======= Doctors Section ======= -->
    <section id="doctors" class="doctors section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2><?= $title ?></h2>

        </div>

        <div class="row">

          <?php foreach ($client as $client) { ?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img">
                <img src="<?= base_url('assets/upload/client/' . $client['gambar']) ?>" class="img-fluid" alt="">
              </div>
              <div class="member-info">
                <h4><?= $client['nama'] ?></h4>
                <span><?= $client['jenis_client'] ?></span>
              </div>
            </div>
          </div>
          <?php } ?>


        </div>

      </div>
    </section><!-- End Doctors Section -->


</main><!-- End #main -->