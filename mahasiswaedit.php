<?php 
require 'core/init.php';
$general->logged_out_protect();
$users->log_users($_SESSION['loginid'],"Mengubah Mahasiswa");
$idMhs	= $_GET['id'];
$mhs	= $mahasiswa->mahasiswaData($idMhs);
$idJur	= $mhs['idJur'];
$jur=$jurusan->jurusanData($idJur);

if (isset($_POST['submit'])) {
    $nim 	= $_POST['nim'];
	$namaMhs = $_POST['namaMhs'];
	$idJur	= $_POST['idJur'];
		
	$mahasiswa->ubahMahasiswa($idMhs,$nim,$namaMhs,$idJur);
	header('Location: mahasiswalist.php?');
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
	<link rel="stylesheet" href="css/jquery-ui.css" />
	<script src="js/jquery.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script type="text/javascript"> 
		$(document).ready(function(){
			$("#deliverybegin,#deliveryend,#sppdate").datepicker
			({dateFormat:"dd-M-yy",changeMonth:true,changeYear:true,});
		});
	</script>
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
	<div class="breadcrumb"> >> Home >> Daftar Mahasiswa >> Edit Mahasiswa</div>
	<hr/>
	<form name="mahasiswaform" method="post" action="" onsubmit="return cekData();">
	<fieldset style="display: inline-block;">
	<legend> EDIT PROJECT </legend>
	<table class="formtable">
    <input type='hidden' size='30' name='nim' value='<?php echo $mhs['nim']; ?>'/>
		<tr>
			<td> NIM  </td>
			<td> <input type='text' size='30' name='nim' value='<?php echo $mhs['nim']; ?>' disabled/> </td>
		</tr>
        <tr>
			<td> Nama Mahasiswa  </td>
			<td> <input type='text' size='30' name='namaMhs' value='<?php echo $mhs['namaMhs']; ?>' /> </td>
		</tr>
		<tr>
			<td> Jurusan </td>
			<td> <select name="idJur">
					<option value='<?php echo $mhs['idJur']; ?>' selected="selected"> <?php echo $jur['namaJur']; ?> </option>
				<?php
					$jurusans = $jurusan->get_jurusan();
					foreach ($jurusans as $vjur)
					{	
						echo '<option value=' . $vjur['id'] . '>' .  $vjur['namaJur'] . '</option>';
					}
				?>
				</select></td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type='submit' name='submit' value=' Update '> &nbsp;&nbsp; 
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
