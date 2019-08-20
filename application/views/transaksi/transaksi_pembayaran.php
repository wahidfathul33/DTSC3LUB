<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>"/>
    </head>
    <body>
        <h3 style="margin-top:0px">Silakan Transfer ke rekening 123123123 (BNI) a.n Pesan Tiket</h3><hr>
        
        <h3 style="margin-top:0px">Upload bukti pembayaran</h3><hr>
        <form action="<?php echo base_url('transaksi/action_pembayaran'); ?>" method="post" enctype='multipart/form-data'>
            <div class="form-group">
                <label for="text">Upload<?php //echo $error;?></label>
                <input type="file" class="form-control" name="gambar" id="gambar" placeholder="" value="<?php //echo $nik; ?>" />
            </div>
            <input type="submit" class="btn btn-primary" value="Lanjut">
        </form>


    </body>
</html>