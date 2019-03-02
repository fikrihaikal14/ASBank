<?php

include_once 'data/koneksi.php';
include_once 'data/data_id.php';

@$nis = $_GET['user'];

$cocok	= mysqli_query($conn, "SELECT * FROM tb_user WHERE nis='$nis'");
$number = mysqli_num_rows($cocok);

if ($nis != '') {
	if ($number == '1') {
		try {
			$sql = mysqli_query($conn, "SELECT * FROM tb_user WHERE nis='$nis'");
			$data = mysqli_fetch_array($sql);
			$format_uang = 'Rp. '.number_format($data['saldo'],'0',',','.');

			$response = array(
				'status'	=> 200,
				'data'		=> array(
					'nis'	=> $data['nis'],
					'nama'	=> $data['nama'],
					'kelas'	=> $data['kelas'],
					'jurusan'	=> $data['jurusan'],
					'saldo'	=> $format_uang,
					'email'	=> $data['email']
				)
			);

			header('Content-Type: Application/Json');
			$json = json_encode($response);

			echo $json;
		} catch (Exception $e) {
			$response = array(
				'status'	=> 200,
				'pesan'		=> 'Mohon maaf terjadi kesalahan saat mengambil data'
			);

			header('Content-Type: Application/Json');
			$json = json_encode($response);

			echo $json;
		}
	} else {
		$response = array(
			'status'	=> 200,
			'pesan'		=> 'Akun belum aktif'
		);

		header('Content-Type: Application/Json');
		$json = json_encode($response);

		echo $json;
	}
} else {
	$response = array(
		'status'	=> 404,
		'pesan'		=> 'Silahkan isi parameter yang dibutuhkan'
	);

	header('Content-Type: Application/Json');
	$json = json_encode($response);

	echo $json;
}