<?php 
require 'core/init.php';
$general->logged_out_protect();
$user 		= $users->detailUser($_SESSION['loginid']);
?> 
<!DOCTYPE HTML>
<html>
<head>
	<title>Sistem Tracking</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link rel=stylesheet type="text/css" href="css/style.css">
</head>
<body bgcolor="#003566">
<div id="leftmenu">
<div id="headleftmenu">Data Kampus</div>
<ul>
  <li><a href="mahasiswalist.php" target="contentFrame">Mahasiswa</a></li>
  <li><a href="jurusanlist.php" target="contentFrame">Jurusan</a></li>
</ul>
</div>
<?php
	/*
	if ($user['level'] == "Manager")
	*/
	if ($user['level'] == "Manager")
	{	echo '<div id="leftmenu">
				<div id="headleftmenu">Laporan</div>
					<ul>
					<li><a href="mahasiswaprint.php" target="contentFrame">Laporan</a></li>
					</ul>
			 </div>'; 
	}
?>
</body>
</html>
