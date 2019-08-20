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
        <li class="breadcrumb-item active">Form Transaksi</li>
        </ol>
        <h2 style="margin-top:0px">Form Transaksi</h2>
        <hr>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Id Tiket <?php echo form_error('id_tiket') ?></label>
            <input type="text" class="form-control" name="id_tiket" id="id_tiket" placeholder="Id Tiket" value="<?php echo $id_tiket; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Jumlah <?php echo form_error('jumlah') ?></label>
            <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah" value="<?php echo $jumlah; ?>" />
        </div>
	    <input type="hidden" name="id_memesan" value="<?php echo $id_memesan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/memesan') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>