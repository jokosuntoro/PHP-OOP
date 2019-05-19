<?php 
require 'core/init.php';
$general->logged_out_protect();
$users->log_users($_SESSION['loginid'],"Mengubah Jurusan");
$id=$_GET['id'];
$x=$jurusan->detailJurusan($id);
if (isset($_POST['submit'])) {
	$kodeJur 	= $_POST['kodeJur'];
	$namaJur 	= $_POST['namaJur'];
	
	$jurusan->ubahJurusan($id, $kodeJur, $namaJur);
	header('Location: jurusanlist.php');
}
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>::Data Mahasiswa::</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<LINK rel="stylesheet" type="text/css" href="css/styleform.css">
    <style type="text/css">
		body{background-image:url('images/corner.jpg');background-repeat:no-repeat;background-attachment:fixed;font-family: Arial, Helvetica, sans-serif;}
		.breadcrumb{font-size:12px;color:#0000A0;}
		.formtable {font-size:12px;color:#000000; background-color:#f0f0f0;padding:10px;width:500px;}
		.errormsg {font-size:10pt;color:#ff0000;text-align:left;}
	</style>
	<script type="text/javascript">
	function cekData() {
        if (jurform.kodeJur.value == "") {
            alert("Kode jurusan wajib diisi!");
			jurform.kodeJur.focus();
			return false;
		}

		if (jurform.namaJur.value == "") {
            alert("Nama jurusan wajib diisi!");
			jurform.namaJur.focus();
			return false;
		}
		else
			return true;
	}
	</script>
</head>
<body>	
	<div class="breadcrumb"> >> Home >> Daftar Jurusan >> Edit Jurusan</div>
	<hr/>
	<div id="notes"> *) Data Wajib diisi <br/>
	</div><br/>
	<form name="jurform" class="form" method="post" action="" onsubmit="return cekData();">
	<fieldset style="display: inline-block;">
	<legend> Edit Jurusan </legend>
    <table class="formtable">
		<tr align="left">
			<td> Kode Jurusan</td><td> : </td>
			<td> <input type='text' size='30' name='kodeJur' value='<?php echo $x['kodeJur']; ?>'></td>
		</tr>
		<tr align="left">
			<td> Nama Jurusan </td><td> : </td>
			<td> <input type='text' size='30' name='namaJur' value='<?php echo $x['namaJur']; ?>'></td>
		</tr>
		<tr align="left">
			<td> </td>
			<td> </td>
			<td> 
				<input type='submit' name='submit' value=' Update '>  
				<input type='reset' name='reset' value=' Reset '> 
			</td>
		</tr>
	</table>
	</fieldset>
	</form>
</body>
</html>
