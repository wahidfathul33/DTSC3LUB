<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>"/>
    </head>
    <body>
        <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo site_url('admin/pemesan') ?>">Pemesan</a>
        </li>
        <li class="breadcrumb-item active">Detail Pemesan</li>
        </ol>
        <h2 style="margin-top:0px">Detail Pemesan</h2>
        <hr>
        <table class="table">
	    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>NIK</td><td><?php echo $NIK; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('admin/pemesan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>