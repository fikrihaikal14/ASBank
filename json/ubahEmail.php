<?php 

include_once 'data/koneksi.php';
include_once 'data/data_id.php';

@$nis = $_POST['nis'];
@$email = $_POST['email'];
@$password = $_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM tb_user WHERE nis='$nis'");
$data  = mysqli_fetch_array($query);
$pass  = $data['sandi'];
$nama  = $data['nama'];

if (mysqli_num_rows($query) == '1') {
	if (password_verify($password,$pass)) {
		try {
			$sql = mysqli_query($conn, "UPDATE tb_user SET email='$email' WHERE nis='$nis'");

			if ($sql) {
				$response = array(
					'status' => 200,
					'pesan'  => 'Email berhasil di ubah'
				);

				header('Content-Type: Application/Json');
				$json = json_encode($response);

				echo $json;

				$aktivitas = mysqli_query($conn, "INSERT INTO tb_aktifitas(id_aktifis, nis, keterangan) VALUES ($nilaikodemax,$nis_base,'akun $nis($nama) mengubah email')") or die(mysqli_error());
			} else {
				$response = array(
					'status' => 404,
					'pesan'  => 'Gagal merubah email'
				);

				header('Content-Type: Application/Json');
				$json = json_encode($response);

				echo $json;
			}
		} catch (Exception $e) {
			$response = array(
				'status' => 404,
				'pesan'  => 'Terjadi kesalahan di server'
			);

			header('Content-Type: Application/Json');
			$json = json_encode($response);

			echo $json;
		}
	} else {
		$response = array(
			'status' => 404,
			'pesan'  => 'Password anda tidak benar',
			'password android' => $password,
			'email android' => $email,
			'nis' => $nis
		);

		header('Content-Type: Application/Json');
		$json = json_encode($response);

		echo $json;
	}
} else {
	$response = array(
		'status' => 404,
		'pesan'  => 'Nis tidak aktif'
	);

	header('Content-Type: Application/Json');
	$json = json_encode($response);

	echo $json;
}