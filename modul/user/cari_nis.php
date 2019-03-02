<?php

include_once '../../config/koneksi.php';
$nis = $_GET['nis'];

$sql = mysqli_query($koneksi, "SELECT * FROM user_tmp WHERE nis='$nis'");
$array = mysqli_fetch_array($sql);

$jumlah = mysqli_num_rows($sql);
$status = '';
if ($jumlah > 0){ $status = '1'; }
else { $status = '0'; }

if ($array['email'] == null) {
	$email = 'Tidak ada email';
} else {
	$email = $array['email'];
}

if ($status == '1') {
    $data['nis']    = $array['nis'];
    $data['nama']   = $array['nama'];
    $data['kelas']  = $array['kelas'];
    $data['jurusan'] = $array['jurusan'];
    $data['email'] = $email;
    $data['status'] = $status;
} else {
    $data = array( 'status'    => $status );
}

$json = json_encode($data);
echo $json;
