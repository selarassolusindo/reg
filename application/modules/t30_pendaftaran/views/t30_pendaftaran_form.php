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
        <h2 style="margin-top:0px">T30_pendaftaran <?php //echo $button ?></h2> -->
        <form action="<?php echo $action; ?>" method="post">
			<div class="form-group">
            	<label for="int">IDSEKOLAH <?php echo form_error('idsekolah') ?></label>
            	<input type="text" class="form-control" name="idsekolah" id="idsekolah" placeholder="IDSEKOLAH" value="<?php echo $idsekolah; ?>" />
        	</div>
			<div class="form-group">
            	<label for="date">TGLPENDAFTARAN <?php echo form_error('TglPendaftaran') ?></label>
            	<input type="text" class="form-control" name="TglPendaftaran" id="TglPendaftaran" placeholder="TGLPENDAFTARAN" value="<?php echo $TglPendaftaran; ?>" />
        	</div>
			<div class="form-group">
            	<label for="int">IDCALONSISWA <?php echo form_error('idcalonsiswa') ?></label>
            	<input type="text" class="form-control" name="idcalonsiswa" id="idcalonsiswa" placeholder="IDCALONSISWA" value="<?php echo $idcalonsiswa; ?>" />
        	</div>
			<input type="hidden" name="idpendaftaran" value="<?php echo $idpendaftaran; ?>" />
			<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
			<a href="<?php echo site_url('t30_pendaftaran') ?>" class="btn btn-secondary">Batal</a>
		</form>
    <!-- </body>
</html> -->
