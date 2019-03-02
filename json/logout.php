<?php

include_once 'data/koneksi.php';
include_once 'data/data_id.php';

@$nis = $_POST['nis'];

$sql = "SELECT * FROM tb_user WHERE nis='$nis'";
$execute = mysqli_query($conn, $sql)or die(mysqli_errno());
$ambil = mysqli_fetch_array($execute);
$nama  = $ambil['nama'];

$response = "";
$query = "INSERT INTO tb_aktifitas (id_aktifis, nis, keterangan) VALUES ('$nilaikodemax','$nis','User $nis($nama) Logout')";
$aktifis = mysqli_query($conn, $query)or die(mysqli_error());

if ($query) {
	$response = array(
		'status' => 200
	);

	header('Content-Type: Application/Json');
	$json = json_encode($response);

	echo $json;
} else {
	$response = array(
		'status' => 404,
		'pesan'	=> 'Terjadi kesalahan, silahkan coba lagi'
	);

	header('Content-Type: Application/Json');
	$json = json_encode($response);

	echo $json;
}