<?php 
ob_start();
session_start();
require_once 'connect/database.php';
function my_autoload($class)
{   $filename = 'classes/'.$class.'.php';
	include_once $filename;
}
spl_autoload_register('my_autoload');
try {
	$general 	= new General();
	$users 		= new Users($db);
	$jurusan	= new Jurusan($db);
	$mahasiswa	= new Mahasiswa($db);
	$retester 	= new Retester($db);
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
?>
