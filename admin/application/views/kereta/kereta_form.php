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
            <li class="breadcrumb-item active">Form Kereta</li>
        </ol>
        <h2 style="margin-top:0px">Form Kereta</h2>
        <hr>
        <form action="<?php echo $action; ?>" method="post">
            <div class="form-group">
                <label for="varchar">ID Kereta <?php echo form_error('id_kereta') ?></label>
                <input type="text" class="form-control" name="id_kereta" id="id_kereta" placeholder="ID Kereta" value="<?php echo $id_kereta; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Nama Kereta <?php echo form_error('nama_kereta') ?></label>
                <input type="text" class="form-control" name="nama_kereta" id="nama_kereta" placeholder="Nama Kereta" value="<?php echo $nama_kereta; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Kelas <?php echo form_error('kelas') ?></label>
                <input type="text" class="form-control" name="kelas" id="kelas" placeholder="Kelas" value="<?php echo $kelas; ?>" />
            </div>
            <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
            <a href="<?php echo site_url('admin/kereta') ?>" class="btn btn-default">Cancel</a>
        </form>
    </body>
</html>