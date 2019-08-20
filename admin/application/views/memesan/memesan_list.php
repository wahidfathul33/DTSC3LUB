<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>"/>
    </head>
    <body>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?php echo site_url('admin') ?>">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Transaksi</li>
        </ol>
        <h2 style="margin-top:0px">Transaksi List</h2>
        <hr>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('admin/memesan/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('admin/memesan'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Pemesan</th>
		<th>Id Tiket</th>
		<th>Jumlah</th>
        <th>Total Bayar</th>
        <th>Bukti Bayar</th>
        <th>Status</th>
		<th>Action</th>
        <th></th>
            </tr><?php
            foreach ($memesan_data as $memesan)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
            <td><?php 
                echo anchor(site_url('admin/pemesan/read/'.$memesan->id_pemesan),$memesan->nama); 
            ?></td>
            <td><?php 
                echo anchor(site_url('admin/tiket/read/'.$memesan->id_tiket),$memesan->id_tiket); 
            ?></td>
            <td><?php echo $memesan->jumlah ?></td>
            <td>Rp <?php echo $memesan->total_bayar ?></td>
            <?php 
                if ($memesan->gambar != NULL) {
                    echo "<td><img src="; echo base_url('/uploads/'.$memesan->gambar); echo" widht=15% height=15%></td>";
                }else{
                    echo "<td>belum upload</td>";
                }
            ?>
            <td><?php echo $memesan->status ?></td>  
			<td style="text-align:center" >
				<?php 
				echo anchor(site_url('admin/memesan/read/'.$memesan->id_memesan),'Read'); 
				echo ' | '; 
				echo anchor(site_url('admin/memesan/delete/'.$memesan->id_memesan),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
            <td style="text-align:center"><?php echo anchor(site_url('admin/memesan/verifikasi/'.$memesan->id_memesan),'Verifikasi');?></td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>