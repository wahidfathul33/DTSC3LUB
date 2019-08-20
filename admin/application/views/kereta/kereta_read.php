<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>"/>
    </head>
    <body>
        <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo site_url('admin/kereta') ?>">Kereta</a>
        </li>
        <li class="breadcrumb-item active">Detail Kereta</li>
        </ol>
        <h2 style="margin-top:0px">Detail Kereta </h2>
    </br>
        <table class="table">
        <tr><td>ID Kereta</td><td><?php echo $id_kereta; ?></td></tr>
	    <tr><td>Nama Kereta</td><td><?php echo $nama_kereta; ?></td></tr>
	    <tr><td>Kelas</td><td><?php echo $kelas; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('admin/kereta') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>