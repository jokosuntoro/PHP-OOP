<?php 
require 'core/init.php';
$general->logged_out_protect();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html>
<head>
<title>Sistem OOP</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">
</head>
<frameset name="mainfs" rows="85,*" frameborder="0" border="0" framespacing="0">
	<frame src="header.php" name="topFrame" scrolling="NO" noresize />
	<frameset name="contentfs" cols="200,*" frameborder="0" border="0" framespacing="0">
		<frame src="navigator.php" name="leftFrame" scrolling="NO" noresize />
		<frame src="content.php" name="contentFrame" />
	</frameset>
</frameset><noframes></noframes>
<body>
</body>
</html>
