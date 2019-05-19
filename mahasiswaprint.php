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

</head>

<body onload="window.print()">
<center>
	<div class="breadcrumb"> >> Home >> Daftar Mahasiswa </div>
	<hr/>
	<h1>Daftar Mahasiswa</h1>
	<p>Jumlah Mahasiswa : <strong><?php echo $sum_mhs; ?></strong> </p>
	<table border="1">
    <thead>
        <tr>
            <th>NIM</th>
            <th>Nama Mahasiswa</th>
            <th>Jurusan</th>
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
                '</tr>';
		}
		?>
    </tbody>
	</table>
	<p>&nbsp;</p>
	</center>
</body>
</html>