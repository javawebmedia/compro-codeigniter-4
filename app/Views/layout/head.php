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
  <meta content="<?php echo $keywords ?>, <?php echo keywords() ?>" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url('assets/upload/image/'.$site['icon']) ?>" rel="icon">
  <link href="<?php echo base_url('assets/upload/image/'.$site['icon']) ?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url() ?>/assets/template/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>/assets/template/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>/assets/template/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>/assets/template/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>/assets/template/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>/assets/template/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>/assets/template/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>/assets/template/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url() ?>/assets/template/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Medicio - v4.1.0
  * Template URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  
   <!-- jQuery -->
<script src="<?php echo base_url() ?>/assets/admin/plugins/jquery/jquery.min.js"></script>
<?php echo metatext(); ?>
  <style type="text/css" media="screen">
    .table {
      border: solid thin #EEE;
      border-collapse: collapse;
    }
    .table td, .table th {
      border: solid thin #EEE;
    }
    .breadcrumbs {
      padding-top: 40px;
    }
  </style>
</head>

<body>