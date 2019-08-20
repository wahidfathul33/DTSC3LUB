<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>"/>
    </head>
    <body>
        <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo site_url('admin/pemesan') ?>">Rute</a>
        </li>
        <li class="breadcrumb-item active">Detail Rute</li>
        </ol>
        <h2 style="margin-top:0px">Detail Rute</h2>
        <hr>
        <table class="table">
        <tr><td>Id rute</td><td><?php echo $id_rute; ?></td></tr>
	    <tr><td>Asal Setasiun</td><td><?php echo $asal_setasiun; ?></td></tr>
	    <tr><td>Tujuan Setasiun</td><td><?php echo $tujuan_setasiun; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('admin/rute') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>