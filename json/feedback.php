<?php
/**
 * Created by PhpStorm.
 * User: IG-PC
 * Date: 3/11/2018
 * Time: 8:35 PM
 */

include_once 'data/koneksi.php';
include_once 'data/data_id.php';

@$nis	= $_POST['nis'];
@$feed	= $_POST['feed'];

$sql	= mysqli_query($conn, "SELECT * FROM tb_user WHERE nis='$nis' AND akses='1'");
$cocok  = mysqli_num_rows($sql);

if ($cocok > 0) {
	try {
		$sql = mysqli_query($conn, "INSERT INTO tb_feedback(id_fb,nis,masukan) VALUES ('$fbkodemax','$nis','$feed')");
		if ($sql) {
			$response = array(
				'status'	=> 200,
				'pesan'		=> 'Terimakasih atas feedback nya'
			);

			header('Content-Type: Application/Json');
			$json = json_encode($response);

			echo $json;
		}
	} catch (Exception $e) {
		$response = array(
			'status'	=> 404,
			'pesan'		=> 'Mohon maaf sedang terjadi kesalahan, silahkan coba lagi nanti'
		);

		header('Content-Type: Application/Json');
		$json = json_encode($response);

		echo $json;	
	}
} else {
	$response = array(
		'status'	=> 404,
		'pesan'		=> 'Nis tidak aktif'
	);

	header('Content-Type: Application/Json');
	$json = json_encode($response);

	echo $json;	
}