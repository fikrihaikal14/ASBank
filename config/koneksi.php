<?php

date_default_timezone_set('Asia/Jakarta');

$sekarang  = new DateTime();
$menit = $sekarang -> getOffset() / 60;
$tanda = ($menit < 0 ? -1 : 1);
$menit = abs($menit);
$jam   = floor($menit / 60);
$menit -= $jam * 60;

$offset = sprintf('%+d:%02d', $tanda * $jam, $menit);

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "db_asbank";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

mysqli_query($koneksi, "SET time_zone = '$offset'");

if(mysqli_connect_errno()){
	echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
}

?>