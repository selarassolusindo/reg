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
        <h2 style="margin-top:0px">T01_csiswa <?php //echo $button ?></h2> -->
        <form action="<?php echo $action; ?>" method="post">
			<div class="form-group">
            	<label for="varchar">NAMA <?php echo form_error('Nama') ?></label>
            	<input type="text" class="form-control" name="Nama" id="Nama" placeholder="NAMA" value="<?php echo $Nama; ?>" />
        	</div>
			<input type="hidden" name="idcsiswa" value="<?php echo $idcsiswa; ?>" />
			<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
			<a href="<?php echo site_url('t01_csiswa') ?>" class="btn btn-secondary">Batal</a>
		</form>
    <!-- </body>
</html> -->
