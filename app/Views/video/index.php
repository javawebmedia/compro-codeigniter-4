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
      <div class="row mt-5">
        <?php foreach($video as $video) { ?>
         <div class="col-md-6">
           <div class="card" style="margin-bottom: 20px;">
            
            <div class="card-body">
              <div class="embed-responsive embed-responsive-16by9">
                <iframe  class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $video['video'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="min-height: 300px;"></iframe>
              </div>
              <hr>
              <h3><?php echo $video['judul'] ?></h3>
              <p class="card-text">
                <?php echo $video['keterangan'] ?>
              </p>
             
            </div>
          </div>
         </div>
       <?php } ?>
      </div>
    </div>
  </section><!-- End Contact Section -->
</main><!-- End #main -->