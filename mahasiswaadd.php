<?php 
require 'core/init.php';
$general->logged_out_protect();
$users->log_users($_SESSION['loginid'],"Menambah Mahasiswa");
if (isset($_POST['submit']))
{	$nim = $_POST['nim'];
	$namaMhs = $_POST['namaMhs'];
	$idJur	= $_POST['idJur'];
		
	$mahasiswa->tambahMahasiswa($nim, $namaMhs, $idJur);
	header('location: mahasiswalist.php');
}
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<style type="text/css">
		body{font-size:12px;background-image:url('images/corner.jpg');background-repeat:no-repeat;background-attachment:fixed;font-family: Arial, Helvetica, sans-serif;}
		.breadcrumb{font-size:12px;color:#0000A0;}
		.formtable {font-size:12px;color:#000000; background-color:#f0f0f0;padding:10px;width:550px;}
		.errormsg {font-size:10pt;color:#ff0000;text-align:left;}
	</style>

	<script type="text/javascript"> 
	function cekData()
	{	if (projectform.projectname.value == "")
		{	alert("Project Name must be filled!");
			projectform.projectname.focus();
			return false;
		}
		else
			return true;   
	}
	</script>
</head>
<body>	
	<div class="breadcrumb"> >> Home >> Daftar Mahasiswa >> Tambah Mahasiswa </div>
	<hr/>
	<form name="mahasiswaform" method="post" action="" onsubmit="return cekData();">
	<fieldset style="display: inline-block;">
	<legend> Tambah Mahasiswa Baru </legend>
	<table class="formtable">
		<tr>
			<td width="150"> NIM</td><td>:</td>
			<td> <input type='text' size='30' name='nim'> </td>
		</tr>
        <tr>
			<td width="150"> Nama Mahasiswa</td><td>:</td>
			<td> <input type='text' size='30' name='namaMhs'> </td>
		</tr>
		<tr>
			<td> Jurusan </td><td>:</td>
			<td> 
			<?php
				$jurusan = $jurusan->relasiJurusan();
				echo '<select name="idJur">';
				foreach ($jurusan as $vjur)
				{	echo '<option value=' . $vjur['id'] . '>' .  $vjur['namaJur'] . '</option>';
				}
				echo '</select>';
			?>
			</td>
		</tr>
		
		<tr>
			<td></td>
			<td></td>
			<td>
				<input type='submit' name='submit' value='Tambah'> &nbsp;&nbsp; 
				<input type='reset' name='reset' value=' Reset '> 
			</td>
		</tr>
	</table>
	</fieldset>
	</form>

	<?php 
	if(empty($errors) === false){
		echo '<p class=errormsg>' . implode('</p><p class=errormsg>', $errors) . '</p>';
	}
	?>
</body>
</html>
