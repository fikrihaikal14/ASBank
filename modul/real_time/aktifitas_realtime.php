<?php

include("../../config/koneksi.php");
$sql = mysqli_query($koneksi,"SELECT * FROM tb_aktifitas ORDER BY id_aktifis DESC limit 31");
$result = array(); 

$no = 1;
while($row = mysqli_fetch_array($sql)){

	if ($row['id_admin'] == '') {
		$id_admin = ' ';
	} else {
		$id_admin = $row['id_admin'];
	}

	if ($row['nis'] == null) {
		$nis = '';
	} else {
		$nis = $row['nis'];
	}

	array_push($result, array('no' => $no,'id_aktifis' => $row['id_aktifis'], 'id_admin' => $id_admin, 'nis' => $nis, 'keterangan' => $row['keterangan'], 'tanggal' => date('H:i:s  d-m-Y' ,strtotime($row['tanggal']))));
$no++;
}
echo json_encode(array("result" => $result));
?>