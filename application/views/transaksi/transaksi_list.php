<!doctype html>
<html>
		<head>
				<title>harviacode.com - codeigniter crud generator</title>
				<link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>"/>
		</head>
		<body>
				<div class="row" style="margin-bottom: 10px">
						
						<div class="col-md-4 text-center">
								<div style="margin-top: 8px" id="message">
										<?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
								</div>
						</div>
						<div class="col-md-1 text-right">
						</div>
						
				</div>
				<table class="table table-bordered table-striped" style="margin-bottom: 10px">
						<tr>
								<th>No</th>
								<th>Rute</th>
								<th>Kereta</th>
								<th>Jam</th>
								<th>Tanggal</th>
								<th>Harga</th>
								<th></th>
						</tr><?php
						$id_tiket = $this->session->id_tiket;
						foreach ($results as $tiket)
						{
								?>
								<tr>
						<td width="80px"><?php $i='1'; echo $i++ ?></td>
						<td><?php echo $tiket->asal_setasiun.' - '.$tiket->tujuan_setasiun ?></td>
						<td><?php echo $tiket->nama_kereta.' ('.$tiket->kelas.')' ?></td>
						<td><?php echo $tiket->jam ?></td>
						<td><?php echo $tiket->tanggal ?></td>
						<!--<td><?php //echo $tiket->stok ?></td>-->
						<td><?php echo 'Rp '.$tiket->harga ?></td>
						<td style="text-align:center;" width="200px">
								<?php
								$jml= $tiket->stok;
								if ($jml>0) {
										echo anchor(site_url('transaksi/save_temp/'.$tiket->id_tiket),'Pesan', 'class="btn btn-success"');
								?>
									<!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#pesan-modal">Lanjut</button> -->
								<?php  
								
								}else{
										echo '<p>habis</p>';
								}
								
								?>
						</td>
				</tr>
								<?php
						}
						?>
				</table>

<!-- <div class="modal fade" id="pesan-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Jumlah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Masukkan jumlah pesanan</p>
                <form action="<?php //echo base_url('transaksi/save_temp'); ?>" method="post">
                    <input type="text" class="form-control" name="jumlah" value="" />
            </div>
            <div class="modal-footer">
                <button type="submit" name="submit" value="submit" id="submitForm" class="btn btn-success">Lanjut</button> </form>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> -->
<!-- <?php //echo "<pre>";
//print_r ($this->session->all_userdata());
//echo "</pre>"; ?>

 -->