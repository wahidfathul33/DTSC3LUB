<div class="row">
    <?php
        
        $total_bayar=0;

        for ($i=0; $i < count($id_tiket); $i++) 
        {
            //$total_harga[$i]=$jumlah[$i]*$harga[$i];
            $total_bayar=$total_bayar+$harga[$i];
            echo '<div class="col-sm-6">
                <br><h3>Tiket';?> <?php echo $i+1;?><?php echo '</h3><br>
                <table class="table">
            	    <tr><td>Rute</td><td>'. $asal_setasiun[$i].' - '.$tujuan_setasiun[$i].'</td></tr>
            	    <tr><td>Kereta</td><td>'.$nama_kereta[$i].' ('.$kelas[$i].')'. '</td></tr>
            	    <tr><td>Jam</td><td>'.$jam[$i]. '</td></tr>
            	    <tr><td>Tanggal</td><td>'. $tanggal[$i].'</td></tr>
            	    <tr><td>Harga</td><td>'.'Rp '.$harga[$i]. '</td></tr>
        	   </table>
            </div>';
        }
    ?>
    <table class="table">
        <tr><td><h5>Total Harga :  Rp <?php echo $total_bayar; ?></h5></td></tr>
        <tr><td></td></tr>
    </table>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#pesan-modal">Lanjut</button><p>&nbsp</p>
    <?php echo anchor(site_url('transaksi/unset'),'Batal', 'class="btn btn-danger"'); ?>
</div>

<div class="modal fade" id="pesan-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Lanjut / Pesan Lagi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Pilih lanjut membayar atau masih pengen mesen lagi hayo ?</p>
                <form action="<?php echo base_url('transaksi/addtransaksi'); ?>" method="post">
                    <input type="hidden" name="total_bayar" value="<?php echo $total_bayar;?>" />
                    <!-- <input type="hidden" name="total_harga" value="<?php //echo $total_harga;?>" /> -->
                
            </div>
            <div class="modal-footer">
                <button type="submit" name="submit" value="submit" id="submitForm" class="btn btn-success">Lanjut</button> </form>
                <?php //echo anchor(site_url('transaksi/addtransaksi/'),'Lanjut', 'class="btn btn-success"'); ?>
                <?php echo anchor(site_url('transaksi/'),'Pesan Lagi', 'class="btn btn-primary"'); ?>
            </div>
        </div>
    </div>
</div>