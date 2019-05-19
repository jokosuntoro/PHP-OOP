<?php 
require 'core/init.php';
$general->logged_out_protect();
$users->log_users($_SESSION['loginid'],"Menghapus Jurusan");
$id=$_GET['id'];
$jurusan->deleteJurusan($id);
header('Location: jurusanlist.php');
?>