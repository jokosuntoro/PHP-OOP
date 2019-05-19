<?php 
require 'core/init.php';
$general->logged_out_protect();
$user = $users->detailUser($_SESSION['loginid']);
if($user['level'] != "Admin")
{ 	exit("You don't have permission to access this page!"); }
$members 		= $users->get_users();
$member_count 	= count($members);
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>::Sistem Tracking::</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<style type="text/css">
		body{background-image:url('images/corner.jpg');background-repeat:no-repeat;background-attachment:fixed;}
		.breadcrumb{font-size:12px;color:#0000A0;font-family: Arial, Helvetica, sans-serif;}
	</style>
  	<link rel="stylesheet" type="text/css" href="css/datatable.css" />
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.css" />
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/jquery.dataTables.js" type="text/javascript"></script>
	<script type="text/javascript" charset="utf-8">
	$(document).ready(function(){
		$('#datatables').dataTable({
			"sScrollY": "450px",
			"sScrollX": "100%",
			"bScrollCollapse": true,
			"bPaginate": true,
			"bJQueryUI": true
		});			
	})
	function delete_confirm(link) {
		var msg = confirm('Apakah data user ini akan dihapus?');
		if(msg == false) {
			return false;
		}
	}
	</script>

</head>
<body>
	<div class="breadcrumb"> >> Admin >> Daftar Pengguna </div>
	<hr/>
	<h1>Daftar Pengguna</h1>
	<p>Jumlah User Terdaftar: <strong><?php echo $member_count; ?></strong> </p>
	<p><button onclick="window.location='useradd.php';">Tambah User</button></p>
	<table id="datatables" class="display">
    <thead>
        <tr>
            <th>Username</th>
			<th>Level</th>
            <th>Nama Lengkap</th>
            <th>Update Terakhir</th>
			<th>Locked</th>
			<th>Aksi</th>
        </tr>
    </thead>
    <tbody>
		<?php 
		foreach ($members as $member) {
			if ($member['confirmed']=='1') {
				$locked='No';
			} else {
				$locked='Yes';
			}
			echo '<tr><td><a href=useredit.php?id='.$member['id']. '>'.$member['username'].'</a></td>'.
				 '<td>'.$member['level'].'</td>'.
				 '<td>'.$member['namalengkap'].'</td>'.
				 '<td>'.date('d-M-Y H:i', $member['time']).'</td>'.
				 '<td>'.$locked.'</td>'.
				 '<td><a href=userdel.php?id='.$member['id']. ' onclick="return delete_confirm();"><img src="images/delete.png" alt="Delete" width="20px" height="20px" align="middle" title="Delete Record"/></a></td></tr>';
		}
		?>
    </tbody>
	</table>
	<p>&nbsp;</p>
</body>
</html>
