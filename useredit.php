<?php 
require 'core/init.php';
$general->logged_out_protect();
$id=$_GET['id'];
$member=$users->detailUser($id);
if (isset($_POST['submit'])) {
	$nama 	= $_POST['namalengkap'];
	$password 	= $_POST['password'];
	$level 		= $_POST['level'];
	$locked 	= $_POST['locked'];
	//echo 'Old Passw: '.$member['password']. ' New Passw:'. $password;
	if ($password=="") {	
		$password = $member['password'];
	}
	$users->ubahUser($id,$password,$level,$nama,$locked);
	header('Location: userlist.php');
}
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>::Data Mahasiswa::</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<LINK rel="stylesheet" type="text/css" href="css/styleform.css">
	<script type="text/javascript">
	function cekData()
	{	if (userform.namalengkap.value == "")
		{	alert("Nama lengkap wajib diisi!");
			userform.fullname.focus();
			return false;
		}
		if (userform.level.value == "")
		{	alert("Level wajib diisi!");
			userform.fullname.focus();
			return false;
		}
		else
			return true;
	}
	</script>
</head>
<body>	
	<div class="breadcrumb"> >> Admin >> Daftar Pengguna >> Edit Pengguna</div>
	<hr/>
	<div id="notes"> *) Data Wajib diisi <br/>
	Jika password tidak diganti, dikosongi saja!
	</div><br/>
	<form name="userform" class="form" method="post" action="" onsubmit="return cekData();">
	<fieldset style="display: inline-block;">
	<legend> Edit Pengguna </legend>
	<label>Nama Lengkap :</label> <input type='text' size='30' name='namalengkap' value='<?php echo $member['namalengkap']; ?>'>
	<label>User Name :</label> <input type='text' size='30' value='<?php echo $member['username']; ?>' disabled> </td>
	<label>Password :</label> <input type='text' size='30' name='password'> </td>
	<label>User Level :</label> 
		<select name="level">
			<option value="User" selected="selected"> User </option>
			<option value="Manager"> Manager </option>
			<option value="Admin"> Admin </option>
		</select><br/>
	<label>Lock User : </label>	
		<input type="radio" name="locked" value="0" /> <font color="#ffffff"> Yes </font>
		<input type="radio" name="locked" value="1" CHECKED /> <font color="#ffffff"> No </font>
	<label>&nbsp;</label><br/>
		<input type='submit' name='submit' value=' Update '>  
		<input type='reset' name='reset' value=' Reset '> 
	</fieldset>
	</form>
</body>
</html>
