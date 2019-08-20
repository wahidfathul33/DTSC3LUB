<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>"/>
    </head>
    <body>
        <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo site_url('admin/memesan') ?>">Transaksi</a>
        </li>
        <li class="breadcrumb-item active">Detail Transaksi</li>
        </ol>
        <h2 style="margin-top:0px">Detail Transaksi</h2>
        <hr>
        <table class="table">
	    <tr><td>Nama Pemesan</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>Id Tiket</td><td><?php echo $id_tiket; ?></td></tr>
	    <tr><td>Jumlah</td><td><?php echo $jumlah; ?></td></tr>
        <tr><td>Bukti Bayar</td>
            <?php 
                if ($gambar != NULL) {
                    echo "<td><img src="; echo base_url('/uploads/'.$gambar); echo" widht=25% height=25%></td>";
                }else{
                    echo "<td>belum upload</td>";
                }
            ?>
        </tr>
        <tr><td>Total Bayar</td><td><?php echo $total_bayar; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('admin/memesan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>