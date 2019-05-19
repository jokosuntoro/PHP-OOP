<?php 
require 'core/init.php';
$general->logged_out_protect();
if (isset($_POST['submit'])) 
{	if ($users->user_exists($_POST['username']) == true && !empty($_POST['username']))
    {	$errors[] = 'Maaf, username '.$_POST['username'].' sudah ada!';
	}
	if(empty($errors) === true)
	{	$nama 	= $_POST['namalengkap'];
		$username 	= htmlentities($_POST['username']);
		$password 	= $_POST['password'];
		$level 		= $_POST['level'];
		$locked 	= $_POST['locked'];
		$users->tambahUser($username,$password,$level,$nama,$locked);
		header('Location: userlist.php');
	}
}
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Add New User</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link href="css/styleform.css" rel="stylesheet" type="text/css" />
	<style type="text/css">
		body{background-image:url('images/corner.jpg');background-repeat:no-repeat;background-attachment:fixed;font-family: Arial, Helvetica, sans-serif;}
	</style>
	<script type="text/javascript">
	function cekData()
	{	if (userform.namalengkap[].value == "")
		{	alert("User full name must be filled!");
			userform.namalengkap.focus();
			return false;
		}
		if (userform.username.value == "")
		{	alert("Username must be filled!");
			userform.username.focus();
			return false;
		}  
		if (userform.password.value == "" || (userform.password.value).length < 3)
		{	alert("User password must be filled at least 3 characters!");
			userform.password.focus();
			return false;
		}  
		else
			return true;   
	}
	</script>
</head>
<body>	
	<div class="breadcrumb"> >> Admin >> User List >> Add New User</div>
	<hr/>
	<div id="notes"> *) All fields are required</div><br/>
	<form name="userform" class="form" method="post" action="" onsubmit="return cekData();">
	<fieldset>
	<legend> Add New User </legend>
	<label>Full Name :</label> <input type='text' size='30' name='namalengkap'/> <br/>
	<label>User Name :</label> <input type='text' size='30' name='username'> <br/>
	<label>Password :</label> <input type='text' size='30' name='password'> <br/>
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
		<input type="submit" name="submit" value="Save"> 
		<input type="reset" name="reset" value="Reset"> 
	</fieldset>
	</form>
	<?php 
	if(empty($errors) === false){
		echo '<p class=errormsg>' . implode('</p><p class=errormsg>', $errors) . '</p>';
	}
	?>
</body>
</html>
