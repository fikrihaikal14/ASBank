<?php 

date_default_timezone_set('Asia/Jakarta');
$sekarang  = new DateTime();
$menit = $sekarang -> getOffset() / 60;
$tanda = ($menit < 0 ? -1 : 1);
$menit = abs($menit);
$jam   = floor($menit / 60);
$menit -= $jam * 60;

$offset = sprintf('%+d:%02d', $tanda * $jam, $menit);

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'db_asbank');

$conn = mysqli_connect(HOST,USER,PASS,DB);
mysqli_query($conn, "SET time_zone = '$offset'");

if(mysqli_connect_errno()){
	$error = 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
	echo json_encode($error);
}
 ?>
