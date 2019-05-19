<?php 
require 'core/init.php';
$general->logged_out_protect();
?> 
<!DOCTYPE HTML>
<html>
<head>
	<title>Helpdesk System</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link rel=stylesheet type="text/css" href="css/style.css">
</head>
<body bgcolor="#003566">
<div id="leftmenu">
<div id="headleftmenu">Data Master</div>
<ul>
  <li><a href="userlist.php" target="contentFrame">Daftar Pengguna</a></li>
</ul>
</div>
<div id="leftmenu">
<div id="headleftmenu">Sistem</div>
<ul>
  <li><a href="mahasiswaprint.php" target="contentFrame">Laporan</a></li>
  <li><a href="userlog.php" target="contentFrame">Log Pengguna</a></li>
</ul>
</div>
</body>
</html>
