

<!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container">
      <div class="row mt-5">
        <div class="col-md-12 text-center">
          <h2>Berita Terbaru</h2>
          <hr>
        </div>
        <?php foreach($berita2 as $berita2) { ?>
         <div class="col-md-4">
           <div class="card" style="margin-bottom: 20px;">
            <img src="<?php echo base_url('assets/upload/image/'.$berita2['gambar']) ?>">
            <div class="card-body">
              <h3><?php echo $berita2['judul_berita'] ?></h3>
              <p class="card-text">
                <?php echo $berita2['ringkasan'] ?>
              </p>
              <hr>
              <p>
                <a href="<?php echo base_url('berita/read/'.$berita2['slug_berita']) ?>" class="btn btn-success">
                  <i class="fa fa-chevron-right"></i>  Baca...
                </a>
              </p>
            </div>
          </div>
         </div>
       <?php } ?>
      </div>
    </div>
  </section><!-- End Contact Section -->