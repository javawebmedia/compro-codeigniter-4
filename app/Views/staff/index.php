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



          <div class="card">
            <div class="card-header">
              <h2><?php echo $title ?></h2>
            </div>
            <div class="card-body">
                      <div class="row justify-content-center">
            
          <?php 
          foreach($kategori as $kategori) { 
            $id_kategori_staff = $kategori['id_kategori_staff'];
            $staff= $m_staff->kategori_staff($id_kategori_staff); 

            if($staff) { 
            ?>
            <h3 class="text-center"><?php echo $kategori['nama_kategori_staff'] ?></h3>
            <hr>
            <br>
            <?php  
              foreach($staff as $staff) { ?>
                <div class="col-lg-3 col-md-6">
                  <div class="member" data-aos="fade-up" data-aos-delay="100">
                    <div class="member-img">
                      <?php if($staff['gambar']=="") {  ?>
                        <img src="<?php echo icon() ?>" class="img-fluid" alt="<?php echo $staff['nama'] ?>">
                      <?php }else{ ?>
                        <img src="<?php echo base_url('assets/upload/staff/'.$staff['gambar']) ?>" class="img-fluid" alt="<?php echo $staff['nama'] ?>">
                      <?php } ?>
                    </div>
                    <div class="member-info">
                      <h4><?php echo $staff['nama'] ?></h4>
                      <span><?php echo $staff['jabatan'] ?></span>
                    </div>
                  </div>
                </div>
                <?php
              }
            }
          }
          ?>
          
          </div>
          </div>
        </div>

      </div>
    </section><!-- End Doctors Section -->


</main><!-- End #main -->