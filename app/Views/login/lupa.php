<?php 
use App\Models\Konfigurasi_model;
$konfigurasi  = new Konfigurasi_model;
$site         = $konfigurasi->listing();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $title ?></title>
  <meta content="<?php echo strip_tags($description) ?>" name="description">
  <meta content="<?php echo $keywords ?>" name="keywords">
  <!-- Favicons -->
  <link href="<?php echo base_url('assets/upload/image/'.$site['icon']) ?>" rel="icon">
  <link href="<?php echo base_url('assets/upload/image/'.$site['icon']) ?>" rel="apple-touch-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- jQuery -->
<script src="<?php echo base_url() ?>/assets/admin/plugins/jquery/jquery.min.js"></script>
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/admin/dist/css/adminlte.min.css">
<!-- SWEETALERT -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body class="hold-transition login-page" style="background-color: #2596be;">
<div class="login-box" style="min-width: 35% !important; ">
  
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body" style="border-radius: 10px;">

      <div class="login-logo">
        <div class="row">
          <div class="col-md-3">
            <img src="<?php echo base_url('assets/upload/image/'.$site['icon']) ?>" class="img img-fluid">
          </div>
          <div class="col-md-9 text-left">
            <h1><?php echo $site['namaweb'] ?></h1>
            <h2><?php echo $site['tagline'] ?></h2>
          </div>
        </div>
      </div>
      <hr>
      <div class="alert alert-warning text-center">
        <h4>Oops... Mohon maaf</h4>
        <hr>
        <p>Halaman ini hanya tersedia untuk versi Premium. <br>Silakan Hubungi Java Web Media <a href="https://javawebmedia.com">www.javawebmedia.com</a></p>
      </div>
      <hr>
      <p class="mb-1 text-center">
        <a href="<?php echo base_url('login') ?>">Login</a> | <a href="<?php echo base_url() ?>" class="text-center">Home</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<script>
<?php if($session->getFlashdata('sukses')) { ?>
// Notifikasi
swal ( "Berhasil" ,  "<?php echo $session->getFlashdata('sukses'); ?>" ,  "success" )
<?php } ?>

<?php if(isset($_GET['logout'])) { ?>
// Notifikasi
swal ( "Berhasil" ,  "Anda berhasil logout." ,  "success" )
<?php } ?>

<?php if(isset($_GET['login'])) { ?>
// Notifikasi
swal ( "Oops..." ,  "Anda belum login." ,  "warning" )
<?php } ?>

<?php if($session->getFlashdata('warning')) { ?>
// Notifikasi
swal ( "Mohon maaf" ,  "<?php echo $session->getFlashdata('warning'); ?>" ,  "warning" )
<?php } ?>

</script>


<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>/assets/admin/dist/js/adminlte.min.js"></script>

</body>
</html>
