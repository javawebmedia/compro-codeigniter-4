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

  <!-- ======= Doctors Section ======= -->
    <section id="doctors" class="doctors section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2><?php echo $title ?></h2>
         
        </div>

        <div class="row">

          <?php foreach($staff as $staff) { ?>
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img">
                <img src="<?php echo base_url('assets/upload/image/'.$staff['gambar']) ?>" class="img-fluid" alt="">
              </div>
              <div class="member-info">
                <h4><?php echo $staff['nama'] ?></h4>
                <span><?php echo $staff['jabatan'] ?></span>
              </div>
            </div>
          </div>
          <?php } ?>
          

        </div>

      </div>
    </section><!-- End Doctors Section -->


</main><!-- End #main -->