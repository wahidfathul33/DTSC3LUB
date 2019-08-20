<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>"/>
    </head>
    <body>
        <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo site_url('admin/rute') ?>">Rute</a>
        </li>
        <li class="breadcrumb-item active">Form Rute</li>
        </ol>
        <h2 style="margin-top:0px">Form Rute</h2>
        <hr>
        <form action="<?php echo $action; ?>" method="post">
        <div class="form-group">
            <label for="varchar">ID Rute <?php echo form_error('id_rute') ?></label>
            <input type="text" class="form-control" name="id_rute" id="id_rute" placeholder="ID Rute " value="<?php echo $id_rute; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Asal Setasiun <?php echo form_error('asal_setasiun') ?></label>
            <input type="text" class="form-control" name="asal_setasiun" id="asal_setasiun" placeholder="Asal Setasiun" value="<?php echo $asal_setasiun; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tujuan Setasiun <?php echo form_error('tujuan_setasiun') ?></label>
            <input type="text" class="form-control" name="tujuan_setasiun" id="tujuan_setasiun" placeholder="Tujuan Setasiun" value="<?php echo $tujuan_setasiun; ?>" />
        </div>
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/rute') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>