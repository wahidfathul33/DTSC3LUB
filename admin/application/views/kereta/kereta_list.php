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
            <li class="breadcrumb-item active">Kereta</li>
        </ol>
        <h2 style="margin-top:0px">Kereta List</h2>
        <hr>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('admin/kereta/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('admin/kereta/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php
                            if ($q <> '')
                            {
                            ?>
                            <a href="<?php echo site_url('admin/kereta'); ?>" class="btn btn-default">Reset</a>
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
                <th>ID Kereta</th>
                <th>Nama Kereta</th>
                <th>Kelas</th>
                <th>Action</th>
            </tr><?php
            foreach ($kereta_data as $kereta)
            {
            ?>
            <tr>
                <td width="80px"><?php echo ++$start ?></td>
                <td><?php echo $kereta->id_kereta ?></td>
                <td><?php echo $kereta->nama_kereta ?></td>
                <td><?php echo $kereta->kelas ?></td>
                <td style="text-align:center" width="200px">
                    <?php
                    echo anchor(site_url('admin/kereta/read/'.$kereta->id_kereta),'Read');
                    echo ' | ';
                    echo anchor(site_url('admin/kereta/update/'.$kereta->id_kereta),'Update');
                    echo ' | ';
                    echo anchor(site_url('admin/kereta/delete/'.$kereta->id_kereta),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
                    ?>
                </td>
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