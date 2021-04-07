<!DOCTYPE html>
<html>
<head>
	<title>Sipak Ucb</title>
	<link href="<?php echo base_url(); ?>assets_f/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?php echo base_url(); ?>assets_f/css/sb-admin-2.css" rel="stylesheet">

	<link href="<?php echo base_url(); ?>assets_f/css/bootstrap.min.css" rel="stylesheet">
	
	<link href="<?php echo base_url(); ?>assets_f/css/bootstrap-select.css" rel="stylesheet">
	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css"> -->
	<link href="<?php echo base_url(); ?>assets_f/css/custom.css" rel="stylesheet">
	
	<!-- /global stylesheets -->
<script src="<?php echo base_url(); ?>assets_f/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets_f/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<div class="container">
  <a class="navbar-brand" href="<?php echo base_url()?>">SIPAKUCB</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse " id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url()?>">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url().'index/info'?>">Informasi</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Tentang
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo base_url().'index/umum'?>">Umum</a>
          <a class="dropdown-item" href="<?php echo base_url().'index/struktur'?>">Struktur Organisasi</a>
          <a class="dropdown-item" href="<?php echo base_url().'index/layan'?>">Pelayanan Surat</a>
          <a class="dropdown-item" href="<?php echo base_url().'index/dev'?>">Pengembang</a>

       
      </li>
    <li class="nav-item">
        <a class=" btn btn-success" href="<?php echo base_url().'xlog'?>">Login</a>
      </li>
    </ul>
  </div>
  </div>
</nav>

<!-- carousel -->
