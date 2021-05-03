<main id="main">

  <!-- ======= Breadcrumbs Section ======= -->
  <section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2><?php echo $title ?></h2>
        <ol>
          <li><a href="<?php echo base_url() ?>">Home</a></li>
          <li><?php echo $title ?></li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs Section -->

  <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2><?php echo $title ?></h2>

        </div>

      </div>

     

      <div class="container">

        <div class="row mt-5">

          <div class="col-lg-6">

            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <i class="bx bx-map"></i>
                  <h3>Alamat Kami:</h3>
                  <p><?php echo nl2br($konfigurasi['alamat']) ?></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-envelope"></i>
                  <h3>Email Kami:</h3>
                  <p><?php echo nl2br($konfigurasi['email']) ?></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-phone-call"></i>
                  <h3>Telepon Kami:</h3>
                  <p><?php echo nl2br($konfigurasi['telepon']) ?></p>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6">
            <style type="text/css" media="screen">
              iframe {
                width: 100%;
                min-height: 400px;
              }
            </style>
            <?php echo $konfigurasi['google_map'] ?>
          </div>

        </div>
      </div>
       
    </section><!-- End Contact Section -->

</main><!-- End #main -->