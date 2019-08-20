﻿<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Login</title>
  <!-- Bootstrap core CSS-->
  <link href="<?php echo base_url();?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url();?>/assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url();?>/assets/css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form id="sign_in" method="POST" action="<?php echo site_url('admin/login');?>">
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label><?php echo form_error('id_tiket') ?>
            <input name="username" class="form-control" id="exampleInputEmail1" type="text"  placeholder="Enter username" required="required">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label><?php echo form_error('id_tiket') ?>
            <input name="password" class="form-control" id="exampleInputPassword1" type="password" placeholder="Password" required="required">
          </div>

          <input class="btn btn-primary btn-block" value="Login" type="submit">
        </form>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url();?>/assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url();?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url();?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
