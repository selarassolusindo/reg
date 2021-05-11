<!-- <!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php //echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">T30_pendaftaran List</h2> -->
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('t30_pendaftaran/create'),'Tambah', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('t30_pendaftaran'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('t30_pendaftaran'); ?>" class="btn btn-secondary">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Cari</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th class="text-right">NO.</th>
				<th>SEKOLAH</th>
				<th>TGL. PENDAFTARAN</th>
				<th>NAMA CALON SISWA</th>
				<th class="text-center">PROSES</th>
            </tr>
			<?php foreach ($t30_pendaftaran_data as $t30_pendaftaran) { ?>
            <tr>
				<td width="80px" class="text-right"><?php echo ++$start ?></td>
				<td><?php echo $t30_pendaftaran->idsekolah ?></td>
				<td><?php echo $t30_pendaftaran->TglPendaftaran ?></td>
				<td><?php echo $t30_pendaftaran->idcalonsiswa ?></td>
				<td style="text-align:center" width="200px">
				<?php
				//echo anchor(site_url('t30_pendaftaran/read/'.$t30_pendaftaran->idpendaftaran),'Read');
				//echo ' | ';
				echo anchor(site_url('t30_pendaftaran/update/'.$t30_pendaftaran->idpendaftaran),'Ubah');
				echo ' | ';
				echo anchor(site_url('t30_pendaftaran/delete/'.$t30_pendaftaran->idpendaftaran),'Hapus','onclick="javascript: return confirm(\'Are You Sure ?\')"');
				?>
				</td>
			</tr>
            <?php } ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <!-- <a href="#" class="btn btn-primary">Total Data : <?php echo $total_rows ?></a>
				<?php echo anchor(site_url('t30_pendaftaran/excel'), 'Excel', 'class="btn btn-primary"'); ?>
				<?php echo anchor(site_url('t30_pendaftaran/word'), 'Word', 'class="btn btn-primary"'); ?> -->
			</div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    <!-- </body>
</html> -->
