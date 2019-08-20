<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>"/>
    </head>
    <body>
        <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo site_url('admin/tiket') ?>">Tiket</a>
        </li>
        <li class="breadcrumb-item active">Detail Tiket</li>
        </ol>
        <h2 style="margin-top:0px">Detail Tiket</h2>
        <hr>
        <table class="table">
        <tr><td>Id tiket</td><td><?php echo $id_tiket; ?></td></tr>
	    <tr><td>Rute</td><td><?php echo $asal_setasiun.' - '.$tujuan_setasiun; ?></td></tr>
	    <tr><td>Kereta</td><td><?php echo $nama_kereta.' ('.$kelas.')'; ?></td></tr>
	    <tr><td>Jam</td><td><?php echo $jam; ?></td></tr>
	    <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
	    <tr><td>Stok</td><td><?php echo $stok; ?></td></tr>
	    <tr><td>Harga</td><td><?php echo $harga; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('admin/tiket') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>