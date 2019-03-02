<?php  

include_once 'data/koneksi.php';
include_once 'data/data_id.php';

@$nis = $_POST['to'];
@$nis_base = $_POST['base'];

if ($nis != $nis_base) {

	$base = "SELECT * FROM tb_user WHERE nis='$nis_base'";
	$query_base = mysqli_query($conn, $base);
	$data_base = mysqli_fetch_array($query_base);
	$saldo_base = 'Rp. '.number_format($data_base['saldo'], '0',',','.');

	$sql = "SELECT * FROM tb_user WHERE nis='$nis'";
	$query = mysqli_query($conn, $sql);
	$data_to = mysqli_fetch_array($query);
	$saldo_to = $data_to['saldo'];
	$nama_to = $data_to['nama'];

		if (mysqli_num_rows($query) > 0) {
			$data = mysqli_fetch_array($query);
			$response = array(
				'status' => '200',
				'data' => array(
					'base' => array (
						'nis' => $nis_base,
						'saldo' => $saldo_base
					),
					'tujuan' => array (
						'nis' => $nis,
						'saldo' => $saldo_to,
						'nama' => $nama_to
					)
				)
			);

			header('Content-Type: Application/Json');
			$json = json_encode($response);

			echo $json;
		} else {
			$response = array(
				'status' => 404,
				'data' => '0',
				'pesan' => 'Nis tidak benar, silahkan periksa kembali'
			);

			header('Content-Type: Application/Json');
			$json = json_encode($response);

			echo $json;
		}
} else {
	$response = array(
		'status' => 404,
		'data' => '0',
		'pesan' => 'Nis tidak boleh sama, silahkan isi dengan benar'
	);

	header('Content-Type: Application/Json');
	$json = json_encode($response);

	echo $json;
}