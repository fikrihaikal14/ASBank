<?php
include_once 'data/koneksi.php';
include_once 'data/data_id.php';

@$nis = $_POST['nis'];
@$nominal = $_POST['nominal'];
@$password = $_POST['password'];
$detik  = date('s') + 30;
$menit = date('i');
$jam   = date('H');
if ($detik > 60) {
	$detik = $detik - 60;
	$menit = $menit + 1;
}
if ($menit > 60) {
	$menit = $menit - 60;
	$jam   = $jam + 1;
}
if ($jam > 24) {
	$jam = $jam - 24;
}
$expire = $jam.':'.$menit.':'.$detik;

$cocokandata = mysqli_query($conn, "SELECT * FROM tb_user WHERE nis='$nis' AND akses='1'");
$number		 = mysqli_num_rows($cocokandata);
$data 		 = mysqli_fetch_array($cocokandata);

if ($number == '1') {
	if ($data['saldo'] >= $nominal) {
		if (password_verify($password, $data['sandi'])) {
			$periksaidtask=mysqli_query($conn, "SELECT nis FROM tb_task WHERE nis='$nis'");
			if (mysqli_num_rows($periksaidtask) == '0') {
				try {
					$query = "INSERT INTO tb_task(id_task,nis,keterangan,nominal,expire) VALUES('$kodetaskmax','$nis','debit','$nominal','$expire')";
					$queue = mysqli_query($conn, $query);
						if ($queue) {
							$error = 'FALSE';
							$response = array(
								'status' => 200,
								'error'  => $error,
								'id_task' => $kodetaskmax,
								'pesan'  => 'Silahkan Menuju ke Tata Usaha'
							);

							header('Content-Type: Application/Json');
							$json = json_encode($response);

							echo $json;
						} else {
							$error = 'TRUE';
							$response = array(
								'status' => 404,
								'error'  => $error,
								'pesan'  => 'Gagal mengajukan'
							);

							header('Content-Type: Application/Json');
							$json = json_encode($response);

							echo $json;
						}
				} catch (Exception $e) {
					$error = 'TRUE';
					$response = array(
						'status' => 404,
						'error'  => $error,
						'pesan'  => 'Mohon maaf sedang terjadi kesalahan, silahkan coba lagi'
					);

					header('Content-Type: Application/Json');
					$json = json_encode($response);

					echo $json;
				}
			} else {
				$error = 'TRUE';
					$response = array(
						'status' => 404,
						'error'  => $error,
						'pesan'  => 'Silahkan selesaikan Transaksi sebelumnya terlebih dahulu'
					);

					header('Content-Type: Application/Json');
					$json = json_encode($response);

					echo $json;
			}
		} else {
			$error = 'TRUE';
			$response = array(
				'status' => 404,
				'error'  => $error,
				'pesan'  => 'Pastikan Password anda benar'
			);

			header('Content-Type: Application/Json');
			$json = json_encode($response);

			echo $json;	
		}
	} else {
		$error = 'TRUE';
		$response = array(
			'status' => 404,
			'error'  => $error,
			'pesan'  => 'Pastikan Saldo anda mencukupi'
		);

		header('Content-Type: Application/Json');
		$json = json_encode($response);

		echo $json;	
	}
} else {
	$error = 'TRUE';
	$response = array(
		'status' => 404,
		'error'  => $error,
		'pesan'  => 'Nis tidak aktif'
	);

	header('Content-Type: Application/Json');
	$json = json_encode($response);

	echo $json;
}