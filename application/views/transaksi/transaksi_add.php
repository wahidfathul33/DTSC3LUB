<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>"/>
    </head>
    <body>
        <!-- <?php //echo "<pre>";
        //print_r ($total_bayar);
        //echo "</pre>"; ?> -->
	<form action="<?php echo base_url('transaksi/actiontransaksi'); ?>" method="post">
		<input type="hidden" name="id_pemesan" value="<?php echo $id_pemesan; ?>" />
	     <div class="form-group">
            <label for="text">Nama Pemesan <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Pemesan" value="<?php echo $nama; ?>" required="required"/>
        </div>
	    <div class="form-group">
            <label for="text">Nomor KTP <?php echo form_error('nik') ?></label>
            <input type="text" class="form-control" name="nik" id="nik" placeholder="Nomor KTP" value="<?php echo $nik; ?>" required="required"/>
        </div>
	   <!--  <input type="hidden" name="id_tiket" value="<?php //echo $id_tiket; ?>" />  -->
	    <input type="hidden" name="status" value="Not Verified" /> 
        <input type="hidden" name="jumlah" value="1" />
        <input type="hidden" name="total_bayar" value="<?php echo $total_bayar;?>" />
		<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <?php echo anchor(site_url('transaksi/unset'),'Batal', 'class="btn btn-danger"'); ?>
	</form><br/><br/>
        </body>
</html>