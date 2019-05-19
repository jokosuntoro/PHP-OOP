<?php 
require 'core/init.php';
$general->logged_out_protect();
$users->log_users($_SESSION['loginid'],"Menambah Jurusan");
if (isset($_POST['submit'])) {
    if ($jurusan->jurusan_exists($_POST['namaJur']) == true && !empty($_POST['namaJur'])) {
        $errors[] = 'Maaf, nama jurusan '.$_POST['namaJur'].' sudah ada!';
    }
    
	if(empty($errors) === true) {
        $kodeJur 	= $_POST['kodeJur'];
		$namaJur 	= $_POST['namaJur'];
		$jurusan->tambahJurusan($kodeJur,$namaJur);
		header('Location: jurusanlist.php');
	}
}
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link href="css/styleform.css" rel="stylesheet" type="text/css" />
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
	<div class="breadcrumb"> >> Admin >> Jurusan >> Tambah Jurusan</div>
	<hr/>
	<div id="notes"> *) Data wajib diisi</div><br/>
	<form name="jurform" class="form" method="post" action="" onsubmit="return cekData();">
	<fieldset style="display: inline-block;">
	<legend> Tambah Data Retester </legend>
	<table class="formtable">
		<tr align="left">
			<td> Kode Jurusan</td><td> : </td>
			<td> <input type='text' size='50' name='kodeJur' maxlength="50"></td>
		</tr>
		<tr align="left">
			<td> Nama Jurusan </td><td> : </td>
			<td> <input type='text' size='50' name='namaJur' maxlength="50"></td>
		</tr>
		<tr align="left">
			<td> </td>
			<td> </td>
			<td> 
				<input type='submit' name='submit' value=' Save '>  
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
