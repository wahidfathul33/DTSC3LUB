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
        <li class="breadcrumb-item active">Form Tiket</li>
        </ol>
        <h2 style="margin-top:0px">Form Tiket</h2>
        <hr>
        <form action="<?php echo $action; ?>" method="post">
        <div class="form-group">
            <label for="int">ID Tiket <?php echo form_error('id_tiket') ?></label>
            <input type="text" class="form-control" name="id_tiket" id="id_tiket" placeholder="ID Tiket" value="<?php echo $id_tiket; ?>" />
        </div>
        <div class="form-group">
            <label for="">Rute <?php echo form_error('id_rute') ?></label>
            <?php
                $dd_rute_attribute = 'class="form-control select2 "';
                echo form_dropdown('id_rute', $dd_rute, $rute_selected, $dd_rute_attribute);
            ?>
        </div>
        <div class="form-group">
            <label for="">Kereta <?php echo form_error('id_kereta') ?></label>
            <?php
                $dd_kereta_attribute = 'class="form-control select2 "';
                echo form_dropdown('id_kereta', $dd_kereta, $kereta_selected, $dd_kereta_attribute);
            ?>
        </div>
	    <div class="form-group">
            <label for="time">Jam <?php echo form_error('jam') ?></label>
            <input type="time" class="form-control" name="jam" id="jam" placeholder="Jam" value="<?php echo $jam; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tanggal <?php echo form_error('tanggal') ?></label>
            <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Stok <?php echo form_error('stok') ?></label>
            <input type="text" class="form-control" name="stok" id="stok" placeholder="Stok" value="<?php echo $stok; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Harga <?php echo form_error('harga') ?></label>
            <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?php echo $harga; ?>" />
        </div>
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/tiket') ?>" class="btn btn-default">Cancel</a>
	</form>
    <!--jquery dan select2-->
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/select2/js/select2.min.js') ?>"></script>
        <script>
            $(document).ready(function () {
                $(".select2").select2({
                    placeholder: "Please Select"
                });
            });
        </script>
    </body>
</html>