<?php

include_once 'data/koneksi.php';
include_once 'data/data_id.php';

@$nis = $_GET['user'];

$cocok	= mysqli_query($conn, "SELECT * FROM tb_user WHERE nis='$nis'");
$number = mysqli_num_rows($cocok);

if ($number == '1') {
	try {
		$sql = mysqli_query($conn, "SELECT * FROM transaksi WHERE nis='$nis' ORDER BY id_trans DESC LIMIT 30");
		if (mysqli_num_rows($sql) > '0') {
			
			$response = array();
			$response['status'] = '200';
			$response['pesan'] = 'Berhasil';
			$response['data'] = array();

			$i = 1;
			while ($data = mysqli_fetch_array($sql)) {
				
				if ($data['kredit'] == '0') { $nominal = $data['debit']; }
				else if ($data['debit'] == '0'){ $nominal = $data['kredit']; }

				$array['id_trans'] 		= $data['id_trans'];
				$array['nis'] 			= $data['nis'];
				$array['nominal'] 		= 'Rp. '.number_format($nominal,'0',',','.');
				$array['saldo'] 		= 'Rp. '.number_format($data['saldo'],'0',',','.');
				$array['tanggal'] 		= $data['tanggal'];
				$array['keterangan'] 	= $data['keterangan'];
				
				array_push($response['data'], $array);

				$i++;
			}
        	
        	header('Content-Type: Application/Json'); 
    		$json = json_encode($response);
    		echo $json;
		} else {
		    $response = array(
				'status'	=> 404,
        		'pesan'		=> 'Belum ada transaksi'
        	);
        
        	header('Content-Type: Application/Json');
        	$json = json_encode($response);
        
        	echo $json;
		}		
	} catch (Exception $e) {
		$response = array(
			'status'	=> 404,
			'pesan'		=> 'Mohon maaf sedang terjadi kesalahan'
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