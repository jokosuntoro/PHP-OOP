<?php 
require 'core/init.php';
$general->logged_out_protect();
$user 		= $users->detailUser($_SESSION['loginid']);
$nama 	= ucwords(strtolower($user['namalengkap']));
?> 
<!DOCTYPE HTML>
<html>
<head>
	<title>Sistem Tracking</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<script type="text/javascript" src="js/time.js"></script>
</head>
<body bgcolor="#003566" onload="startTime();">	
<table class="header">
<tr>
	<td width="500px"><strong>Sistem PHP OOP</strong></td>
	<td align="right"><span id="clocktime"></span><span id="welcome"><?php echo " :: Selamat Datang $nama :: "; ?> </span></td>
</tr>
<tr><td colspan="3">
<div id='topmenu'>
<ul>
	<li class='active'><a href='home.php' target="_parent"><span>Home</span></a></li>
	<?php
		if ($user['level'] == "Admin")
		{	echo "<li><a href='adminmenu.php' target='leftFrame'><span>Admin</span></a></li>"; 
		}
	?>
	<li><a href='changepwd.php' target="contentFrame"><span>Ubah Password</span></a></li>
	<li class='last'><a href='logout.php' target="_parent"><span>Logout</span></a></li>
</ul>
</div>
</td></tr>
</table>
<div style="clear:both; margin: 0 0 0px 0;">&nbsp;</div>
</body>
</html>
