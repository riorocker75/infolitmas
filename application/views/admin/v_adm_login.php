<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets_f/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets_f/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets_f/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a  class="h1"><b>Admin</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Anda harus login terlebih dahulu</p>

      <form action="<?php echo base_url().'log_admin/cek_login'?>" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="NIDN">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-barcode"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
       
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-success btn-block">Masuk</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    <br>

      <p class="mb-1">
        <a href="forgot-password.html">Lupa Password</a>
      </p>
     
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets_f/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>assets_f/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets_f/js/adminlte.min.js"></script>
</body>
</html>
