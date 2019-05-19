<?php 
require 'core/init.php';
$general->logged_out_protect();
$user = $users->detailUser($_SESSION['loginid']);
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Sistem Tracking</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<style type="text/css">
		body{margin:10px;background-image:url('images/corner.jpg');background-repeat:no-repeat;background-attachment:fixed;}
	</style>
</head>
<body>
	<div class="breadcrumb"> >> Home</div>
	<hr/>
	<table>
	Selamat Datang... <br>
	Ini adalah halaman home
	</table>
	<p>&nbsp;</p>
</body>
</html>
