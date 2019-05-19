<?php 
require 'core/init.php';
$general->logged_out_protect();
$user = $users->userdata($_SESSION['loginid']);
$users->log_users($_SESSION['loginid'],"Membuka Jurusan");
$jur = $jurusan->detailJurusan($_SESSION['loginid']);

$jurx 		= $jurusan->tampilJurusan();
$jurx_count 	= count($jurx);
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
			"sScrollY": "450px",
			"sScrollX": "100%",
			"bScrollCollapse": true,
			"bPaginate": true,
			"bJQueryUI": true
		});			
	})
	function delete_confirm(link) {
		var msg = confirm('Apakah data jurusan ini akan dihapus?');
		if(msg == false) {
			return false;
		}
	}
	</script>

</head>
<body>
	<div class="breadcrumb"> >> Home >> Daftar Jurusan </div>
	<hr/>
	<h1>Daftar Jurusan</h1>
	<p>Jumlah Jurusan: <strong><?php echo $jurx_count; ?></strong> </p>
	<p><button onclick="window.location='jurusanadd.php';">Tambah Jurusan</button></p>
	<table id="datatables" class="display">
    <thead>
        <tr>
            <th>Kode Jurusan</th>
			<th>Nama Jurusan</th>
			<th>Aksi</th>
        </tr>
    </thead>
    <tbody>
		<?php 
		foreach ($jurx as $x) {
			echo '<tr><td>'.$x['kodeJur'].'</a></td>'.
				 '<td>'.$x['namaJur'].'</td>'.
                 '<td><center>
                    <a href=jurusanedit.php?id='.$x['id']. '><img src="images/edit.png" alt="Delete" width="15px" height="15px" align="center" title="Edit Record"/></a> &nbsp;
                    <a href=jurusandel.php?id='.$x['id']. ' onclick="return delete_confirm();"><img src="images/trash.png" alt="Delete" width="15px" height="15px" align="center" title="Delete Record"/></a>
                 </center></td></tr>';
		}
		?>
    </tbody>
	</table>
	<p>&nbsp;</p>
</body>
</html>

