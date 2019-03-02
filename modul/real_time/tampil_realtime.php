<?php
include("../../config/koneksi.php");
$sql = mysqli_query($koneksi,"SELECT 
									transaksi.id_trans,
									transaksi.nis, 
									tb_user.nama AS nama_siswa, 
									transaksi.tanggal, 
									transaksi.kredit, 
									transaksi.debit, 
									transaksi.saldo, 
									transaksi.id_admin, 
									transaksi.keterangan 
									FROM transaksi, tb_user 
									WHERE 
									transaksi.nis = tb_user.nis 
									ORDER BY id_trans DESC LIMIT 31");
$result = array();
$jum  ="0"; $pem  =","; $rib  ="."; 
$no = 1;
while($row = mysqli_fetch_array($sql)){
	if ($row['kredit'] == 0) {
		$transaksi = "Rp. ".number_format($row['debit'],'0',',','.');
	} else {
		$transaksi = "Rp. ".number_format($row['kredit'],'0',',','.');
	}

	if ($row['id_admin'] == '0') {
		$pengurus = 'Siswa';
	} else {
		$pengurus = "Admin (".$row['id_admin'].")";
	}
	
	array_push($result, array('no' => $no,'id_transaksi' => $row['id_trans'],'nis' => $row['nis'], 'nama_siswa' => $row['nama_siswa'], 'tanggal' => date('H:i:s  d-m' ,strtotime($row['tanggal'])), 'transaksi' => $transaksi, 'pengurus' => $pengurus, 'keterangan' => $row['keterangan']));

	$no++;
}
echo json_encode(array("result" => $result));
?>