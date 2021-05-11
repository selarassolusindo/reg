<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>T30_pendaftaran List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Idsekolah</th>
		<th>TglPendaftaran</th>
		<th>Idcalonsiswa</th>
		
            </tr><?php
            foreach ($t30_pendaftaran_data as $t30_pendaftaran)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $t30_pendaftaran->idsekolah ?></td>
		      <td><?php echo $t30_pendaftaran->TglPendaftaran ?></td>
		      <td><?php echo $t30_pendaftaran->idcalonsiswa ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>