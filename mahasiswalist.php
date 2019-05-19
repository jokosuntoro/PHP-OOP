<?php
require 'core/init.php';
$general->logged_out_protect();
$user = $users->userdata($_SESSION['loginid']);
$users->log_users($_SESSION['loginid'],"Membuka Mahasiswa");

$mahasiswa = $mahasiswa->tampilMahasiswa();
$sum_mhs = count($mahasiswa);
?>

<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<style type="text/css">
		body{background-image:url('images/corner.jpg');background-repeat:no-repeat;background-attachment:fixed;}
		.breadcrumb{font-size:12px;color:#0000A0;font-family: Arial, Helvetica, sans-serif;}
	</style>
  	<link rel="stylesheet" type="text/css" href="css/datatable.css" />
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.css" />
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/jquery.dataTables.js" type="text/javascript"></script>
	<script type="text/javascript" charset="utf-8">
	$(document).ready(function(){
		$('#datatables').dataTable({
			"sScrollY": "300px",
			"sScrollX": "100%",
			"bScrollCollapse": true,
			"bPaginate": true,
			"bJQueryUI": true
		});			
	})
	function delete_confirm(link) {
		var msg = confirm('Are you sure to delete this project?');
		if(msg == false) {
			return false;
		}
	}
	</script>

</head>
<body>
	<div class="breadcrumb"> >> Home >> Daftar Mahasiswa </div>
	<hr/>
	<h1>Daftar Mahasiswa</h1>
	<p>Jumlah Mahasiswa : <strong><?php echo $sum_mhs; ?></strong> </p>
	<p><button onclick="window.location='mahasiswaadd.php';">Tambah Mahasiswa</button></p>
	<table id="datatables" class="display">
    <thead>
        <tr>
            <th>NIM</th>
            <th>Nama Mahasiswa</th>
            <th>Jurusan</th>	
			<th>Aksi</th>
        </tr>
    </thead>
    <tbody>
		<?php 
		foreach ($mahasiswa as $mhs) {
			$jur=$jurusan->jurusanData($mhs['idJur']);
            echo '<tr>
                     <td>'.$mhs['nim'].'</a></td>'.
                    '<td>'.$mhs['namaMhs'].'</td>'.
                    '<td>'.$jur['namaJur'].'</td>'.
                    '<td><center>
                    <a href=mahasiswaedit.php?id='.$mhs['idMhs']. '><img src="images/edit.png" alt="Delete" width="15px" height="15px" align="center" title="Edit Record"/></a> &nbsp;
                    <a href=mahasiswadel.php?id='.$mhs['idMhs']. ' onclick="return delete_confirm();"><img src="images/trash.png" alt="Delete" width="15px" height="15px" align="center" title="Delete Record"/></a>
                    </center></td>
                </tr>';
		}
		?>
    </tbody>
	</table>
	<p>&nbsp;</p>
</body>
</html>